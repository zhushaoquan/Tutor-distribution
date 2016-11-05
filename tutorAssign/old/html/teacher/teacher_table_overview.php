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
					<img src="../../image/mainpage-logo.png" alt="" width="240"></div>
				<ul class="sider-navbar-nav">
					<li class="active">
						<a href="#"> <i class="glyphicon glyphicon-align-justify"></i>
							查看报课
						</a>
					</li>
					<li>
						<a href="#"> <i class="glyphicon glyphicon-pencil"></i>
							报课填写
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
			<div class="top-nav">
				<div class="user-area">
					<div class="hello-user">
						<span>
							<i class="glyphicon glyphicon-user"></i>
							欢迎您,
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
				<div class="main-content">
					<div class="search-form">
						<form action="" class="form-inline" role="form">
							<div class="form-group form-group-search">
								<label  class="control-label" name="semester" >选择学年：</label>
								<select class="form-control" id="select_year"></select>
							</div>
							<div class="form-group form-group-search" >
								<label  class="control-label" name="semester">选择学期：</label>

								<select class="form-control" id="select_semester" disabled>
									<option value="">请先选择学年</option>

								</select>

							</div>
							<div class="form-group form-group-search">
								<label  class="control-label" name="major">选择专业：</label>

								<select class="form-control" id="select_major" disabled>
									<option value="">请先选择学年学期</option>
								</select>

							</div>
							<div class="form-group form-group-search fr">
								<button type="submit" class="btn btn-info" id="sub-table-view" disabled>查&nbsp;&nbsp;询</button>
							</div>
						</form>
					</div>
					<div class="table-area">
						<div class="table-toolbar">
							<form action="" class="form-inline clearfix" role="form" id="table-tool-form">
								<div class="form-group table-tool-page">
									<label  class="control-label" name="major">每页显示数目：</label>
									<select class="form-control" id="select_page_num">
										<option value="1">10</option>
										<option value="2">50</option>
										<option value="3">100</option>
									</select>
								</div>
								<div class="form-group table-tool-search input-group">
									<input type="text" placeholder="请输入搜索条件" id="condition-search">	
									<span class="input-group-addon glyphicon glyphicon-search"></span>
								</div>
							</form>
						</div>
						<table class="table table-bordered table-hover table-search-result">
							<tr>
								<th>年级</th>
								<th>专业</th>
								<th>专业人数</th>
								<th>课程名称</th>
								<th>选修类型</th>
								<th>学分</th>
								<th>学时</th>
								<th>实验</th>
								<th>上机</th>
								<th>起讫周序</th>
								<th>任课教师</th>
								<th>备注</th>
							</tr>
							<tr>
								<td>
									2013
									<td>计算机科学与技术（卓越班）</td>
									<td>96</td>
									<td>互联网产品设计</td>
									<td>专业选修</td>
									<td>2.5</td>
									<td>40</td>
									<td></td>
									<td></td>
									<td></td>
									<td>林秋月</td>
									<td>企业开课，理论20学时，上机20学时</td>
								</td>
							</tr>
							<tr>
								<td>
									2013
									<td>计算机科学与技术（卓越班）</td>
									<td>96</td>
									<td>企业实践</td>
									<td>毕业实习</td>
									<td>15</td>
									<td></td>
									<td></td>
									<td></td>
									<td>；</td>
									<td>张浩；</td>
									<td>；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>EDA技术</td>
									<td>专业方向（限选）1</td>
									<td>2</td>
									<td>32</td>
									<td></td>
									<td>16</td>
									<td>；</td>
									<td>赵彦敏；</td>
									<td>；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>Linux操作系统设计实践</td>
									<td>实践选修</td>
									<td>1.5</td>
									<td>36</td>
									<td></td>
									<td></td>
									<td>；；</td>
									<td>程烨；郭红；</td>
									<td>
										周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；
										<br>周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>编译方法</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td>；1-12；1--12；</td>
									<td>何振峰；刘秉瀚；陈晖；</td>
									<td>
										理论与实践课选同一老师；
										<br>	
										（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；
										<br>（刘秉瀚、陈晖）刘秉瀚、陈晖合作上1个班，希望安排在下午的5，6节。；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>编译系统设计实践</td>
									<td>实践选修</td>
									<td>1.5</td>
									<td>36</td>
									<td></td>
									<td></td>
									<td>；4-12；第4周开始；</td>
									<td>何振峰；刘秉瀚；陈晖；</td>
									<td>
										理论与实践课选同一老师；
										<br>	
										分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；
										<br>	
										刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；
									</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>概率论与数理统计</td>
									<td>学科必修</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>计算方法</td>
									<td>学科必修</td>
									<td>2</td>
									<td>32</td>
									<td></td>
									<td></td>
									<td>1-9；；；</td>
									<td>王秀；白清源；陈欢；</td>
									<td>；；；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>计算机图形学</td>
									<td>专业方向（限选）3</td>
									<td>2</td>
									<td>32</td>
									<td></td>
									<td></td>
									<td>1-8；</td>
									<td>谢伙生；</td>
									<td>与计算机导论课排在同一个上午，教室同一间。；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>计算机网络体系结构</td>
									<td>专业方向（限选）1</td>
									<td>2</td>
									<td>32</td>
									<td></td>
									<td></td>
									<td></td>
									<td>郑相涵；</td>
									<td></td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>计算机系统结构</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td>1-18；</td>
									<td>林嘉雯；尚艳艳；</td>
									<td>尽可能安排在上午3、4节或者下午1、2节；课程不安排在12节；</td>
								</td>
							</tr>
							<tr>
								<td>
									2014
									<td>计算机科学与技术（卓越班）</td>
									<td>125</td>
									<td>宽带网及宽带接入技术</td>
									<td>学科专业选修</td>
									<td>2</td>
									<td>32</td>
									<td></td>
									<td></td>
									<td>；</td>
									<td>孙及园；</td>
									<td>请安排在11～18周的下午；</td>
								</td>
							</tr>

						</table>
						<div class="table-tool-foot">
							<!-- 分页 -->	
							<nav>
								<ul class="pagination">
									<li>
										<a href="#">上一页</a>
									</li>
									<li>
										<a href="#">&laquo;</a>
									</li>
									<li class="active">
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li>
									<li>
										<a href="#">4</a>
									</li>
									<li>
										<a href="#">5</a>
									</li>
									<li>
										<a href="#">&raquo;</a>
									</li>
									<li>
										<a href="#">下一页</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">Designed by Lin
			</div>
		</div>
	</div>
	
