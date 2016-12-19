var teachersubmit =new Vue({
    el:'#modal_body',
    data:{
    	datas:[]
    }
	
});
teachersubmits();
function teachersubmits(){
	$("#submit").click(function(event) {
		$.ajax({
			type:"get",
			data:{
				demo:data3.info

			},
			url:api_tutor_submit,
			success:function(demo){
				console.log(demo);
				teachersubmit.datas=demo;
				console.log(teachersubmit.datas);

			},
			error:function(response){
				console.log(response);
			}
			dataType:"json"
		});
	});
}