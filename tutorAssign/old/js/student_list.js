//vue modal初始化
var choice_out =new Vue({
	el:'#choiceout',
	data:{
		datas: []
	}
});

refreshout();
var sid="";
//  加载弹出框里面的信息
function refreshout(){
	$('.select').click(function(){
		 sid=$(this).parent().parent().children().get(0).innerText;
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

refreshrejectout();
//  加载拒绝弹出框里面的信息
function refreshrejectout(){
	$('.reject').click(function(){
		sid=$(this).parent().parent().children().get(0).innerText;
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
