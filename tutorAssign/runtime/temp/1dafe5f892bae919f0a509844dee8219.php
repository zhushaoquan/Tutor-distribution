<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:97:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\student\edit_voluntary.html";i:1481552370;}*/ ?>
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
                <a href="<?php echo url('Student/edit_voluntary'); ?>"><li class="active"><i class="glyphicon glyphicon-pencil"></i> 志愿填报</li></a>
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
            <div class="main-content" style="border-radius: 10px;padding: 20px;">
                    <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                        <p>提示1：<?php echo $message;?></p>
                        <?php if($user['chosen']==0 && ($ontime ==1||$ontime==2 )){?><p>提示2：志愿选择不可为空，但同一老师可以多次选择！</p><?php }?>
                    </div>
                <div class="my-information-title">
                   
                        <span>志愿填报</span>
                </div>
                 <hr>
            <div class ="center-block" >
            <?php if(($ontime ==1||$ontime==2 )&&$user['chosen']==0){?>                   
            <form method="post" action="<?php echo url('student/edit_voluntary'); ?>" style="margin:0px auto; width:90%" > 
                <?php if($voluntaryinfosetting['voluntaryNum'] >=1) {?>
                    <div class="form-horizontal" role="form" style="margin:10px auto;width:50%">
                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">第一志愿：</label>

                            <div class="col-md-8">
                                <select id="basic" class="selectpicker show-tick form-control" name="wishFirst">
                                    <option value="">==请选择==</option>
                                    <?php foreach($tutors as $key => $value): ?>
                                    <option value="<?php echo $value['workNumber']?>" <?php if($value['workNumber'] == $voluntary['wishFirst']) {?> selected="selected" <?php }?> ><?php echo $value['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php }if($voluntaryinfosetting['voluntaryNum'] >=2) {?>
                    <div class="form-horizontal" role="form" style="margin:10px auto;width:50%">
                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">第二志愿：</label>

                            <div class="col-md-8">
                                <select id="basic" class="selectpicker show-tick form-control" name="wishSecond">
                                    <option value="">==请选择==</option>
                                    <?php foreach($tutors as $key => $value): ?>
                                    <option value="<?php echo $value['workNumber']?>" <?php if($value['workNumber'] == $voluntary['wishSecond']) {?> selected="selected" <?php }?> ><?php echo $value['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php }if($voluntaryinfosetting['voluntaryNum'] >=3) {?>
                    <div class="form-horizontal" role="form" style="margin:10px auto;width:50%">
                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">第三志愿：</label>

                            <div class="col-md-8">
                                <select id="basic" class="selectpicker show-tick form-control" name="wishThird">
                                    <option value="">==请选择==</option>
                                    <?php foreach($tutors as $key => $value): ?>
                                    <option value="<?php echo $value['workNumber']?>" <?php if($value['workNumber'] == $voluntary['wishThird']) {?> selected="selected" <?php }?> ><?php echo $value['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php }if($voluntaryinfosetting['voluntaryNum'] >=4) {?>
                    <div class="form-horizontal" role="form" style="margin:10px auto;width:50%">
                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">第四志愿：</label>

                            <div class="col-md-8">
                                <select id="basic" class="selectpicker show-tick form-control" name="wishForth">
                                    <option value="">==请选择==</option>
                                    <?php foreach($tutors as $key => $value): ?>
                                    <option value="<?php echo $value['workNumber']?>" <?php if($value['workNumber'] == $voluntary['wishForth']) {?> selected="selected" <?php }?> ><?php echo $value['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } if($voluntaryinfosetting['voluntaryNum'] >=5) {?>
                    <div class="form-horizontal" role="form" style="margin:10px auto;width:50%">
                        <div class="form-group">
                            <label for="basic" class="col-md-4 control-label">第五志愿：</label>

                            <div class="col-md-8">
                                <select id="basic" class="selectpicker show-tick form-control" name="wishFifth">
                                    <option value="">==请选择==</option>
                                    <?php foreach($tutors as $key => $value): ?>
                                    <option value="<?php echo $value['workNumber']?>" <?php if($value['workNumber'] == $voluntary['wishFifth']) {?> selected="selected" <?php }?> ><?php echo $value['name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php }?>
                    <div class="button-position" style="margin: 10px 500px; width: 200px;">
                    <button class="btn btn-info" type="submit" style="margin: 0px auto; width: 150px;" >提交</button>
                    </div>
                </form>
                </div>
            <?php }?>
            </div>


        </div>
        <div class="footer"  style="border-radius: 10px;">
                Designed by Lin & 我说的都队
        </div>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>
</body>
</html>


