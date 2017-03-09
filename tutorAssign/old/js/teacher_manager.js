
var nowPage = $("#nowPage").text();
var isInit = true;
var onSearch = false;
//===============================
// 导师列表
var tab_body = new Vue({
    el: '#tab',
    data: {
        datas: [],
        isNull:false
    }
});

//==============================
// 增加导师
var form_data = new Vue({
    el: '#form_data',
    data: {
        workNumber: "",
        name: "",
        gender: "",
        department: "",
        isExperial: "",
        telephone: "",
        position: ""
    }
});
//=============================
// 删除导师
var delete_data = new Vue({
    el: '#delete_data',
    data: {
        datas: [],
        isNull:false
    }
});


initPaginator();
listenEventDel();
listenEventAdd();
listenSearchEvent();
initUpload();


//===============================
//初始化分页组件
function initPaginator() {
    $('#tab-pagination').jqPaginator({
        totalPages: 100,
        visiblePages: 8,
        currentPage: 1,
        first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
        prev: '<li class="prev"><a href="javascript:void(0);">‹<\/a><\/li>',
        next: '<li class="next"><a href="javascript:void(0);">›<\/a><\/li>',
        last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
        page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
        onPageChange: function (page) {
            if(isInit){
                isInit = false;
                page=nowPage;
                setCurrentPage(parseInt(nowPage,10));
            }
            var request = {curPage: page};
            refreshTable(request,api_teacher_list);
        }
    });
}


//=================================
// 加载表格数据
// @param request
//        请求参数
// @param url
//        请求地址
function refreshTable(request,url) {
    $.ajax({
        type: "get",
        data: request,
        url: url,
        success: function (data) {
            tab_body.datas = data.information;
            if(data.amount == 0){
                setTotalpages(1);
                tab_body.isNull = true;
            }
            else{
                setTotalpages(data.amount);
                tab_body.isNull = false;
            }
        },
        dataType: "json"
    });
}


//===============================
// 点击删除按钮 更新弹出框数据
$("#delete-item").click(function () {
    // delete_data.datas = tab_body.datas;
    var arr = [];
    for(item of tab_body.datas){
        if(item.checked){
            arr.push(item);
        }
    }
    delete_data.datas = arr;
    console.log(arr);

    if(delete_data.datas.length != 0){
        delete_data.isNull = false;
    }else {
        delete_data.isNull = true;
    }
});


//================================
// 监听删除弹出框事件
function listenEventDel() {
    $("#btn-colse-del").click(function () {
        // location.reload();
        closeDeleteModal();
    });


    $("#btn-del-student").click(function () {
        $("#btn-del-student").attr("disabled", "disabled");
        var ids = selectedTeacherIDs();
        $.ajax({
            type: "get",
            data: {
                workNumber: ids
            },
            url: api_teacher_delete,
            success: function (data) {
                if (data) {
                    $("#deleteinfo").text("删除成功!").css("color", "green");
                    setTimeout('closeDeleteModal()',500);
                } else {
                    $("#deleteinfo").text("删除失败!").css("color", "red");
                    $("#btn-del-student").attr("disabled", false);
                }
            },
            error:function () {
                $("#deleteinfo").text("网络错误!").css("color", "red");
                $("#btn-del-student").attr("disabled", false);
            },
            dataType: "json"
        });
    });
}

//===============================
// 刷新导师列表
function refreshAfterAddOrDel() {
    if (onSearch) {
        var searchStr = searchCondition();
        var page = getCurrentPage();
        var request = {
            condition: searchStr,
            curPage: page
        }
        //加载搜索数据
        refreshTable(request, api_teacher_search);
    } else {
        var page = getCurrentPage();
        var request = {
            curPage: page
        }
        //加载搜索数据
        refreshTable(request, api_teacher_list);
    }
}


//=================================
// 获得选中导师的工号数组
function selectedTeacherIDs() {
    var ids = new Array();
    var teachers = tab_body.datas;
    for (var i = 0; i < teachers.length; ++i) {
        if (teachers[i].checked) {
            ids.push(teachers[i].workNumber);
        }
    }
    return ids;
}


//==================================
//点击输入框清除placeholder
$(".input-add").click(function () {
    $(this).attr("placeholder", " ");
});

//=================================
// 检查添加信息
function checkFormdata() {
    if(form_data.workNumber == ""
        || form_data.name == ""
        || form_data.telephone == ""
        || form_data.position == ""){
        return false;
    }
    return true;
}


//===============================
// 监听添加弹出框的关闭按钮
function listenEventAdd() {
    $("#btn-close-add-bottom").click(function () {
        closeAddModal();
    });

    //提交数据
    $("#btn-submit-add").click(function () {

        if(checkFormdata()){
            $("#btn-submit-add").attr("disabled", "disabled");
            $.ajax({
                type: "post",
                data: {
                    workNumber: form_data.workNumber,
                    name: form_data.name,
                    gender: form_data.gender,
                    department: form_data.department,
                    isExperial: form_data.isExperial,
                    telephone: form_data.telephone,
                    position: form_data.position
                },
                url: api_teacher_add,
                success: function (data) {
                    if (data.status) {
                        $("#addinfo").text("添加成功!").css("color", "green");
                        setTimeout('closeAddModal()',500);
                    } else {
                        $("#addinfo").text(data.msg+"!").css("color", "red");
                        $("#btn-submit-add").attr("disabled", false);
                    }
                },
                error: function (response, status) {
                    $("#addinfo").text("添加失败!").css("color", "red");
                    $("#btn-submit-add").attr("disabled", false);
                },
                dataType: "json"
            });
        }
        else {
            $("#addinfo").text("不能有字段为空！").css("color", "red");
            $("#btn-submit-add").attr("disabled", false);
        }
    });
}

