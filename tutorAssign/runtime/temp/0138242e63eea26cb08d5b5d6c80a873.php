<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:77:"C:\wamp64\www\tutorAssign\public/../app/index\view\teaching_office\index.html";i:1474436935;s:69:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\layout.html";i:1474258918;s:71:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\siderbar.html";i:1474217583;s:66:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\nav.html";i:1478312500;s:69:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\footer.html";i:1476947265;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教师报课管理系统</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css" />
    
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/teacher.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap-table.css" />
   

</head>
<body>
<div id="container-backstage" class="clearfix">
    <div id="siderbar">
    <nav class="sider-navbar">
        <div class="sider-navbar-header">
            <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
        </div>
        <ul class="sider-navbar-nav">
            <?php if(is_array($menus) || $menus instanceof \think\Collection): if( count($menus)==0 ) : echo "" ;else: foreach($menus as $key=>$item): ?>
            <li <?php if($item['is_now']): ?> class="active"<?php endif; ?>>
                <a href="<?php echo $item['url']; ?>"><i class="glyphicon glyphicon-<?php echo $item['icon']; ?>"></i><?php echo $item['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </nav>
</div>

    <div id="mainpage">
        <div class="top-nav">
    <div class="user-area">
        <div class="hello-user">
            <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
            <span class="user-name"><?php echo user_type(); ?>: <?php echo (isset($user['name']) && ($user['name'] !== '')?$user['name']:"xxx"); ?></span>
        </div>
    </div>
    <div class="login-out-area">
        <!-- <a href="<?php echo url('BaseController/back'); ?>"><i class = "glyphicon glyphicon-arrow-left"></i>返回</a> -->
        <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
    </div>
    <!-- <div class="path-box"></div> -->
</div>
        <div class="page-content">
            <div class="main-content">
                
<div class="search-form">
    <form role="form" class="form-inline" action="">
         <div role="alert" class="alert alert-info">
            <p>提示:右侧按钮可以导出当前表格为excel文件哦！</p>
        </div>
        <div class="form-group form-group-search">
            <label name="semester" class="control-label">选择学年：</label>

            <select id="select_year" class="form-control"><option value="">请选择学年</option><option value="2016">2016</option><option value="2017">2017</option></select>

        </div>
        <div class="form-group form-group-search">
            <label name="semester" class="control-label">选择学期：</label>

            <select id="select_semester" class="form-control" disabled>
                <option value="">请先选择学年</option>

            </select>

        </div>
        <div class="form-group form-group-search">
            <label name="major" class="control-label">选择专业：</label>

            <select id="select_major" class="form-control" disabled>
                <option value="">请先选择学年学期</option>
            </select>

        </div>
        <div class="form-group form-group-search">
            <button id="sub-table-view" class="btn btn-info" type="submit" disabled>查&nbsp;&nbsp;询</button>
        </div>
    </form>
</div>
<div class="table-area">
    <div class="table-toolbar">
       
    </div>
    <table class="table table-bordered table-hover table-search-result" id="table-teacher-overview">
     
        </tbody>
    </table>
    
</div>

            </div>
        </div>
    </div>
    


<div class="footer">
    Designed by Lin & 我说的都队
</div>




</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>

<script type="text/javascript" src="__STATIC__/js/bootstrap-table.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap-table-zh-CN.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap-table-export.js"></script>
<script type="text/javascript" src="__STATIC__/js/tableExport.js"></script>
<script>
    api = {
        "select":"<?php echo url('teaching_office/select'); ?>",
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
                $("#select_year").off().on("change",function(){
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
                            $("#select_semester").off().on("change",function(){
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
                                        $("#select_major").off().on("change",function(){
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
        $("#table-teacher-overview").bootstrapTable('destroy'); 
        var select_year = $("#select_year option:selected").val();
        var select_semester = $("#select_semester option:selected").val();
        var select_major = $("#select_major option:selected").val();
       
        $('#table-teacher-overview').bootstrapTable('refresh');
        //1.初始化Table
        var oTable = new TableInit();
        oTable.Init();

        //2.初始化Button的点击事件
        var oButtonInit = new ButtonInit();
        oButtonInit.Init();
            function TableInit(){
                var oTableInit = new Object();
                //初始化Table
                oTableInit.Init = function() {
                $('#table-teacher-overview').bootstrapTable({
                    locale: 'zh-US',
                    url: '<?php echo url("teaching_office/table_page"); ?>', //请求后台的URL（*）
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
                    showRefresh: true, //是否显示刷新按钮
                    minimumCountColumns: 2, //最少允许的列数
                    clickToSelect: true, //是否启用点击选中行
                    // height: 500, //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                    uniqueId: "ID", //每一行的唯一标识，一般为主键列
                    showToggle:false, //是否显示详细视图和列表视图的切换按钮
                    cardView: false, //是否显示详细视图
                    detailView: false, //是否显示父子表
                    showExport: true,                     //是否显示导出
                    exportDataType: "all",              //basic', 'all', 'selected'.
                    columns: [/*{
                        checkbox: true
                    }, */{
                        field: 'grade',
                        title: '年级'
                    }, {
                        field: 'major',
                        title: '专业'
                    },{
                        field: 'people',
                        title: '专业人数'
                    },{
                        field: 'courseName',
                        title: '课程名称'
                    }, {
                        field: 'courseType',
                        title: '选修类型'
                    }, {
                        field: 'courseCredit',
                        title: '学分'
                    },{
                        field: 'courseHour',
                        title: '学时'
                    }, {
                        field: 'practiceHour',
                        title: '实验学时'
                    }, {
                        field: 'onMachineHour',
                        title: '上机学时'
                    },{
                        field: 'timePeriod',
                        title: '起讫周序'
                    },{
                        field: 'teacherName',
                        title: '任课教师'
                    },
                    {
                        field: 'remark',
                        title: '备注'
                    }]
                });
            };

            //得到查询的参数
            oTableInit.queryParams = function(params) {
                var temp = { //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                    year:select_year,
                    semester:select_semester,
                    major:select_major,
                    limit: params.limit, //页面大小
                    offset: params.offset, //页码
                    search: params.search
                    // departmentname: $("#txt_search_departmentname").val(),
                    // statu: $("#txt_search_statu").val()
                };
                return temp;
            };
            return oTableInit;
        };


        function ButtonInit(){
            var oInit = new Object();
            var postdata = {};

            oInit.Init = function() {
                //初始化页面上面的按钮事件
            };

            return oInit;
        };
    });

 



</script>


</body>
</html>