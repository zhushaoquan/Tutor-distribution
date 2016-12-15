
var searchteacher =new Vue({
    el:'#head_unassign',
    data:{
        datas:[]
    }
});

//点击输入框清楚placeholder
$(".input-add").click(function () {
    $(this).attr("placeholder", " ");
});

//搜索内容
function searchCondition() {
    return $("#searchtea").val();
}

// 查询不到
function settroublecallback() {
    $("#modal-body").text("未查询到相关教师！").css("color","red");
}

function listenSearchEvent() {
    $(".btn-search").click(function () {
        var data = $(this).parent().parent().children();
        var department = data[0];
        var headname = searchCondition();
        if (headname === "") {
            onSearch = false;
        } else {
            onSearch = true;
            $.ajax({
                type:"get",
                data:{
                    headname: headname
                },
                url:api_select_tutor,
                success:function(data){
                    console.log("success");
                    if(data.result.length !== 0){
                        console.log(data);
                        searchteacher.datas=data.result;
                    }else{
                        settroublecallback();
                    }
                    
                    
                    
                },
                dataType:"json"
            });

            }      
    });
}
// 获得选中导师的工号数组
function selectedHeadIDs() {
    var ids = new Array();
    var teachers = searchteacher.datas;
    for (var i = 0; i < teachers.length; ++i) {
        if (teachers[i].checked) {
            ids.push(teachers[i].workNumber);
        }
    }
    return ids;
}
//获得选中系别
function selectedHeadDepartment() {
    var depart = new Array();
    var teachers = searchteacher.datas;
    for (var i = 0; i < teachers.length; ++i) {
        if (teachers[i].checked) {
            ids.push(teachers[i].department);
        }
    }
    return depart;
}

function listenSureEvent() {
    $("#result").click(function () {
        var department = selectedHeadDepartment();
        var workNumber =selectedHeadIDs();
        $.ajax({
            type:"get",
            data:{
                workNumber:workNumber,
                department:department
            } ,
            url:api_add_head,
            success:function(data){
                console.log("success");
                if(data){
                    $("#modal-body").text("选择成功！").css("color","green");
                }else{
                    $("#modal-body").text("选择失败，请返回重新选择！").css("color","red");
                }
            },
                dataType:"json"
        });
    
    });
}

listenSearchEvent();
listenSureEvent();

