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
						<span> <i class="glyphicon glyphicon-user"></i>
							欢迎您,
						</span>
						<span class="user-name">xxx</span>
					</div>
				</div>
				<div class="login-out-area">
					<a href="#"> <i class = "glyphicon glyphicon-off"></i>
						退出
					</a>
				</div>
				<!-- <div class="path-box"></div>
			-->
		</div>
		<div class="page-content">
			<div class="main-content">
				<div class="alert-area">
					<button href ="#" class="btn btn-primary">修改个人信息</button>
				</div>
				<div class="table-area">
					<table class="table table-bordered table-hover table-search-result">
						<tr>
							<th>工号</th>
							<th>密码</th>
							<th>姓名</th>
							<th>性别</th>
							<th>电话</th>
							<th>邮箱</th>
						</tr>
						<tr>
							<td>00022</td>
							<td>00022</td>
							<td>林锦</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

					</table>

				</div>
			</div>
		</div>
		<div class="footer">Designed by Lin</div>

		</div>
	
</body>
	<script>

	</script>
</html>