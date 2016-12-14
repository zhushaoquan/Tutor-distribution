//vue modal初始化
var choice_out =new vue({
	el:'#choiceout',
	data:{
		datas: []
	}
});
//获得选择学生的sid
function selectchoice(){

	var value= $("#choicesss").val();
	return value;
}
//  加载弹出框里面的信息
function refreshout(){
	$("#choicesss").click(function(){
		var sid=selectchoice();
		$.ajax({
			type:"get",
			data: {
				sid:sid,

			},
			url:choicestu,
			success:function(data){
				choice_out.datas =data.information;
				console.log(data.information);
			},
			datatype:"json"
		});


     });
}
//弹出框里中选学生的sid
function selectsid(){
	var radio = $(".radio");
	if (radio.checked){
		radio.push(radio.sid);
	}
	return radio;
}
//监听选择弹出框事件
function listenEventChoice(){
	$("#choiceclose").click(function(){
		location.reload();
	});
	$("#choiceagain").click(function(){
		$("#choiceagain").attr("disabled","disabled");
		var sid=selectsid();
		$.ajax({
			type:"get",
			data:{
				sid:radio;
			},
			url:{{$Think.const.PREFIX}}/TeacherTutor/show_studentdetail,
			success:function(data){
				if(data){
					$("#failed").text("选择失败!").css("color","res");
				}else{
					$("#failed").text("选择成功!").css("color","green");
					$("#choiceagain").attr("disabled","false");
				}
			},
		});
	});
}