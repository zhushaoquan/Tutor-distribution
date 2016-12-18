var teachersubmit =new Vue({
    el:'#modal_body',
    data:{
    datas[]
    }
	
});
teachersubmits();
function teachersubmits(){
	$("#submit").click(function(event) {
		$.ajax({
			typr:"post",
			data:{

			},
			url:api_tutor_submit,
			success:function(data){
				teachersubmit.datas=data.data3;
			},
			dataType:"json"
		});
	});
}