<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:112:"C:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\department_head_tutor\student_manager.html";i:1481703845;}*/ ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/student_manager.css">
    <link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
    <style type="text/css">
    .sider-navbar-nav li {
        color: #fff;
        text-align: center;
        padding-top: 10px;
    }
    </style>
</head>

<body>
    <div id="container-backstage" class="clearfix">
        <div id="siderbar">
            <nav class="sider-navbar">
                <div class="sider-navbar-header">
                    <img src="<?php echo OLD; ?>/image/mainpage-logo.png" alt="" width="240">
                </div>
                <ul class="sider-navbar-nav">
                    <a href="<?php echo url('DepartmentHeadTutor/index'); ?>">
                        <li><i class="glyphicon glyphicon-user"></i> 个人信息</li>
                    </a>
                    <a href="<?php echo url('DepartmentHeadTutor/studentManager'); ?>">
                        <li class="active"><i class="glyphicon glyphicon-th-list"></i> 学生管理</li>
                    </a>
                    <a href="<?php echo url('DepartmentHeadTutor/teacherManager'); ?>">
                        <li><i class="glyphicon glyphicon-pencil"></i> 导师管理</li>
                    </a>
                    <a href="<?php echo url('DepartmentHeadTutor/timeSetting'); ?>">
                        <li><i class="glyphicon glyphicon-time"></i> 匹配设置</li>
                    </a>
                    <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>">
                        <li><i class="glyphicon glyphicon-ok"></i> 匹配结果</li>
                    </a>
                    <li><i class="glyphicon glyphicon-download-alt"></i> 结果导出</li>
                </ul>
            </nav>
        </div>
        <div id="mainpage">
            <div class="top-nav">
                <div class="user-area">
                    <div class="hello-user">
                        <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
                        <span class="user-name">负责人:大东东 </span>
                    </div>
                </div>
                <div class="login-out-area">
                    <a href="/public/index.php/index/base_controller/logout.html"><i class="glyphicon glyphicon-off"></i>退出</a>
                </div>
            </div>
            <div class="page-content">
                <div class="main-content" style="border-radius: 10px; padding: 20px;">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>提示：你还未设置毕设导师分配的时间</p>
                    </div>
                    <div class="row module">
                        <div class="col-md-2">
                            <button id="import-excel" data-toggle="modal" data-backdrop="static" data-target="#exportExcelModal" class="btn btn-info">从文件导入
                            </button>
                        </div>
                        <div class="col-md-1">
                            <button id="add-item" data-toggle="modal" data-backdrop="static" data-target="#addItemModal" class="btn btn-info">新增
                            </button>
                        </div>
                        <div class="col-md-1">
                            <button id="delete-item" data-toggle="modal" data-backdrop="static" data-target="#deleteItemModal" class="btn btn-info">删除
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <select class="form-control" id="grade-selector" name="grade" style="border-radius:3px;background-color:#fcfcfc">
                                <template v-for="item in grades">
                                    <option>{{ item.grade }}级</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" id="searchstu" placeholder="搜索姓名或学号..." type="text" style="display: inline;">
                        </div>
                    </div>
                    <div class="module">
                        <div style="min-height: 400px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>学号</th>
                                        <th>姓名</th>
                                        <th>年级</th>
                                        <th>绩点</th>
                                        <th>排名</th>
                                    </tr>
                                </thead>
                                <tbody id="tab">
                                    <tr v-for="item in datas">
                                        <td>
                                            <input id="{{ item.serialNum }}" type="checkbox" class="chb">
                                        </td>
                                        <td>{{ item.serialNum }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.grade }}</td>
                                        <td>{{ item.gpa }}</td>
                                        <td>{{ item.rank }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="module" style="height: 60px">
                        <div class="fixed-table-pagination" style="display: block; float: right;">
                            <div id="tab-pagination" class="pagination ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer" style="border-radius: 10px;">
                    Designed by Lin &amp; 我说的都队
                </div>
            </div>
        </div>
    </div>
    <!-- 导入文件弹出框 -->
    <div class="modal fade" id="exportExcelModal" tabindex="-1" role="dialog" aria-labelledby="exportExcelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!--  <button type="button" id="closepop" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button> -->
                    <h4 class="modal-title" id="exportExcelLabel">
                    导入学生名单
                </h4>
                </div>
                <div class="modal-body">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>批量导入提示</p>
                        <p>1、请先选择导入方式，并下载相应的导入模板文件，按照其格式要求填写后进行导入。</p>
                        <p>2、注意上传文件格式只支持Excel2003（即.xls文件）。</p>
                        <p>3、点击“上传”导入完成后，点击“确认已导入”再进行最终确认。</p>
                    </div>
                    <div style="width: 95%; margin: 10px auto;">
                        <p>模板下载：<a href="#">点击下载</a>导入模板</p>
                    </div>
                    <div id="fileuploader">Upload</div>
                    <div id="uploadinfo"></div>
                </div>
                <div class="modal-footer">
                    <a id="exit-import" type="button" class="btn btn-default">放弃导入
                    </a>
                    <button id="confirm-import" type="button" class="btn btn-primary">
                        确认导入
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- 添加弹出框（Modal） -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" id="btn-close-add-above" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button> -->
                    <h4 class="modal-title" id="addItemLabel">
                    添加学生
                </h4>
                </div>
                <div class="modal-body">
                    <div id="addinfo" style="width: 80%; text-align: center;font-size: 20px">
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">学号</label>
                        </div>
                        <input id="stuid" class="form-control input-add" placeholder="如：031402201" type="text">
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">姓名</label>
                        </div>
                        <input id="stuname" class="form-control input-add">
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">性别</label>
                        </div>
                        <select id="stugender" class="form-control input-add">
                            <option>男</option>
                            <option>女</option>
                        </select>
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">绩点</label>
                        </div>
                        <input id="stugpa" class="form-control input-add" placeholder="如：3.5" type="text">
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">系别</label>
                        </div>
                        <select id="studepart" class="form-control input-add">
                        <option>应用数学系</option>
                        <option>信息与计算科学系</option>
                        <option>计算机系</option>
                        <option>信息安全与网络系</option>
                        <option>软件工程系</option>
                        <option>计算机实验班</option>
                        <option>数学实验班</option>
                    </select>
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">排名</label>
                        </div>
                        <input id="sturank" class="form-control input-add" placeholder="如：1/180" type="text">
                    </div>
                    <div class="input-div clearfix">
                        <div class="wrapper">
                            <label class="control-label input-label">年级</label>
                        </div>
                        <input id="stugrade" class="form-control input-add" placeholder="如：2014" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="btn-close-add-bottom" class="btn btn-default" >关闭
                    </a>
                    <button id="btn-submit-add" type="button" class="btn btn-primary">
                        提交更改
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- 删除弹出框（Modal） -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" id="btn-close-del-above" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button> -->
                    <h4 class="modal-title" id="deleteModalLabel">
                    删除学生
                </h4>
                </div>
                <div class="modal-body">
                    <div id="deleteinfo" style="width: 80%; text-align: center;font-size: 20px">
                    </div>
                    <div class="modal-footer">
                        <a id="btn-colse-del" class="btn btn-default">关闭</a>
                        <button type="button" id="btn-del-student" class="btn btn-primary">
                            确认
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal -->
    </div>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/backstage.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/jqPaginator.min.js"></script>
    <script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.js"></script>
    <script type="text/javascript">
    var deleteStu = "<?php echo PREFIX; ?>/DepartmentHeadTutor/deleteStudent";
    var stuList = "<?php echo PREFIX; ?>/DepartmentHeadTutor/studentList";
    var gradeList = "<?php echo PREFIX; ?>/DepartmentHeadTutor/gradeList";
    var addStu = "<?php echo PREFIX; ?>/DepartmentHeadTutor/addStudent";
    var searchStu = "<?php echo PREFIX; ?>/DepartmentHeadTutor/searchStudent";
    var excel_upload = "<?php echo PREFIX; ?>/DepartmentHeadTutor/student_excel_import";
    var excel_import = "<?php echo PREFIX; ?>/DepartmentHeadTutor/student_excel_add";
    </script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/student_manager.js"></script>

</body>

</html>
