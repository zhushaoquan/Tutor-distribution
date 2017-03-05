//============================
//踩坑提示：
//如果totalpage为0，需要将其设置为1
//在设置totalpage之前需要将currentPage设置成1

var onSearch = false;
isInit = true;
//===============================
// 学生列表
var table_student = new Vue({
    el: '#tab',
    data: {
        datas: [],
        isNull:false
    }
});

//=========================
// 年级下拉框
var selector_grade = new Vue({
    el: '#grade-selector',
    data: {
        grades: []
    }
});

//===========================
// 添加学生
var student_added = new Vue({
    el: '#info-student',
    data:{
        serialNum:"",
        name:"",
        gender:"",
        gpa:"",
        department:"",
        rank:"",
        grade:"",
        telephone:""
    }
});

//===========================
// 删除学生
var student_deleted = new Vue({
    el:"#info-del",
    data:{
        datas:[],
        isNull:false
    }
});

//==========================
// 初始化
initGradeSelect();
initPaginator();
initUpload();
listenEventDel();
listenEventAdd();
listenSelectChage();
listenSearchEvent();


//===============================
// 分页组件
// 初始化会调用一次onPageChange
// 由于initGradeSelect()中年级列表是异步回调，无法立即将值获取传给onPageChange
// 所以第一次刷新界面放到 initGradeSelect() 成功获取数据之后
function initPaginator() {
    $('#tab-pagination').jqPaginator({
        totalPages: 9,
        visiblePages: 8,
        currentPage: 1,
        first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
        prev: '<li class="prev"><a href="javascript:void(0);">‹<\/a><\/li>',
        next: '<li class="next"><a href="javascript:void(0);">›<\/a><\/li>',
        last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
        page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
        onPageChange: function (page) {
            // if(!isInit){
            //     isInit = false;
            //     var grade = selectedGrade();
            //     var request = {grade: grade, curPage: page};
            //     refreshTable(request,api_student_list);
            // }
        }
    });
}

//=================================
// 加载表格数据
// @param request
//        请求参数
// @param url
//        请求地址
function refreshTable(request, url) {
    $.ajax({
        type: "get",
        data: request,
        url: url,
        success: function (data) {
            //noinspection JSUnresolvedVariable
            table_student.datas = data.information;
            //noinspection JSUnresolvedVariable
            if(data.amount!=0){
                //noinspection JSUnresolvedVariable
                setTotalpages(data.amount);
                table_student.isNull = false;
            }
            else{
                setCurrentPage(1);
                setTotalpages(1);
                table_student.isNull = true;
            }
        },
        dataType: "json"
    });
}



//===============================
// 获取年级下拉框当前选中项
function selectedGrade() {
    console.log("call selectedGrade");
    if ($("#grade-selector").val() != null) {
        return $("#grade-selector").val().split("级")[0];
    } else {
        return selector_grade.grades[0].grade;
    }
}


//=============================
//下拉框年级改变，刷新表格
function listenSelectChage() {
    $("#grade-selector").change(function () {
        console.log("grade change");
        var grade = selectedGrade();
        var requset = {grade: grade, curPage: 1};
        setCurrentPage(1);
        refreshTable(requset,api_student_list);
        setNormalCallback();
    });
}


//================================
// 初始化年级下拉框
function initGradeSelect() {
    $.ajax({
        type: "get",
        url: api_grade_list,
        success: function (data) {
            selector_grade.grades = data;
            console.log("initGradeSelect:"+selectedGrade());
            var request = {grade: selectedGrade, curPage: 1};
            refreshTable(request,api_student_list);
            setNormalCallback();
        },
        dataType: "json"
    });
}


//================================
// 监听删除弹出框事件
function listenEventDel() {
    $("#btn-colse-del").click(function () {
        $("#deleteinfo").text("");
        refreshAfterAddOrDel();
    });

    $("#btn-del-student").click(function () {
        $("#btn-del-student").attr("disabled", "disabled");
        var grade = selectedGrade();
        var ids = selectedStuIDs();
        $.ajax({
            type: "get",
            data: {
                grade: grade,
                serialNum: ids
            },
            url: api_student_delete,
            success: function (data) {
                if (data) {
                    $("#deleteinfo").text("删除成功!").css("color", "green");
                    refreshAfterAddOrDel();
                    setTimeout('$("#deletItemModal").modal("hide")',500);
                    $("#btn-del-student").attr("disabled", false);
                } else {
                    $("#deleteinfo").text("删除失败!").css("color", "red");
                    $("#btn-del-student").attr("disabled", false);
                }
            },
            error:function () {
                $("#deleteinfo").text("网络错误").css("color", "red");
                $("#btn-del-student").attr("disabled", false);
            },
            dataType: "json"
        });
    });
}

