//vue modal初始化
var submits =new Vue({
	el:'#submit',
	data:{
		datas: []
	}
});

submit();
function submit(){
	$('#submit').click(function(){
		$.ajax({
			type:"get";
			data:{}

		});

	});
}