//vue modal初始化
var choice_out =new Vue({
	el:'#choiceout',
	data:{
		datas: []
	}
});



// //获得选择学生的sid
// function selectchoice(){
// 	var sid= $("#select1").attr("value");
// 	return sid;
// }


refreshout();

//  加载弹出框里面的信息
function refreshout(){
	$("#select1").click(function(){
		var sid=$($("#select1").parent().parent().children().get(0)).children().val();
		console.log(sid);
		
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
