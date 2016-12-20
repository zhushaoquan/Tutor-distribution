/**
 * Created by weeway on 2016/12/17.
 *
 * 踩坑提示:
 * 1、jqPaginator 的总页数不能为0
 * 2、jqPaginator 在初始化时，会调用一次onPageChange
 *
 */


var isInit = true;
var stu_main_index = "";


//==============================
// Vue 绑定到表格
var vm_table_student_main = new Vue({
    el: "#table-student-main",
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
        datas: [],
        isNull:false
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
function refreshStudentTable(request, url, method,reject_data=false) {
    $.ajax({
        type: method,
        data: request,
        url: url,
        success: function (response) {
            vm_table_student_main.isError = false;
            if(!reject_data){
                vm_table_student_main.datas = response.information;
                if(response.amount != 0) {
                    refreshTotalpages(response.amount);
                    vm_table_student_main.isNull = false;
                }
                else {
                    refreshTotalpages(1);
                    vm_table_student_main.isNull = true;
                }
            }
        },
        error: function (response) {
            vm_table_student_main.isError = true;
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

            if(isInit){
                refreshStudentTable({
                    curPage:page,
                    check:""
                },
                api_assigned_student_list,
                "get");
                isInit = false;
            }else {
                console.log(getCurPageInfo());
                refreshStudentTable({
                    curPage:page,
                    check:getCurPageInfo()
                },
                api_assigned_student_list,
                "get");
            }
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

    //更新本页值到服务器，保持本地数据不变
    refreshStudentTable({
            curPage:getCurrentPage(),
            check:getCurPageInfo()
        },
        api_assigned_student_list,
        "get",true);

    //等待数据插入数据库，再调用接口，保证数据一致
    setTimeout(getResult, 500);

    function getResult() {
        $.ajax({
            type:"get",
            data:{
            },
            url:api_final_result,
            success:function (response) {
                $("#info").text("对"+
                    response.check+
                    "/"+
                    response.total+
                    "条结果进行确认？")
                    .addClass("info-modal");
            },
            error:function () {

            },
            dataType:"json"
        });
    }
});


$("#btn-confirm-all-result").click(function () {
    // console.log(getCurPageInfo());



    //确认最终结果
    var auto_assign_link = $(this).attr("link");
    $(this).attr("disabled",true);
    $.ajax({
        type:"get",
        data:{
        },
        url:api_confirm_all_result,
        success:function () {
            location.href = auto_assign_link;
        },
        error:function () {
            $("#info").text("服务器出错！处理失败！").css("color","red").css("text-align","center");
            $(this).attr("disabled",false);
        },
        dataType:"json"
    });
});

//========================================
// 关闭弹窗清除提示信息
$("#btn-close-cancel").click(function () {
    console.log("close");
    refreshStudentTable({
            curPage:getCurrentPage(),
            check:""
        },
        api_assigned_student_list,
        "get");
    $("#info").text("");
});


//========================================
// 获取当前页的选中信息
function getCurPageInfo() {
    var check = [];
    for(item of vm_table_student_main.datas){
        if(item.checked){
            check.push({
                serialNum:item.serialNum,
                // workNumber:item.workNumber,
                checked:true
            });
        }else {
            check.push({
                serialNum:item.serialNum,
                // workNumber:item.workNumber,
                checked:false
            });
        }
    }
    return check;
}