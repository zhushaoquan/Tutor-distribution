$(function(){
	function jsonData(arr){
          var jsonStr={};
          $(arr).each(function(i,ele){
              $(jsonStr).attr(ele.name,ele.value);
          });
          return jsonStr;
    }


	/*页面高度自适应函数*/
	function reSize(){
		var height = $(window).height();
		height = height - 110;
		height2 = height - 40;
		$(".page-content").css("min-height",height);
		$(".main-content").css("min-height",height2);
		
	}
	reSize();
	$(window).resize(function(){
		reSize();
	});
});
