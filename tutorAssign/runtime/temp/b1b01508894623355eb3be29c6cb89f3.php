<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"C:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\student\modify.html";i:1480945134;}*/ ?>
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
                <img src="<?php echo OLD; ?>/image/mainpage-logo.png" alt="" width="240">
            </div>
             <ul class="sider-navbar-nav">
                <a href="<?php echo url('Student/index'); ?>"><li class="active"><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('Student/tutor_list'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 专业导师</li></a>
                <a href="<?php echo url('Student/edit_voluntary'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 志愿填报</li></a>
                <a href="<?php echo url('Student/show_result'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 志愿结果</li></a>
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
            <div class="main-content" style="border-radius: 10px;padding: 20px;padding-bottom: 55px;">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>提示：部分信息通过教务系统导入，无法修改！</p>
                    </div>
                <div class="my-information-title">
                    <span>修改信息</span>
                </div>
                <div class="my-information-subtitle">
                    <span>你可以在这里修改自己的个人信息</span>
                </div>
                
                
                <form role="form" action="<?php echo url('Student/saveModify'); ?>" name="modify" method="post" enctype="multipart/form-data" onsubmit="return checkall()">
                      <div class="form-group my-modify-detail">
                        <div class="pw-title"><span>旧密码：</span></div>
                        <div class="pw-modify"><input type="password" name="oldPassword" class="form-control-1 pw-form-width" id="exampleInputEmail1" placeholder="旧密码" value="<?php echo $user['password']; ?>"></div>
                      </div>
                      <div class="form-group pw-position my-modify-detail">
                        <div class="pw-title"><span>新密码：</span></div>
                        <div class="pw-modify"><input type="password" name="newPassword" class="form-control-1 pw-form-width" id="newPassword" placeholder="新密码"></div>
                      </div>
                      <div class="form-group  pw-position my-modify-detail">
                        <div class="pw-title"><span>确认密码：</span></div>
                        <div class="pw-modify"><input type="password" name="newPasswordConfirm" class="form-control-1 pw-form-width" id="newPasswordConfirm" placeholder="新密码"></div>
                      </div>
                      <div class="form-group my-modify-detail">
                        <div class="tel-title"><span>联系方式：</span></div>
                        <div class="pw-modify"><input type="text" name="telephone" class="form-control-1 pw-form-width" id="exampleInputEmail1" placeholder="联系方式" value="<?php echo $user['telephone']; ?>"></div>
                      </div>
                      <div class="form-group my-modify-detail">
                        <div class="email-title"><span>邮&nbsp;&nbsp;&nbsp;箱：</span></div>
                        <div class="pw-modify"><input type="email" name="email" class="form-control-1 pw-form-width" id="exampleInputEmail1" placeholder="邮箱" value="<?php echo $user['email']; ?>"></div>
                      </div>
                      <div class="form-group my-modify-detail" style="height: 140px;">
                        <div class="skill-modify-title"><span>技能经历：</span></div>
                        <div class="skill-modify-text"><textarea class="form-control skill-width" name="skill" rows="5"><?php echo $user['skill']; ?></textarea></div>
                      </div>
                      <div class="modify-btn-position">
                        <button type="submit" class="btn btn-info button-size">修改</button>
                      </div>
                </form>
                <div class="return-btn-position"><a href="<?php echo url('Student/index'); ?>"><button class="btn btn-info button-size" type="submit">返回</button></a></a></div>
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

<script type="text/javascript">
    function checkall() {
        
        if (modify.newPassword.value != "" && modify.newPasswordConfirm.value == "") {
            alert("请输入确认密码！");
            modify.newPasswordConfirm.focus();
            return false;
        }
        if (modify.newPassword.value != modify.newPasswordConfirm.value) {
            alert("两次密码输入不相同，请重新输入！");
            return false;
        }
        return true;
    }
</script>
</body>
</html>


