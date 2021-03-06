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
	<link href="../../css/teacher.css" type="text/css" rel="stylesheet"/>
	
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
					<img src="../../image/mainpage-logo.png" alt="" width="240">
					</div>
					<ul class="sider-navbar-nav">
						<li class="active">
							<a href="#"><i class="glyphicon glyphicon-align-justify"></i>查看报课</a>
						</li>
						<li>
							<a href="#"><i class="glyphicon glyphicon-pencil"></i>报课填写</a>
						</li>
						<li>
							<a href="#"><i class="glyphicon glyphicon-user"></i>个人信息</a>
						</li>

					</ul>
				</nav>
			</div>
		<div id="mainpage">
			<div class="top-nav">
				<div class="user-area">
					<div class="hello-user">
						<span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
						<span class="user-name">xxx</span>
					</div>
				</div>
				<div class="login-out-area">
					<a href="#"><i class = "glyphicon glyphicon-off"></i>退出</a>
				</div>
				<!-- <div class="path-box"></div> -->
			</div>
			<div class="page-content">
				<div class="main-content">
					<div class="table-area">
						<form class="form-horizontal form-response" role="form" action="" id="form-information">
							<div class="form-group">
								<label class="col-sm-3 control-label">姓名：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="name" />						
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" name="sex">选择性别：</label>
								<div class="col-sm-9">
									<select class="form-control">
										<option value="男">男</option>
										<option value="女">女</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">选择系别：</label>
								<div class="col-sm-9">
									<select class="form-control" name="department">
										<option value="计算机科学与技术">计算机科学与技术</option>
										<option value="信息安全与网络工程">信息安全与网络工程</option>
										<option value="信息安全与网络工程">软件工程</option>
										<option value="软件工程">软件工程</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">联系电话：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="telephone" />						
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">邮箱：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="email" />						
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">密码：</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="email" />						
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">确认密码：</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="email" />						
								</div>
							</div>
							<div class="submit-area">
								<button type="submit" class="btn btn-primary" id="sub-information-change">确认修改</button>
							</div>
						</form>
					</div>
				</div>
		</div>
		<div class="footer">
				Designed by Lin
		</div>

	</div>
	
</body>
	<script>
	$("#sub-information-change").click(function(){
		e.preventDefault();
        var data = $("#form-information").serializeArray();
        data = jsonData(data);
        // console.log(data);
        $.post(api.login,data,function(result){
	        if(result==true){
	            /*提示修改成功，跳转到系统首页*/
	            // window.location.href="http://www.baidu.com";
	        }
	        else{
	           
	        }
        });
	});
		//表单校验和提交
		

		//
	</script>
</html>