
var search =new Vue({
    el:'#head_unassign';
    data:{
        datas:[]
    }
});
//点击输入框清楚placeholder
$(".input-add").click(function () {
    $(this).attr("placeholder", " ");
});
// //加载数据
// function refreshTable() {
//     console.log("loaddata");
//     $.ajax({
//         type: "get",
//         data: {
//             headname:headname
//         }
//         url: api_select_tutor,
//         success: function (data) {
//             search.nums=data.nums;
//             search.names=data.names;
//         },
//         dataType: "json"
//     });
// }

function listenSearchEvent();

//搜索内容
function searchCondition() {
    return $("#searchtea").val();
}

// 查询不到
function settroublecallback() {
    $("#modal-body").text("未查询到相关教师！").css("color","red");
    }
}

function listenSearchEvent() {
    $("#searchbutton").click(function (event) {

        var searchname = searchCondition();
        if (searchname === "") {
            onSearch = false;
        } else {
            onSearch = true;
            $.ajax({
                type:"get"
                data:{
                    headname:searchname
                },
                url:api_select_tutor,
                success:function(data){
                    if(data){
                        search.datas=data.result
                    }else{
                        settroublecallback();
                    }
                }
            });

            }
            
            }
    });
}
