 setGradeList();

 var tab_body = new Vue({
     el: '#tab',
     data: {
         datas: []
     }
 });

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
         console.log("onPageChange");
         loadTabData(getCurrentGrade(), n);
     }
 });

 function loadTabData(grade = 2014, page = 1) {
     $.ajax({
         type: "get",
         data: {
             grade: grade,
             curPage: page
         },
         url: stuList,
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
     loadTabData(grade, 1);
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
$("#btn-del-student").click(function(){
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
             console.log(data);
         },
         dataType: "json"
     });
});

//获取选中学生的学号
function getSelectedStus(){
    var stus = $(".chb");
    var ids = new Array();
    for(var i=0;i<stus.length;++i){
        if(stus[i].checked){
            ids.push(stus[i].id);
        }
    }
    return ids;
}


