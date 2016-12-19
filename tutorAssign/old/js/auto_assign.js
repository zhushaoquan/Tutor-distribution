
/**
 * Created by wythe on 2016/12/15.
 */

var serialNum = "";

//==============================
// Vue 绑定到表格
var vm_table_student = new Vue({
    el: "#table-student",
    data: {
        datas: [
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            }
        ]
    },
    methods: {
        assign:function (index) {
            serialNum = this.datas[index].serialNum;
            // console.log("assign");
            var request = {};
            loadTeacherTable(request,api_unassigned_teacher_list,"get");
        }
    }
});

var vm_table_teacher = new Vue({
    el: "#table-teacher",
    data: {
        datas: [
            {
                sid:"01",
                name:"黄伟炜",
                isExperial:"是",
                js_need:"2",
                js_cur:"2",
                ss_need:"2",
                ss_cur:"2",
                nature_need:"2",
                nature_cur:"2"
            }
        ]
    },
    methods: {
        confirm:function (index) {
            // console.log("confirm");
            disableConfirmBtns();
            var requset = {
                serialNum:serialNum,
                workNumber:this.datas[index].workNumber
            };
            assignTeacher(requset,api_assign_page1_confirm,"get");
        }
    }
});

//===============================
// 初始化
initPaginator();


//===============================
// 刷新学生表格
function refreshStudentTable(request,url,method) {
    $.ajax({
        type: method,
        data: request,
        url: url,
        success: function (response) {
            vm_table_student.datas = response.information;
            refreshTotalpages(response.amount);
        },
        error: function (response) {

        },
        dataType: "json"
    });
}


//===============================
// 加载导师列表
function loadTeacherTable(request,url,method) {
    $.ajax({
        type:method,
        data:request,
        url:url,
        success:function (response) {
            vm_table_teacher.datas = response.information;
        },
        error:function (response) {

        },
        dataType:"json"
    });
}

//===============================
// 确认分配导师
function assignTeacher(request, url, method) {
    $.ajax({
        type:method,
        url:url,
        data:request,
        success:function (response) {
            console.log("success"+response);
            $("#teacher-table").css("display","none");
            $("#alert-info").text("分配成功").css("color","green").css("text-align","center");
            // location.reload();
            var page = getCurrentPage();
            var request = {
                curPage:page
            };
            enableConfirmBtns();
            refreshStudentTable(request,api_unassigned_student_list,"get");
            setTimeout('$("#assignModal").modal("hide")',300);
            $("#alert-info").text("");
            $("#teacher-table").css("display","block");
        },
        error:function (response) {
            console.log("failed");
            $("#teacher-table").css("display","none");
            $("#alert-info").text("网络错误").css("color","red").css("text-align","center");
            enableConfirmBtns();
        },
        dataType: "json"
    });
}


//===============================
// 初始化分页组件
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
            var request = {
                curPage:page
            };
            refreshStudentTable(request,api_unassigned_student_list,"get");
        }
    });
}

//==============================
// 更新分页组件总页数
function refreshTotalpages(totalPages) {
    if(totalPages != 0){
        $('#tab-pagination').jqPaginator('option', {
            totalPages: totalPages
        });
    }
    else {
        $('#tab-pagination').jqPaginator('option', {
            totalPages: 1
        });
    }
}


//==============================
// 获得当前页
function getCurrentPage() {
    return $("#tab-pagination > .active ").attr("jp-data");
}


function enableConfirmBtns() {
    $(".btn-modal-assign-confirm").attr("disabled",false);
}


function disableConfirmBtns() {
    $(".btn-modal-assign-confirm").attr("disabled",true);
}


$("#btn-close-assign").click(function () {
    // location.reload();
    $("#alert-info").text("");
    $("#teacher-table").css("display","block");
});

$("#go-to-assign2").click(function () {
    $("#info").text("确认进行智能分配？").addClass("info-modal");
});

$("#confirm-skip").click(function () {
    window.location.href=$("#go-to-assign2").attr("link");
    console.log($("#go-to-assign2").attr("link"));
});