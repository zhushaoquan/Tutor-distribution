<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>教师报课系统</title>
	<!-- bootstrap样式-->
	<link href="old/css/bootstrap.css" type="text/css" rel="stylesheet"/>
	<link href="old/css/bootstrap-table.css" type="text/css" rel="stylesheet"/>

	<!-- 后台通用样式 -->
	<link href="old/css/backstage.css" type="text/css" rel="stylesheet"/>
	<!-- 当前模块样式 -->
	<link href="old/css/teacher.css" type="text/css" rel="stylesheet"/>
	
	<!-- bootstrap插件和jquery -->
	<script language="javascript"  src="old/js/jquery2.14.min.js" ></script>
	<script language="javascript"  src="old/js/bootstrap.js" ></script>
	<script src="http://cdn.bootcss.com/bootstrap-table/1.11.0/bootstrap-table.js"></script>
	
	<!-- 后台通用 -->
	<script language="javascript"  src="old/js/backstage.js" ></script>
</head>
<body>
	<div id="container-backstage" class="clearfix"">
		<div id="siderbar">
				<nav class="sider-navbar">
					<div class="sider-navbar-header">
					<img src="old/image/mainpage-logo.png" alt="" width="240">
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
						<div class="alert alert-danger" role="alert">
								<p>提示:填写报课时请务必小心核对，一旦提交无法更改</p>
						</div>
					</div>
					<div class="table-area">
					<div id="toolbar" class="btn-group">
			            <button id="btn_add" type="button" class="btn btn-default">
			                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
			            </button>
			            <button id="btn_edit" type="button" class="btn btn-default">
			                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
			            </button>
			            <button id="btn_delete" type="button" class="btn btn-default">
			                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
			            </button>
			        </div>
						<!-- 基于bootstraptable插件的表格 -->
						<table class="table table-bordered" id="table-search-result">
						</table>
						<form action="">
							<!-- <table class="table table-striped table-bordered table-hover table-search-result">
								<tr>
									<th data-field="id">年级</th>
									<th>专业</th>
									<th>专业人数</th>
									<th>课程名称</th>
									<th>选修类型</th>
									<th>学分</th>
									<th>学时</th>
									<th>实验</th>
									<th>上机</th>
									<th>起讫周序</th>
									<th data-field="state" data-checkbox="true">选择该门课</th>
									<th>备注</th>
								</tr>
								<tr>
									<td>2013</td>
									<td>数学与应用数学（实验班）</td>
									<td>23</td>
									<td>信息系统实训</td>
									<td>实践选修</td>
									<td>2</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="13"></td>
									<td>
										<textarea type="textarea" name="13"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>数学与应用数学（实验班）</td>
									<td>23</td>
									<td>专业实习</td>
									<td>实践环节</td>
									<td>3</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="14"></td>
									<td>
										<textarea type="textarea" name="14"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>数学与应用数学（实验班）</td>
									<td>23</td>
									<td>组合图论</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="15"></td>
									<td>
										<textarea type="textarea" name="15"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>C++程序设计实训</td>
									<td>实践选修</td>
									<td>2</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="16"></td>
									<td>
										<textarea type="textarea" name="16"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>Java程序设计</td>
									<td>实践选修</td>
									<td>1</td>
									<td>24</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="17"></td>
									<td>
										<textarea type="textarea" name="17"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>高等代数选讲</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="18"></td>
									<td>
										<textarea type="textarea" name="18"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>计算机密码学</td>
									<td>专业选修</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td>16</td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="19"></td>
									<td>
										<textarea type="textarea" name="19"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>计算机图形学</td>
									<td>专业选修</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="20"></td>
									<td>
										<textarea type="textarea" name="20"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>数据库应用实训</td>
									<td>实践选修</td>
									<td>2</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="21"></td>
									<td>
										<textarea type="textarea" name="21"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>数学分析选讲</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="22"></td>
									<td>
										<textarea type="textarea" name="22"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>算法设计实训</td>
									<td>实践选修</td>
									<td>2</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="23"></td>
									<td>
										<textarea type="textarea" name="23"></textarea>
										</td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>随机分析</td>
									<td>专业选修</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="24"></td>
									<td>
										<textarea type="textarea" name="24"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>信息系统实训</td>
									<td>实践选修</td>
									<td>2</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="25"></td>
									<td>
										<textarea type="textarea" name="25"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>专业实习</td>
									<td>实践环节</td>
									<td>3</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="26"></td>
									<td>
										<textarea type="textarea" name="26"></textarea></td>
								</tr>
								<tr>
									<td>2013</td>
									<td>信息与计算科学（实验班）</td>
									<td>9</td>
									<td>组合图论</td>
									<td>专业必修（限选）</td>
									<td>3</td>
									<td>48</td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										
										<input type="checkbox" name="class_select[]" value="27"></td>
									<td>
										<textarea type="textarea" name="27"></textarea></td>
								</tr>
							</table> -->
							<div class="submit-area">
								<button type="submit" class="btn btn-info" id="sub-table-fill">提交</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer">
				Designed by Lin
			</div>
		</div>
		

	</div>
	
</body>
	<script>
		$(function() {
			//1.初始化Table
			var oTable = new TableInit();
			oTable.Init();

			//2.初始化Button的点击事件
			var oButtonInit = new ButtonInit();
			oButtonInit.Init();

		});


		var TableInit = function() {
			var oTableInit = new Object();
			//初始化Table
			oTableInit.Init = function() {
				$('#table-search-result').bootstrapTable({
					url: 'http://test.hongweipeng.com/a.php', //请求后台的URL（*）
					contentType: "application/x-www-form-urlencoded",
					method: 'get', //请求方式（*）
					toolbar: '#toolbar', //工具按钮用哪个容器
					striped: true, //是否显示行间隔色
					cache: false, //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
					pagination: true, //是否显示分页（*）
					sortable: false, //是否启用排序
					sortOrder: "asc", //排序方式
					queryParams: oTableInit.queryParams, //传递参数（*）
					sidePagination: "server", //分页方式：client客户端分页，server服务端分页（*）
					pageNumber: 1, //初始化加载第一页，默认第一页
					pageSize: 10, //每页的记录行数（*）
					pageList: [10, 25, 50, 100], //可供选择的每页的行数（*）
					search: true, //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
					strictSearch: true,
					showColumns: true, //是否显示所有的列
					showRefresh: true, //是否显示刷新按钮
					minimumCountColumns: 2, //最少允许的列数
					clickToSelect: true, //是否启用点击选中行
					height: 500, //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
					uniqueId: "ID", //每一行的唯一标识，一般为主键列
					showToggle: true, //是否显示详细视图和列表视图的切换按钮
					cardView: false, //是否显示详细视图
					detailView: false, //是否显示父子表
					columns: [{
						checkbox: true
					}, {
						field: 'name',
						title: '部门名称'
					}, {
						field: 'age',
						title: '上级部门'
					} ]
				});
			};

			//得到查询的参数
			oTableInit.queryParams = function(params) {
				var temp = { //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
					limit: params.limit, //页面大小
					offset: params.offset, //页码
					departmentname: $("#txt_search_departmentname").val(),
					statu: $("#txt_search_statu").val()
				};
				return temp;
			};
			return oTableInit;
		};


		var ButtonInit = function() {
			var oInit = new Object();
			var postdata = {};

			oInit.Init = function() {
				//初始化页面上面的按钮事件
			};

			return oInit;
		};

		$("#sub-table-fill").click(function(e){
			e.preventDefault();
			var $trs = $("#table-search-result tr");
			console.log($trs);
		});

	</script>
</html>

