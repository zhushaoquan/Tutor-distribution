<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>教师报课系统</title>
	<!-- bootstrap样式-->
	<link href="../../css/bootstrap.css" type="text/css" rel="stylesheet"/>
	<link href="../../css/bootstrap-datepicker.css" type="text/css" rel="stylesheet"/>
	<link href="../../css/bootstrapValidator.css" type="text/css" rel="stylesheet"/>

	<!-- 后台通用样式 -->
	<link href="../../css/backstage.css" type="text/css" rel="stylesheet"/>
	<!-- 当前模块样式 -->
	<link href="../../css/teaching-office.css" type="text/css" rel="stylesheet"/>
	
	<!-- bootstrap插件和jquery -->
	<script language="javascript"  src="../../js/jquery2.14.min.js" ></script>
	<script language="javascript"  src="../../js/bootstrap.js" ></script>
	<script language="javascript"  src="../../js/bootstrap-datepicker.js" ></script>
	<script language="javascript"  src="../../js/bootstrapValidator.js" ></script>
	<!-- 后台通用 -->
	<script language="javascript"  src="../../js/backstage.js" ></script>
</head>
<body>
	<div id="container-backstage" class="clearfix"">
		<div id="siderbar">
			<nav class="sider-navbar">
				<div class="sider-navbar-header">
					<img src="../../image/mainpage-logo.png" alt="" width="240"></div>
				<ul class="sider-navbar-nav">
					<li class="active">
						<a href="#"> <i class="glyphicon glyphicon-plus"></i>
							新建报课
						</a>
					</li>
					<li>
						<a href="#"> <i class="glyphicon glyphicon-align-justify"></i>
							报课管理
						</a>
					</li>
					<li>
						<a href="#">
							<i class="glyphicon glyphicon-list"></i>
							教师管理
						</a>
					</li>
					<li>
						<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							个人信息
						</a>
					</li>

				</ul>
			</nav>
		</div>
		<div id="mainpage">
			<div class="top-nav clearfix">
				<div class="user-area">
					<div class="hello-user">
						<span>
							<i class="glyphicon glyphicon-user"></i>
							欢迎您,教学办
						</span>
						<span class="user-name">xxx</span>
					</div>
				</div>
				<div class="login-out-area">
					<a href="#">
						<i class = "glyphicon glyphicon-off"></i>
						退出
					</a>
				</div>
				<!-- <div class="path-box"></div>
			-->
		</div>
		<div class="page-content">

			<div class="form-area">
				<div class="alert alert-info" role="alert">
					<p>提示一:“同一年份、同一学期、同专业“的报课表只能有一份，重复上传会覆盖原课表！若原报课表已有教师报课，将丢失数据</p>
					<p>提示二:若上传时，使用Excel2003及以上版本或WPS的表格，请把文件另存为.xls后缀的文件再上传！</p>
				</div>

	
					<form class="form-horizontal form-response" role="form" action="" id="form-new-class">
						<div class="form-group">
							<label class="col-sm-3 control-label">用户名：</label>
							<div class="col-sm-9">
								 <input type="text" class="form-control" name="username" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">选择学年：</label>
							<div class="col-sm-9">
								<select class="form-control" name="year" id="select-year">
									
								</select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label" name="semester">选择学期：</label>
							<div class="col-sm-9">
								<select class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
						<div class="form-group  has-feedback" data-date-format="yyyy-mm-dd">
							<label  class="col-sm-3 control-label">报课截止日期：</label>
							<div class="col-sm-9 ">
								<input type="text"  name="teacherDeadline" class="datepick form-control" id="input-teacherDeadline">
								<span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label  class="col-sm-3 control-label" >审核截止日期：</label>
							<div class="col-sm-9">
								<input type="text" name="departmentDeadline"  class="datepick form-control" id="input-departmentDeadline">
								<span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">选择表格文件：</label>
							<div class="col-sm-9">
								<input type="file" name="tableFile">
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 control-label">选择对应专业：</label>
							<div class="col-sm-9">
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_soft_pro"  checked>
								    软件工程
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_com_nor" >
								   计算机专业
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_com_ope">
								    计算机（实验班）
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_com_exc" />计算机（卓越班）
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_net_pro" />网络工程专业
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_math_nor" />数学专业
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_math_ope" />数学类（实验班）
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="major" value="tc_inf_sec" />信息安全专业
								  </label>
								</div>
							</div>
						</div>
						<div class="submit-area">
						 	<button type="submit" class="btn btn-info" id="sub-new-class">确认创建</button>
						</div>
					</form>
				
			</div>
		</div>
		<div class="footer">Designed by Lin</div>
	</div>

	</div>
	<script>
		/*api*/
		api = {
	        "login":"../php/login1.php"
	    };
		$('.datepick').datepicker({
			"dates":"cn",
		    "format": 'yyyy/mm/dd',
		    "autoclose": true
		});

		/*生成学年下拉框选项*/
		var nowDate = new Date();
		var year = nowDate.getFullYear();
		for(var i=0;i<3;i++)
		{	
			$("#select-year").append('<option value="'+year+'">'+year+'</option>');
			year++;
		}
		
		/*表单异步提交*/
		$("#sub-new-class").click(function(){
			 var bootstrapValidator = $("#form-new-class").data('bootstrapValidator');
			   bootstrapValidator.validate();
			  if(bootstrapValidator.isValid()){
			  	  var data = $("#form-new-class").serializeArray();
			      data = jsonData(data);
			      console.log(data);

			  }
	      
	        return false;
      	});

      	/*表单序列化函数*/
		function jsonData(arr){
          var jsonStr={};
          $(arr).each(function(i,ele){
              $(jsonStr).attr(ele.name,ele.value);
          });
          return jsonStr;
    	}
    	/*表单验证*/
    	$(function(){
    		$('#form-new-class').bootstrapValidator({
		        message: 'This value is not valid',
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		            teacherDeadline: {
		                message: 'The username is not valid',
		                validators: {
		                    notEmpty: {
		                        message: '报课日期不能大于当前日期'
		                    },
		                    stringLength: {
		                        min: 6,
		                        max: 30,
		                        message: 'The username must be more than 6 and less than 30 characters long'
		                    },
		                    regexp: {
		                        regexp: /^[a-zA-Z0-9_]+$/,
		                        message: 'The username can only consist of alphabetical, number and underscore'
		                    }
		                }
		            },
		            departmentDeadline: {
		                validators: {
		                    notEmpty: {
		                        message: 'The email is required and cannot be empty'
		                    },
		                    emailAddress: {
		                        message: 'The input is not a valid email address'
		                    }
		                }
		            }
	        	}
 			});
    	});    	
	</script>
</body>
</html>