//==============================
// 刷新学生列表
function refreshAfterAddOrDel() {
    if (onSearch) {
        console.log("true");
        var searchStr = searchCondition();
        var grade = selectedGrade();
        var page = getCurrentPage();
        var request = {
            condition: searchStr,
            grade: grade,
            curPage: page
        }
        //加载搜索数据
        refreshTable(request, api_student_search);
    } else {
        console.log("false");
        var grade = selectedGrade();
        var page = getCurrentPage();
        var request = {
            grade: grade,
            curPage: page
        }
        //加载正常数据
        refreshTable(request, api_student_list);
    }
}

//=================================
// 获得选中学生的学号数组
function selectedStuIDs() {
    var IDs = [];
    for(item of table_student.datas){
        if(item.checked) IDs.push(item.serialNum);
    }
    return IDs;
}

//================================
// 点击输入框清除 placeholder
$(".input-add").click(function () {
    $(this).attr("placeholder", " ");
});


//===============================
// 监听添加学生弹出框
function listenEventAdd() {
    $("#btn-close-add-bottom").click(function () {
        $("#addinfo").text("");
        refreshAfterAddOrDel();
    });


    $("#btn-submit-add").click(function () {
        console.log("submit");
        $("#btn-submit-add").attr("disabled", "disabled");
        $.ajax({
            type: "post",
            data: {
                serialNum: student_added.serialNum,
                name: student_added.name,
                gender: student_added.gender,
                gpa: student_added.gpa,
                department: student_added.department,
                rank: student_added.rank,
                telephone:student_added.telephone,
                grade: student_added.grade
            },
            url: api_student_add,
            success: function (data) {
                if (data.status) {
                    $("#addinfo").text("添加学生成功!").css("color", "green");
                    $("#btn-submit-add").attr("disabled", false);
                } else {
                    $("#addinfo").text("该学生已存在!").css("color", "red");
                    $("#btn-submit-add").attr("disabled", false);
                }
            },
            error: function (response, status) {
                $("#addinfo").text("添加失败!请重新提交").css("color", "red");
                $("#btn-submit-add").attr("disabled", false);
            },
            dataType: "json"
        });
    });

    
}

//==============================
// 监听搜索事件（回车）
function listenSearchEvent() {
    $("#searchstu").keydown(function (event) {
        if (event.which == "13") {
            console.log("enter");

            var searchStr = searchCondition();
            var grade = selectedGrade();
            var page = 1;

            if (searchStr === "") {
                onSearch = false;
                setNormalCallback();
                var grade = selectedGrade();
                var page = getCurrentPage();
                var request = {grade: grade, curPage: 1};
                setCurrentPage(1);
                refreshTable(request,api_student_list);
            } else {
                onSearch = true;
                var request = {
                    condition: searchStr,
                    grade: grade,
                    curPage: page
                }
                //加载搜索数据
                refreshTable(request, api_student_search);
                setCurrentPage(1)
                setSearchCallback();
            }
        }
    });
}

//===============================
// 搜索情况下的 onPageChange 回调
function setSearchCallback() {
    var onPageChange = function (page) {
        var grade = selectedGrade();
        var searchStr = searchCondition();
        var request = {
            grade: grade,
            curPage: page,
            condition: searchStr
        };
        refreshTable(request, api_student_search);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}

//=============================
// 非搜索情况下的 onPageChange 回调(pagainto)
function setNormalCallback() {
    var onPageChange = function (page) {
        var grade = selectedGrade();
        var request = {grade: grade, curPage: page};
        refreshTable(request,api_student_list);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}

//=================================
// 设置总页数
function setTotalpages(totalPages) {
    $('#tab-pagination').jqPaginator('option', {
        totalPages: totalPages
    });
}

//================================
// 获得当前页
function getCurrentPage() {
    return $("#tab-pagination > .active ").attr("jp-data");
}

//================================
// 设置当前页
function setCurrentPage(currentPage) {
    $('#tab-pagination').jqPaginator('option', {
        currentPage: currentPage
    });
}

//================================
// 获得搜索字符串
function searchCondition() {
    return $("#searchstu").val();
}


var uploadObj;
//===================================
//  文件上传
function initUpload() {
    var response = "";
    uploadObj = $("#fileuploader").uploadFile({
        url: api_student_excel_upload,
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
                url: api_student_excel_import,
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

//================================
// 关闭文件上传弹窗
function closeUploadModal() {
    $("input[type='file']").attr("disabled", false);
    $("#exportExcelModal").modal("hide");
    $("#confirm-import").attr("disabled", false);
    $("#uploadinfo").text("");
    uploadObj.reset();
    refreshAfterAddOrDel();
}


//===============================
// 触发删除学生弹窗
$("#delete-item").click(function () {
    var arr = [];
    for(item of table_student.datas){
        if(item.checked){
            arr.push(item);
        }
    }
    student_deleted.datas = arr;

    if(student_deleted.datas.length != 0){
        student_deleted.isNull = false;
    }else {
        student_deleted.isNull = true;
    }
});