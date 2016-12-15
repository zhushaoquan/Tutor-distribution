
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
    $("#searchbutton").click(function () {

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
                    console.log(data);
                    if(data){
                        console.log(data);
                        searchteacher.datas=data.result
                    }else{
                        settroublecallback();
                    }
                },
                dataType:"json"
            });

            }      
    });
}
listenSearchEvent();
