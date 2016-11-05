<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"C:\wamp64\www\tutorAssign\public/../app/index\view\student\index.html";i:1478316192;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师只能分配系统</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="../../../static/css/student.css">
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
                <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('Student/index'); ?>"><li class="active"><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('Student/tutorList'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 专业导师</li></a>
                <li><i class="glyphicon glyphicon-pencil"></i> 志愿填报</li>
                <li><i class="glyphicon glyphicon-ok"></i> 最终结果</li>
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
                <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
            </div>
        </div>
        <div class="page-content">
            <div class="main-content" style="border-radius: 10px;">
                <div class="my-information-title">
                    <div>
                        <span>我的信息</span>
                    </div>
                    <div class="button-position">
                        <button class="btn btn-info button-size" type="submit">修改</button>
                    </div>

                </div>
                <div class="my-information-subtitle">
                    <span>你可以在这里查看或修改自己的个人信息</span>
                </div>
                <div class="my-information-detail-1">
                    <ul>
                        <li><span>姓名：</span><span>陈齐民</span><span>学号：</span><span>031402203</span><span>性别：</span><span>男</span></li>
                        <li><span>学院：</span><span>数学与计算机科学学院</span><span>系别：</span><span>计算机</span><span>方向：</span><span>系统结构</span></li>
                        <li><span>绩点：</span><span>3.26</span><span>排名：</span><span>8/32</span><span>是否中选：</span><span>是</span></li>
                        <li><span>电话：</span><span>15659754690</span><span>邮箱：</span><span>282129796@qq.com</span></li>
                    </ul>
                </div>
                <div class="skill-title">
                    <p>技能及经历：</p>
                </div>
                <div class="skill-detail">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>
                </div>
                <!-- <div class="button-position">
                    <button class="btn btn-info" type="submit">修改</button>
                </div> -->

            </div>
            
            <div class="footer"  style="border-radius: 10px;">
                Designed by Lin & 我说的都队
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>
</body>
</html>


