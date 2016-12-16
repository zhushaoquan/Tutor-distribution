var headworkNumber = ""
var headdepartment = "";

var searchteacher =new Vue({
    el:'#head_unassign',
    data:{
        datas:[],
        department:" "
    },
    methods:{
        refresh:function (index) {
            var radios = $(".check-btn");
            for(var i=0; i<this.datas.length;i++){
                if(i!=index) radios[i].checked=false;
            }
            headworkNumber = this.datas[index].workNumber;
            headdepartment = this.department;
            console.log(headworkNumber);
            console.log(headdepartment);
        }
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
    $("#head_unassign").text("未查询到相关教师！").css("color","red" );
}

function listenSearchEvent() {

    $(".btn-search").click(function () {
        var data = $(this).parent().parent().children();
        var department = data[0].innerText;
        // searchteacher.departments=department;
        var headname = searchCondition();
        if (headname === "") {
            onSearch = false;
            settroublecallback();
        } else {
            onSearch = true;
            $.ajax({
                type:"get",
                data:{
                    headname: headname,
                    department:department
                },
                url:api_select_tutor,
                success:function(data){
                    console.log("success");
                    if(data.result.length !== 0){
                        console.log(data);
                        searchteacher.datas=data.result;
                        searchteacher.department=data.department;
                    }else{
                        settroublecallback();
                    }
                    
                    
                    
                },
                dataType:"json"
            });

            }      
    });
}

function listenSureEvent() {
    $("#result").click(function () {
        console.log(headworkNumber);
        console.log(headdepartment);
        $.ajax({
            type:"get",
            data:{
                workNumber:headworkNumber,

                department:headdepartment
            } , 

            url:api_add_head,
            success:function(data){
                console.log(data);
                if(data){
                    $("#head_unassign").text("选择成功！").css("color","green");
                    $("#result").attr("disabled", true);
                }else{
                    $("#head_unassign").text("选择失败，请返回重新选择！").css("color","red");
                    $("#result").attr("disabled", true);
                }
            },
            error:function(response){
                console.log(response);

                
            },dataType:"json"
        });
    
    });
}

listenSearchEvent();
listenSureEvent();

