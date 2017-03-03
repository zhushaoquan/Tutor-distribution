
/**
 * Created by wythe on 2016/12/15.
 *
 * 踩坑提示:
 * 1、jqPaginator 的总页数不能为0
 * 2、jqPaginator 在初始化时，会调用一次onPageChange
 *
 */

var serialNum = "";

//==============================
// Vue 绑定到表格
var vm_table_student = new Vue({
    el: "#table-student",
    data: {
        datas: [],
        isNull:false,
        isError:false
    },
    computed:{
        isOk:function () {
            return this.isNull || this.isError;
        }
    },
    methods: {
        assign:function (index) {
            serialNum = this.datas[index].serialNum;
            // console.log("assign");
            var request = {};
            loadTeacherTable(request,api_unassigned_teacher_list,"get");
            $("#teacher-table").css("display","block");
            $("#alert-info").css("display","none");
        }
    }
});

var vm_table_teacher = new Vue({
    el: "#table-teacher",
    data: {
        datas: [],
        isNull:false
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
            vm_table_student.isError = false;
            vm_table_student.datas = response.information;
            if(response.amount !=0 ){
                refreshTotalpages(response.amount);
                vm_table_student.isNull = false;
            }else{
                refreshTotalpages(1);
                vm_table_student.isNull = true;
            }
        },
        error: function (response) {
            vm_table_student.isError = true;
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

            $("#alert-info").css("display","block");
            if(response.status){
                $("#alert-info").text("分配成功").css("color","green").css("text-align","center");
            }
            else{
                $("#alert-info").text("分配失败").css("color","red").css("text-align","center");
            }
            // location.reload();
            var page = getCurrentPage();
            var request = {
                curPage:page
            };
            enableConfirmBtns();
            refreshStudentTable(request,api_unassigned_student_list,"get");
            setTimeout('$("#assignModal").modal("hide")',1000);
            // $("#teacher-table").css("display","block");
        },
        error:function (response) {
            console.log("failed");

            $("#teacher-table").css("display","none");

            $("#alert-info").css("display","block");
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


//=============================
// 按钮的禁用与启用
function enableConfirmBtns() {
    $(".btn-modal-assign-confirm").attr("disabled",false);
}
function disableConfirmBtns() {
    $(".btn-modal-assign-confirm").attr("disabled",true);
}



//===============================
// 关闭弹窗
$("#btn-close-assign").click(function () {
    // location.reload();
    $("#alert-info").text("");
    $("#alert-info").css("display","none");
    $("#teacher-table").css("display","block");
    var request = {
        curPage:getCurrentPage()
    };
    refreshStudentTable(request,api_unassigned_student_list,"get");
});

//==================================
//弹窗提示
$("#go-to-assign2").click(function () {
    $("#info").text("确认进行智能分配？").addClass("info-modal");
});


//==================================
// 确认进行智能分配
$("#confirm-skip").click(function () {
    var result_link = $("#go-to-assign2").attr("link");
    $("#info").text("智能匹配需要一会，稍候跳转到结果页面").addClass("info-modal");
    this.disabled="disabled"
    $.ajax({
        type:"get",
        data:{},
        url:api_auto_assign,
        success:function (response) {
            location.href = result_link;
        },
        error:function () {

        },
        dataType:"json"
    });
});