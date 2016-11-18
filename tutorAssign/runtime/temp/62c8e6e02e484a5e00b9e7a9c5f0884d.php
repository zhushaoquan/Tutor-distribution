<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:108:"/Applications/MAMP/htdocs/2/Tutor-distribution/tutorAssign/public/../app/index/view/student/show_result.html";i:1479310492;}*/ ?>
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
                <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('Student/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('Student/tutor_list'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 专业导师</li></a>
                <a href="<?php echo url('Student/edit_voluntary'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 志愿填报</li></a>
                <a href="<?php echo url('Student/show_result'); ?>"><li class="active"><i class="glyphicon glyphicon-ok"></i> 最终结果</li></a>
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
                    <p><?php echo $message;?></p>
                    <!--<p>提示2：志愿选择不可为空，但同一老师可以多次选择！</p>-->
                </div>
                <div class="my-information-title">
                    <span>最终结果</span>

                </div>
                <hr>
                <div class="my-information-detail-1">
                    <?php if(isset($voluntory_teacher['name'])&&$user['chosen']==1) { ?>
                    <ul>
                        <li><span>导师名字：</span><span class="span-value"><?php if(isset($voluntory_teacher['name']))echo $voluntory_teacher['name']; ?></span></li>
                        <li><span>导师工号：</span><span class="span-value"><?php if(isset($voluntory_teacher['workNumber']))echo $voluntory_teacher['workNumber']; ?></span</li>
                        <li><span>毕设选题：</span><span class="span-value"><?php if(isset($voluntory_teacher['title']))echo $voluntory_teacher['title']; ?></span></li>
                        <li><span>电子邮箱：</span><span class="span-value"><?php if(isset($voluntory_teacher['email']))echo $voluntory_teacher['email']; ?></span></li>
                        <li><span>同选学生</span>
                            <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>名字</th>
                                <th>学号</th>
                                <th>电子邮箱</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($voluntory_students)) {foreach ($voluntory_students as $key => $value):?>
                            <tr>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo $value['sid'];?></td>
                                <td><?php echo $value['email'];?></td>
                            </tr>
                            <?php endforeach;}?>
                            </tbody>
                        </table></li>
                    </ul>
                    <?php }?>

                </div>

            </div>

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


