<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\student\index.html";i:1478613489;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/student.css">
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
            <div class="main-content" style="border-radius: 10px;padding: 20px;">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>提示：第一轮志愿填报时间为2016年10月19日至2016年10月22日，请在规定时间内完成志愿填报！</p>
                    </div>
                <div class="my-information-title">
                   
                        <span>我的信息</span>
                                    
                        <a href="<?php echo url('Student/modify'); ?>"><button class="btn btn-info button-size btn-edit" type="submit">修改</button></a>
        
                </div>
                <div class="my-information-subtitle">
                    <span>你可以在这里查看或修改自己的个人信息</span>
                </div>
                <div class="my-information-detail-1">
                    <ul>
                        <li><span>姓名：</span><span class="span-value"><?php echo $user['name']; ?></span><span>学号：</span><span class="span-value"><?php echo $user['serialNum']; ?></span><span>性别：</span><span class="span-value"><?php echo $user['gender']; ?></span></li>
                        <li><span>学院：</span><span class="span-value"><?php echo $user['college']; ?></span><span>系别：</span><span class="span-value"><?php echo $user['department']; ?></span><span>方向：</span><span class="span-value"><?php echo $user['field']; ?></span></li>
                        <li><span>绩点：</span><span class="span-value"><?php echo $user['gpa']; ?></span><span>排名：</span><span class="span-value"><?php echo $user['rank']; ?></span><span>中选：</span><span class="span-value"><?php echo $user['chosen']; ?></span></li>
                        <li><span>电话：</span><span class="span-value"><?php echo $user['telephone']; ?></span><span>邮箱：</span><span class="span-value"><?php echo $user['email']; ?></span></li>
                    </ul>
                </div>
                <div class="skill-title">
                    <p>技能及经历：</p>
                </div>
                <div class="skill-detail">
                    <p><?php echo $user['skill']; ?></p>
                </div>
                <!-- <div class="time-reminder">
                    <i class="glyphicon glyphicon-star-empty"></i>&nbsp;<span>提示：第一轮志愿填报时间为2016年10月19日至2016年10月22日，请同学们在规定时间内完成志愿填报</span>
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


