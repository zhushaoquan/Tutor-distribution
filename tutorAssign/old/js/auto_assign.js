
/**
 * Created by wythe on 2016/12/15.
 */

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
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
            {
                sid:"1",
                serialNum:"031402209",
                name:"Mike",
                vol1:"导师",
                vol2:"导师",
                vol3:"导师",
                vol4:"导师",
                vol5:"导师"
            },
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
            console.log("assign");
            var request = {

            };
            // loadTeacherTable();
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
            console.log("confirm");
            var requset = {

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
            refreshTotalpages(data.amount);
        },
        error: function (response) {

        },
        dataType: "json"
    });
}


//===============================
// 加载导师列表
function loadTeacherTable() {
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
            $(".modal-body").text("分配成功").css("color","green").css("text-align","center");
            location.reload();
        },
        error:function (response) {
            $(".modal-body").text("网络错误").css("color","red").css("text-align","center");
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
                
            };
            // refreshStudentTable(request,api_unassigned_student_list,"get");
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


function enableConfirmBtns() {

}


function disableConfirmBtns() {

}


$("#btn-close-assign").click(function () {
    location.reload();
});