</body>
	<script>
	api = {
		"select":"../../php/select.php",
		"table":"../../php/table.php",
		"table-page":"../../php/select.php",
	};
	/*搜索条件联动*/
	function cascadeDrop(){
			var data ={select_level:"first"};
			$.post(api.select,data,function(result){
			//处理返回的一级下拉菜单选项
			if(result.success=="false"){
				alert("数据请求错误 请刷新");
			}
			else{
				var optionStr ="";
				$(result.data).each(function(i,ele){
					optionStr += '<option value="'+ele.value+'">'+ele.name+'</option>';
				});
				$("#select_year").html(optionStr);
				var select_year = $("#select_year option:selected").val();
				$("#select_year").change(function(){
						selectAble();
						var select_year = $("#select_year").val();
						var data={select_level:"second",first_key:select_year};
						$.post(api.select,data,function(result){
								if(result.success=="false"){
									alert("数据请求错误 请刷新");
								}
								else{
									var optionStr ="";
									$(result.data).each(function(i,ele){
										optionStr += '<option value="'+ele.value+'">'+ele.name+'</option>';
									});
									$("#select_semester").html(optionStr);
									$("#select_semester").change(function(){
											selectAble();
											var select_year = $("#select_year").val();
											var select_semester = $("#select_semester").val();

											var data={select_level:"third",first_key:select_year,second_key:select_semester};
											$.post(api.select,data,function(result){
												
												if(result.success=="false"){
													alert("数据请求错误 请刷新");
												}
												else{
													var optionStr ="";
													$(result.data).each(function(i,ele){
														optionStr += '<option value="'+ele.value+'">'+ele.name+'</option>';
													});
													
													$("#select_major").html(optionStr);
													$("#select_major").change(function(){
														selectAble();
													});													
												}
												
											});
									});
								}
								
						});
				});
			
			}
			
			
	});
	function selectAble(){
		var select_year = $("#select_year option:selected").val();
		var select_semester = $("#select_semester option:selected").val();
		var select_major = $("#select_major option:selected").val();
		if(select_year == "")
		{
			$("#select_semester").attr("disabled","disabled");
		}
		else{
			$("#select_semester").removeAttr("disabled","disabled");
		}

		if(select_semester =="")
		{
			$("#select_major").attr("disabled","disabled");
		}
		else{
			$("#select_major").removeAttr("disabled","disabled");
		}
		if(select_year != ""&&select_semester != ""&&select_major != ""){
			$("#sub-table-view").removeAttr("disabled","disabled");
		}
		else{
			
			$("#sub-table-view").attr("disabled","disabled");
		}
	}};
	cascadeDrop();

	/*查询按钮点击事件*/
	$("#sub-table-view").click(function(e){
		e.preventDefault();
		var select_year = $("#select_year option:selected").val();
		var select_semester = $("#select_semester option:selected").val();
		var select_major = $("#select_major option:selected").val();
		/*发送所有的搜索条件*/
		var data={"year":select_year,"semester":select_semester,"major":select_major};
		$.post(api.table,data,function(result){
		 	//获取结果以后 刷新表格
		});
	});
	$("#select_page_num").change(function(){
		//ajax请求 刷新数据
	});
	$("#condition-search").keyup(function(){
		if($("#condition-search").val()!=" ")
		console.log($("#condition-search").val());
	});
	

	</script>
</html>