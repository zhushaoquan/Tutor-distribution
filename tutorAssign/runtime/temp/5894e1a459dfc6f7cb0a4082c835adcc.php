<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:110:"C:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\department_head_tutor\assign_result.html";i:1481534042;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/student.css">
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
                    <a href="<?php echo url('DepartmentHeadTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                    <a href="<?php echo url('DepartmentHeadTutor/studentManager'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 学生管理</li></a>
                    <li><i class="glyphicon glyphicon-pencil"></i> 导师管理</li>
                    <a href="<?php echo url('DepartmentHeadTutor/timeSetting'); ?>"><li><i class="glyphicon glyphicon-time"></i> 匹配设置</li></a>
                    <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>"><li  class="active"><i class="glyphicon glyphicon-ok"></i> 匹配结果</li></a>
                    <li><i class="glyphicon glyphicon-download-alt"></i> 结果导出</li>
                </ul>
            </nav>
        </div>
        <div id="mainpage">
            <div class="top-nav">
                <div class="user-area">
                    <div class="hello-user">
                        <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
                        <span class="user-name">系负责人: 陈齐民</span>
                    </div>
                </div>
                <div class="login-out-area">
                    <a href="/tutorAssign/public/index/BaseController/logout.html"><i class="glyphicon glyphicon-off"></i>退出</a>
                </div>
            </div>
            <div class="page-content">
                <div class="main-content" style="border-radius: 10px;padding: 20px;">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>提示：以下学生未分配到导师，请手动分配或系统智能分配，分配结果请逐一进行确认！</p>
                    </div>
                    <div class="my-information-title">
                        <span>分配结果</span>
                        <!-- <button class="btn btn-info button-size btn-edit" type="submit" style="width: 90px;">智能分配</button> -->
                    </div>
                    <div class="my-information-subtitle">
                        <span>以下是导师智能分配的结果，请修改后并确认！</span>
                    </div>
                    <div class="table-position" style="width: 90%; margin: 0 auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>学号</th>
                                    <th>姓名</th>
                                    <th>导师</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($studentElectedResult) || $studentElectedResult instanceof \think\Collection): $i = 0; $__LIST__ = $studentElectedResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>学号</td>
                                    <td>姓名</td>
                                    <td>导师</td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <div class="submit-area">
                            <a href="<?php echo url('DepartmentHeadTutor/assignResultConfirm'); ?>" class="btn btn-info button-size" id="sub-result-export">确&nbsp;&nbsp;认</a>
                        </div>
                        <div style="float: right;" >
                            <ul class="pagination">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="footer" style="border-radius: 10px;">
                        Designed by Lin & 我说的都队
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/backstage.js"></script>
</body>

</html>