//============================
// 监听搜索事件（回车）
function listenSearchEvent() {
    $("#searchstu").keydown(function (event) {
        if (event.which == "13") {
            console.log("enter");

            var searchStr = searchCondition();
            var page = 1;

            if (searchStr === "") {
                onSearch = false;
                setNormalCallback();
                var request = {curPage: 1};
                setCurrentPage(1);
                refreshTable(request);
            } else {
                onSearch = true;
                var request = {
                    condition: searchStr,
                    curPage: page
                }
                //加载搜索数据
                refreshTable(request, api_teacher_search);
                setCurrentPage(1);
                setSearchCallback();
            }
        }
    });
}

//=============================
// 搜索状态下的 onPageChange 回调
function setSearchCallback() {
    var onPageChange = function (page) {
        var searchStr = searchCondition();
        var request = {
            curPage: page,
            condition: searchStr
        };
        refreshTable(request, api_teacher_search);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}

//=============================
// 非搜索状态下的 onPageChange 回调
function setNormalCallback() {
    var onPageChange = function (page) {
        var request = {curPage: page};
        refreshTable(request);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}

//=============================
// 设置总页数
function setTotalpages(totalPages) {
    $('#tab-pagination').jqPaginator('option', {
        totalPages: totalPages
    });
}
//=============================
// 获得当前页
function getCurrentPage() {
    return $("#tab-pagination > .active ").attr("jp-data");
}

//==============================
// 设置当前页
function setCurrentPage(currentPage) {
    $('#tab-pagination').jqPaginator('option', {
        currentPage: currentPage
    });
}

//===============================
// 获得搜索字符串
function searchCondition() {
    return $("#searchstu").val();
}


//===================================
//  文件上传
var uploadObj;
function initUpload() {
    var response = "";
    uploadObj = $("#fileuploader").uploadFile({
        url: api_teacher_excel_upload,
        fileName: "excel_file",
        dragDropStr: "<span><b>拖拽文件到这里</b></span>",
        uploadStr: "上传文件",
        abortStr: "停止",
        cancelStr: "取消",
        deletelStr: "删除",
        doneStr: "完成",
        onSuccess: function (files, data, xhr, pd) {
            console.log(data);
            response = data;
            $("#uploadinfo").text("文件上传成功！请确认是否导入！").css("color", "green").css("text-align","center");
            $("input[type='file']").attr("disabled", true);
        },
        onError: function (files, status, message, pd) {
            $("#uploadinfo").text("文件上传失败！").css("color", "red").css("text-align","center");
            $("input[type='file']").attr("disabled", false);
        },
        onSelect: function (files) {
            console.log(files);
            if (files[0].name.split(".")[1] == "xls") {
                return true;
            }
            else {
                $("#uploadinfo").text("请选择 .xls 文件！").css("color", "red").css("text-align","center");
                return false;
            }
        }
    });

    //确认上传
    $("#confirm-import").click(function () {
        if(response !== "") {
            $("#confirm-import").attr("disabled", true);
            $.ajax({
                type: "post",
                data: {
                    file_path: response.file_path
                },
                url: api_teacher_excel_import,
                success: function (data) {
                    console.log(data);
                    $("#uploadinfo").text("文件导入成功！").css("color", "green").css("text-align", "center");

                    setTimeout('closeUploadModal()', 500);
                    $("input[type='file']").attr("disabled", false);
                },
                complete: function (response, status) {
                    console.log(response);
                },
                error: function (response, status) {
                    console.log(response);
                    $("#uploadinfo").text("文件导入失败！请重新导入！").css("color", "red").css("text-align", "center");
                    $("#confirm-import").attr("disabled", false);
                },
                dataType: "json"
            });
        }
        else {
            $("#uploadinfo").text("请先上传文件！").css("color", "red").css("text-align", "center");
            $("#confirm-import").attr("disabled", false);
        }
    });

    $("#exit-import").click(function () {
        closeUploadModal();
    });
}

//=====================================
// 模态框关闭
function closeAddModal() {
    $("#addItemModal").modal("hide");
    $("#btn-submit-add").attr("disabled", false);
    $("#addinfo").text("");
    refreshAfterAddOrDel();
}

function closeDeleteModal() {
    $("#deleteItemModal").modal("hide");
    $("#btn-del-student").attr("disabled", false);
    $("#deleteinfo").text("");
    refreshAfterAddOrDel();
}

function closeUploadModal() {
    $("input[type='file']").attr("disabled", false);
    $("#exportExcelModal").modal("hide");
    $("#confirm-import").attr("disabled", false);
    $("#uploadinfo").text("");
    uploadObj.reset();
    refreshAfterAddOrDel();
}