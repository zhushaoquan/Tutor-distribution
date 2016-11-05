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
	<link href="../../css/bootstrap-table.css" type="text/css" rel="stylesheet"/>
	<link href="../../css/bootstrapValidator.css" type="text/css" rel="stylesheet"/>


	<!-- 后台通用样式 -->
	<link href="../../css/backstage.css" type="text/css" rel="stylesheet"/>
	<!-- 当前模块样式 -->
	<link href="../../css/department_head.css" type="text/css" rel="stylesheet"/>
	
	<!-- bootstrap插件和jquery -->
	<script language="javascript"  src="../../js/jquery2.14.min.js" ></script>
	<script language="javascript"  src="../../js/bootstrap.js" ></script>
	<script language="javascript"  src="../../js/bootstrap-table.js" ></script>
	<script language="javascript"  src="../../js/bootstrap-table-zh-CN.js" ></script>
	

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
							<a href="#"><i class="glyphicon glyphicon-pencil"></i>教师管理</a>
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
								<p>提示一:当前栏目只显示您所管理的专业对应的报课表</p>
								<p>提示二:想变更自己管理的专业，请进入个人信息页面进行更改</p>
						</div>
					</div>
					<div class="table-area">
						<table class="table table-bordered table-hover table-search-result" id="table-list">
							
						</table>
						
					</div>
				</div>
		</div>
		<div class="footer">
				Designed by Lin
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
				$('#table-list').bootstrapTable({
					locale: 'zh-US',
					url: '../../php/tableJson.php', //请求后台的URL（*）
					method: 'get', //请求方式（*）
					toolbar: '#toolbar', //工具按钮用哪个容器
					striped: false, //是否显示行间隔色
					cache: false, //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
					contentType: "application/x-www-form-urlencoded",
					pagination: true, //是否显示分页（*）
					sortable: true, //是否启用排序
					sortOrder: "asc", //排序方式
					queryParams: oTableInit.queryParams, //传递参数（*）
					sidePagination: "server", //分页方式：client客户端分页，server服务端分页（*）
					pageNumber: 1, //初始化加载第一页，默认第一页
					pageSize: 10, //每页的记录行数（*）
					pageList: [10, 25, 50, 100], //可供选择的每页的行数（*）
					search:true, //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
					strictSearch: true,
					showColumns: false, //是否显示所有的列
					showRefresh:false, //是否显示刷新按钮
					minimumCountColumns: 2, //最少允许的列数
					clickToSelect: true, //是否启用点击选中行
					// height: 500, //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
					uniqueId: "ID", //每一行的唯一标识，一般为主键列
					showToggle:false, //是否显示详细视图和列表视图的切换按钮
					cardView: false, //是否显示详细视图
					detailView: false, //是否显示父子表
					columns: [{
						field: 'Name',
						title: '课表名称'
					}, {
						field: 'Age',
						title: '所属专业'
					} , {
						field: 'Age',
						title: '审核截止日期'
					} , {
						field: 'Age',
						title: '当前状态',
						formatter:function(value,row,index){    
							
                              return "<span class='text-info'>已公示</span><span class='text-success'>可编辑</span>";
							
                         }
					},
					{
						field: '#',
						title: '操作',
						formatter:function(value,row,index){    
                              return "<a  class='operation-a' href ='#'>查看</a><a class='operation-a' href ='#'>编辑</a>";
                         }
					}  ]
				});
			};

			//得到查询的参数
			oTableInit.queryParams = function(params) {
				var temp = { //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
					limit: params.limit, //页面大小
					offset: params.offset, //页码
					departmentname: $("#txt_search_departmentname").val(),
					statu: $("#txt_search_statu").val(),
					search:params.search
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
	</script>
</html>