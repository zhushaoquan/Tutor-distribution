var onSearch = false;
//设置年级下拉框
setGradeList();

//使用vue绑定数据到表格
var tab_body = new Vue({
    el: '#tab',
    data: {
        datas: []
    }
});

//初始化分页
$('#tab-pagination').jqPaginator({
    totalPages: 9,
    visiblePages: 8,
    currentPage: 1,
    first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
    prev: '<li class="prev"><a href="javascript:void(0);">‹<\/a><\/li>',
    next: '<li class="next"><a href="javascript:void(0);">›<\/a><\/li>',
    last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
    page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
    onPageChange: function(n) {
        console.log("page" + n);
        var grade = getCurrentGrade();
        loadTabData({ grade: grade, curPage: n });
    }
});

function loadTabData(datas, url = teaList) {
    console.log("loaddata");
    $.ajax({
        type: "get",
        data: datas,
        url: url,
        success: function(data) {
            tab_body.datas = data.information;
            $('#tab-pagination').jqPaginator('option', {
                totalPages: data.amount
            });
            console.log(data.information);
        },
        dataType: "json"
    });
}

function getCurrentGrade() {
    if ($("#grade-selector").val() != null) {
        return $("#grade-selector").val().split("级")[0];
    } else {
        return "2014";
    }
}


//下拉框年级改变，刷新表格
$("#grade-selector").change(function() {
    var grade = getCurrentGrade();
    loadTabData({ grade: grade, curPage: 1 });
});

function setGradeList() {
    var selectGrade = new Vue({
        el: '#grade-selector',
        data: {
            grades: []
        }
    });

    $.ajax({
        type: "get",
        url: gradeList,
        success: function(data) {
            selectGrade.grades = data;
        },
        dataType: "json"
    });
}



//点击删除按钮
$("#btn-del-student").click(function() {
    $("#btn-del-student").attr("disabled", "disabled");
    var grade = getCurrentGrade();
    var ids = getSelectedStus();
    $.ajax({
        type: "get",
        data: {
            grade: grade,
            serialNum: ids
        },
        url: deleteStu,
        success: function(data) {
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


//点击关闭按钮
$("#btn-colse-del").click(function() {
    location.reload();
});
$("#btn-close-del-above").click(function() {
    location.reload();
});



//获取选中学生的学号
function getSelectedStus() {
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
$(".input-add").click(function() {
    $(this).attr("placeholder", " ");
});


$("#btn-close-add-bottom").click(function() {
    console.log("close0");
    location.reload();
});

$("#btn-close-add-above").click(function() {
    console.log("close1")
    location.reload();
});

$("#btn-submit-add").click(function() {
    console.log("submit");
    $("#btn-submit-add").attr("disabled", "disabled");

    var serialNum = $("#teaid").val();
    var name = $("#teaname").val();
    var gender = $("#teagender").val();
    var passwd = $("#teapasswd").val();
    var grade = $("#teagrade").val();

    console.log(serialNum);
    console.log(name);
    console.log(gender);
    console.log(passwd);

    $.ajax({
        type: "post",
        data: {
            serialNum: serialNum,
            name: name,
            gender: gender,
            grade: grade,
            passwd: passwd
        },
        url: addStu,
        success: function(data) {
            console.log(data);
            if (data) {
                $("#addinfo").text("添加成功!").css("color", "green");
            } else {
                $("#addinfo").text("添加失败!请重新提交").css("color", "red");
                $("#btn-submit-add").attr("disabled", "false");
            }
        },
        complete: function(response, status) {
            console.log(response);
        },
        dataType: "json"
    });
});


//搜索
$("#searchstu").keydown(function(event) {
    isOnsearch = true;
    if (event.which == "13") {
        var searchStr = $(this).val();
        var grade = getCurrentGrade();
        var page = 1;
        l
    }
});
