//vue modal初始化
var choice_out =new Vue({
	el:'#choiceout',
	data:{
		datas: []
	}
});



//获得选择学生的sid
function selectchoice(){
	var sid= $("#select1").attr("value");
	return sid;
}


refreshout();
listenEventChoice();
//  加载弹出框里面的信息
function refreshout(){
	$("#select1").click(function(){
		var sid=selectchoice();
		$.ajax({
			type:"get",
			data:{
				sid: sid
			},
			url: api_show_student_detail,
			success:function(data){
				choice_out.datas =data.student;
				console.log(data);
			},
			error:function() {
				/* Act on the event */
				console.log("error");
			},
			dataType:"json"
		});
     });
}

// //弹出框里中选学生的sid
// function selectsid(){
// 	var radio = $(".radio");
// 	if (radio.checked){
// 		radio.push(radio.sid);
// 	}
// 	return radio;
// }

// //监听选择弹出框事件
// function listenEventChoice(){
// 	$("#choiceclose").click(function(){
// 		location.reload();
// 	});
// 	$("#choiceagain").click(function(){
// 		$("#choiceagain").attr("disabled","disabled");
// 		var sid=selectsid();
// 		$.ajax({
// 			type:"get",
// 			data:{
// 				sid:radio
// 			},
// 			url:"{{$Think.const.PREFIX}}/TeacherTutor/show_studentdetail",
// 			success:function(data){
// 				if(data){
// 					$("#failed").text("选择失败!").css("color","res");
// 				}else{
// 					$("#failed").text("选择成功!").css("color","green");
// 					$("#choiceagain").attr("disabled","false");
// 				}
// 			},
// 		});
// 	});
// }

//vue modal初始化
var reject_out =new Vue({
	el:'#rejectout',
	data:{
		datas: []
	}
});



//获得拒绝学生的sid
function selectrejectchoice(){
	var sid= $("#reject").attr("value");
	return sid;
}

refreshrejectout();
//  加载拒绝弹出框里面的信息
function refreshrejectout(){
	$("#reject").click(function(){
		var sid=selectrejectchoice();
		$.ajax({
			type:"get",
			data:{
				sid: sid
			},
			url: api_show_student_detail,
			success:function(data){
				reject_out.datas =data.student;
				console.log(data);
			},
			error:function() {
				/* Act on the event */
				console.log("error");
			},
			dataType:"json"
		});
     });
}
