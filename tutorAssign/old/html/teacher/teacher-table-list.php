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
					<div class="alert-area">
						<div class="alert alert-info" role="alert">
								<p>提示一:想查看填写完的报课情况 请在左侧导航选择“查看报课”进行查看</p>
								<p>提示二:填写报课时请务必小心核对，一旦提交无法更改</p>
						</div>
					</div>
					<div class="table-area">
						<table class="table table-bordered table-hover table-search-result">
							<tr>
								<th>课表名称</th>
								<th>所属专业</th>
								<th>报课截止日期</th>
								<th>操作</th>
							</tr>
							<tr>
								<td>2016年信息与计算科学（实验班）报课表</td>
								<td>信息工程</td>
								<td>2016/02/03</td>
								<td>
									<a href="#">填写</a>
								</td>
							</tr>
							<tr>
								<td>2016年信息与计算科学（实验班）报课表</td>
								<td>信息工程</td>
								<td>2016/02/03</td>
								<td>
									<a href="#">填写</a>
								</td>
							</tr>
						</table>
						<div class="alert alert-warning" role="alert">
							<p>当前暂无可填写的报课表</p>
							
						</div>
					</div>
				</div>
		</div>
		<div class="footer">
				Designed by Lin
		</div>

	</div>
	
</body>
	<script>
	api = {
		"select":"../../php/select.php",
		"table":"../../php/table.php",
		"table-page":"../../php/select.php",
	};
	</script>
</html>