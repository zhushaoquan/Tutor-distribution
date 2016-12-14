var onSearch = false;
//===============================
// vue model初始化
var tab_body = new Vue({
    el: '#tab',
    data: {
        datas: []
    }
});

var selectGrade = new Vue({
    el: '#grade-selector',
    data: {
        grades: []
    }
});


initGradeSelect();
initPaginator();
listenEventDel();
listenEventAdd();
listenSelectChage();
listenSearchEvent();


//===============================
//初始化分页组件
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
            var grade = selectedGrade();
            var request = {grade: grade, curPage: page};
            refreshTable(request);
        }
    });
}

//=================================
// 加载表格数据
// @param requset
//        请求参数
// @param url
//        请求地址
function refreshTable(request, url = stuList) {
    console.log("loaddata");
    $.ajax({
        type: "get",
        data: request,
        url: url,
        success: function (data) {
            tab_body.datas = data.information;
            setTotalpages(data.amount);
            // setCurrentPage(currentPage);
        },
        dataType: "json"
    });
}


//===============================
// 获取年级下拉框当前选中项
function selectedGrade() {
    if ($("#grade-selector").val() != null) {
        return $("#grade-selector").val().split("级")[0];
    } else {
        return "2014";
    }
}


//=============================
//下拉框年级改变，刷新表格
function listenSelectChage() {
    $("#grade-selector").change(function () {
        var grade = selectedGrade();
        var requset = {grade: grade, curPage: 1};
        refreshTable(requset);
        setNormalCallback();
    });
}


//================================
// 初始化年级下拉框
function initGradeSelect() {
    $.ajax({
        type: "get",
        url: gradeList,
        success: function (data) {
            selectGrade.grades = data;
        },
        dataType: "json"
    });
}


//================================
// 监听删除弹出框事件
function listenEventDel() {
    $("#btn-colse-del").click(function () {
        location.reload();
    });

    // $("#btn-close-del-above").click(function() {
    //     refreshAfterAddOrDel();
    // });

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
            url: deleteStu,
            success: function (data) {
                if (data) {
                    $("#deleteinfo").text("删除成功!").css("color", "green");
                } else {
                    $("#deleteinfo").text("删除失败!").css("color", "red");
                    $("#btn-del-student").attr("disabled", "false");
                }
            },
            dataType: "json"
        });
    });
}


function refreshAfterAddOrDel() {
    console.log("above");
    if (onSearch) {
        console.log("true");
        var searchStr = searchCondition();
        var grade = selectedGrade();
        var page = getCurrentPage();
        var request = {
            condition: searchStr,
            grade: grade,
            page: page
        }
        //加载搜索数据
        refreshTable(request, searchStu);
    } else {
        console.log("false");
        var grade = selectedGrade();
        var page = getCurrentPage();
        var request = {
            grade: grade,
            page: page
        }
        //加载搜索数据
        refreshTable(request, stuList);
    }
}

//=================================
// 获得选中学生的学号数组
function selectedStuIDs() {
    var stus = $(".chb");
    var ids = new Array();
    for (var i = 0; i < stus.length; ++i) {
        if (stus[i].checked) {
            ids.push(stus[i].id);
        }
    }
    return ids;
}


//点击输入框清楚placeholder
$(".input-add").click(function () {
    $(this).attr("placeholder", " ");
});


//===============================
// 监听添加弹出框的关闭按钮
function listenEventAdd() {
    $("#btn-close-add-bottom").click(function () {
        location.reload();

    });

    // $("#btn-close-add-above").click(function() {
    //     refreshAfterAddOrDel();
    // });

    $("#btn-submit-add").click(function () {
        console.log("submit");
        $("#btn-submit-add").attr("disabled", "disabled");
        var serialNum = $("#stuid").val();
        var name = $("#stuname").val();
        var gender = $("#stugender").val();
        var gpa = $("#stugpa").val();
        var department = $("#studepart").val();
        var rank = $("#sturank").val();
        var grade = $("#stugrade").val();
        console.log(serialNum);
        console.log(name);
        console.log(gender);
        console.log(gpa);
        console.log(department);
        console.log(rank);
        console.log(grade);
        $.ajax({
            type: "post",
            data: {
                serialNum: serialNum,
                name: name,
                gender: gender,
                gpa: gpa,
                department: department,
                rank: rank,
                grade: grade
            },
            url: addStu,
            success: function (data) {
                console.log(data);
                if (data) {
                    $("#addinfo").text("添加成功!").css("color", "green");
                } else {
                    $("#addinfo").text("添加失败!请重新提交").css("color", "red");
                    $("#btn-submit-add").attr("disabled", "false");
                }
            },
            complete: function (response, status) {
                console.log(response);
            },
            dataType: "json"
        });
    });
}


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
                refreshTable(request);
            } else {
                onSearch = true;
                var request = {
                    condition: searchStr,
                    grade: grade,
                    page: page
                }
                //加载搜索数据
                refreshTable(request, searchStu);
                setCurrentPage(1)
                setSearchCallback();
            }
        }
    });
}


function setSearchCallback() {
    var onPageChange = function (page) {
        var grade = selectedGrade();
        var searchStr = searchCondition();
        var request = {
            grade: grade,
            curPage: page,
            condition: searchStr
        };
        refreshTable(request, searchStu);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}


function setNormalCallback() {
    var onPageChange = function (page) {
        var grade = selectedGrade();
        var request = {grade: grade, curPage: page};
        refreshTable(request);
    }
    $('#tab-pagination').jqPaginator('option', {
        onPageChange: onPageChange
    });
}


function setTotalpages(totalPages) {
    $('#tab-pagination').jqPaginator('option', {
        totalPages: totalPages
    });
}


function getCurrentPage() {
    return $("#tab-pagination > .active ").attr("jp-data");
}


function setCurrentPage(currentPage) {
    $('#tab-pagination').jqPaginator('option', {
        currentPage: currentPage
    });
}


function searchCondition() {
    return $("#searchstu").val();
}


var response;
$(document).ready(function () {
    $("#fileuploader").uploadFile({
        url: excel_upload,
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
            $("#uploadinfo").text("文件上传成功！请确认是否导入！").css("color", "green");
            $("input[type='file']").attr("disabled", "disabled");
        },
        onError: function (files, status, message, pd) {
            $("#uploadinfo").text("文件上传失败！").css("color", "red");
        },
        onSelect: function (files) {
            console.log(files);
            if (files[0].name.split(".")[1] == "xls") {
                return true;
            }
            else {
                $("#uploadinfo").text("请选择 .xls 文件！").css("color", "red");
                return false;
            }
        }
    });
});

$("#confirm-import").click(function () {
    $("#confirm-import").attr("disabled", "disabled");
    $.ajax({
        type: "post",
        data: {
            file_path: response.file_path
        },
        url: excel_import,
        success: function (data) {
            console.log(data);
            $("#uploadinfo").text("文件导入成功！").css("color", "green");
            location.reload();
        },
        complete: function (response, status) {
            console.log(response);
        },
        error: function (response, status) {
            console.log(response);
            $("#uploadinfo").text("文件导入失败！请重新导入！").css("color", "red");
            $("#confirm-import").attr("disabled", "false");
        },
        dataType: "json"
    });

});

$("#exit-import").click(function () {
    location.reload();
});