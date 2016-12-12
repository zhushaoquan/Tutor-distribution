<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office\indexHome.html";i:1481514159;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/teacher.css">
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
    <div id="mainpage">
        <div class="top-nav">
            <div class="user-area">
                <div class="hello-user">
                    <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
                    <span class="user-name"><?php echo user_type(); ?>: <?php echo (isset($user['name']) && ($user['name'] !== '')?$user['name']:"xxx"); ?></span>
                </div>
            </div>
            <div class="login-out-area">
                <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
            </div>
        </div>
        <div class="page-content">
            <div class="main-content" style="border-radius: 10px;">
                <div class="two-div-contain">
                    <a href="<?php echo url('TeachingOffice/index_1'); ?>">
                        <div class="baoke-position">
                            <div class="span-position">
                                <i class="glyphicon glyphicon-hand-right"></i>
                                <span>报课管理系统</span>
                            </div>
                        </div>
                    </a>
                    <div class="tutorchoose-position">
                        <a href="<?php echo url('TeachingOfficeTutor/index'); ?>" style="text-decoration: none;">
                            <div class="span-position">
                                <i class="glyphicon glyphicon-hand-right"></i>
                                <span>导师分配系统</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="footer"  style="border-radius: 10px;">
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


