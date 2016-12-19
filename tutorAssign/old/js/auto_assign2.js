/**
 * Created by wythe on 2016/12/17.
 */

/**
 * Created by wythe on 2016/12/15.
 */
var isInit = true;
var stu_main_index = "";
var last_page = 1;

$("#confirm-this-page").click(function () {
    var info = new Array();
    $.ajax({
        type: "get",
        data: {

        },
        url: "",
        success: function (response) {

        },
        error: function (response) {

        }
    });
});


//==============================
// Vue 绑定到表格
var vm_table_student_main = new Vue({
    el: "#table-student-main",
    data: {
        datas: [
            {
                serialNumber:"031402209",
                student_name:"黄伟炜",
                vol_num:"2",
                gpa:"4.5",
                teacher_name:"张东",
                workNumber:"00001"
            },
            {
                serialNumber:"031402209",
                student_name:"黄伟炜",
                vol_num:"2",
                gpa:"4.5",
                teacher_name:"张东",
                workNumber:"00001"
            }
        ]
    },
    methods: {
        changeTeacher: function (index) {
            console.log("change");
            stu_main_index = index;

            var request = {};
            loadTeacherModalTable(request,api_unassigned_teacher_list,"get");
        }
    }
});

var vm_table_teacher_modal = new Vue({
    el: "#table-teacher-modal",
    data: {
        datas: [
            {
                sid:"01",
                name:"大东东",
                isExperial:"是",
                js_need:"2",
                js_cur:"2",
                ss_need:"2",
                ss_cur:"2",
                nature_need:"2",
                nature_cur:"2",
                workNumber:"00001"
            },
            {
                sid:"02",
                name:"黄伟炜",
                isExperial:"是",
                js_need:"2",
                js_cur:"2",
                ss_need:"2",
                ss_cur:"2",
                nature_need:"2",
                nature_cur:"2",
                workNumber:"00002"
            },
            {
                sid:"03",
                name:"小东东",
                isExperial:"是",
                js_need:"2",
                js_cur:"2",
                ss_need:"2",
                ss_cur:"2",
                nature_need:"2",
                nature_cur:"2",
                workNumber:"00003"
            }

        ]
    },
    methods: {
        confirm: function (index) {
            console.log("confirm");

            //更新学生表格 的导师信息
            vm_table_student_main.datas[stu_main_index].teacher_name
                = this.datas[index].name;
            vm_table_student_main.datas[stu_main_index].workNumber
                = this.datas[index].workNumber;

            //关闭模态框
            $("#teacherModal").modal('hide');
        }
    }
});

//===============================
// 初始化
initPaginator();


//===============================
// 刷新学生表格
function refreshStudentTable(request, url, method) {
    $.ajax({
        type: method,
        data: request,
        url: url,
        success: function (response) {
            vm_table_student_main.datas = response.information;
            if(response.amount != 0) refreshTotalpages(response.amount);
            else refreshTotalpages(1);
        },
        error: function (response) {

        },
        dataType: "json"
    });
}


//===============================
// 刷新导师列表
function loadTeacherModalTable(request, url, method) {
    $.ajax({
        type: method,
        data: request,
        url: url,
        success: function (response) {
            vm_table_teacher_modal.datas = response.information;
        },
        error: function (response) {

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

            var request;
            request = {
                curPage:page,
            };
            refreshStudentTable(request,api_assigned_student_list,"get");

            last_page = page;
        }
    });
}


//==============================
// 更新分页组件总页数
function refreshTotalpages(totalPages) {
    $('#tab-pagination').jqPaginator('option', {
        totalPages: totalPages
    });
}


//==============================
// 获得当前页
function getCurrentPage() {
    return $("#tab-pagination > .active ").attr("jp-data");
}


//=====================================
// 确认所有结果
$("#btn-confirm-result-pop").click(function () {

    //触发弹窗
    $("#info").text("对 48/52 条结果进行确认？").addClass("info-modal");
    $.ajax({
        type:"get",
        data:{

        },
        url:api_confirm_cur_page,
        success:function (response) {
            if(response.status){

            }else {

            }
        },
        error:function () {

        },
        dataType:"json"
    });
});


$("#btn-confirm-all-result").click(function () {

    //确认最终结果
    $.ajax({
        type:"get",
        data:{

        },
        url:api_confirm_all_result,
        success:function () {

        },
        error:function () {

        },
        dataType:"json"
    });
});



//====================================
// 确认当前页结果
function confirmThisPage() {
    var request = {
        curPage:getCurrentPage(),
        check:getCurPageInfo()
    };

    $.ajax({
        type:"get",
        data:request,
        url:api_confirm_cur_page,
        success:function (response) {

        },
        dataType:"json"
    });
}


function getCurPageInfo() {
    var check = [];
    for(item of vm_table_student_main.datas){
        if(item.checked){
            check.push({
                serialNum:item.serialNum,
                workNumber:item.workNumber,
                checked:true
            });
        }else {
            check.push({
                serialNum:item.serialNum,
                workNumber:item.workNumber,
                checked:false
            });
        }
    }

    return check;
}


$("#btn-confirm-cur-page").click(function () {

});