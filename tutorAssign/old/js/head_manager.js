
var search =new Vue({
    el:'#head_unassign';
    data:{
        nums : [],
        names: []
    }
});
//加载数据
function refreshTable(request, url = ) {
    console.log("loaddata");
    $.ajax({
        type: "get",
        data: request,
        url: url,
        success: function (data) {
            search.nums=data.nums;
            search.names=data.names;
        },
        dataType: "json"
    });
}
function listenSearchEvent() {
    $("#searchbutton").click(function () {

        var searchname = searchCondition();
        if (searchtea === "") {
            onSearch = false;
            settroublrcallback();
        } else {
            onSearch = true;
            var request = {
            nums=searchname,

            }
            //加载搜索数据
            refreshTable(request, url);
            }
    });
}
// 查询不到
function settroublecallback() {
    $("#modal-body").text("未查询到相关教师！").css("color","red");
    }
}
//搜索内容
function searchCondition() {
    return $("#searchtea").val();
}
