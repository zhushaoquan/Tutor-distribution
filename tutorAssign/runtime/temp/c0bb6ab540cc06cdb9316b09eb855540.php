<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:115:"/Applications/MAMP/htdocs/2/Tutor-distribution/tutorAssign/public/../app/index/view/teacher_tutor/student_list.html";i:1479292305;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师只能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>css/student.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>css/teacher.css">
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
                <a href="<?php echo url('TeacherTutor/index'); ?>"><li class="active"><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('TeacherTutor/student_list'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 可选学生</li></a>
                <a href="<?php echo url('TeacherTutor/issue_submit'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 课题提交</li></a>
                <a href="<?php echo url('TeacherTutor/show_result'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 最终结果</li></a>
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
                    <p>提示：第一轮导师确认学生时间为2016年10月19日至2016年10月22日，请导师在规定时间内完成学生的选择和确认！</p>
                </div>

                <div class="my-information-title">
                    <span>可选学生</span>
                </div>
                  
                 <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">请选择方向
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">实验班</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">非实验班</a></li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>排名</th>
                            <th>绩点</th>
                            <th>志愿顺序</th>
                            <th>选择</th>
                            <th>拒绝</th>
                        </tr>
                        <tbody>
                        <?php foreach ($studentList as $key => $value):?>
                        <form method="post" action="<?php echo url('TeacherTutor/student_list'); ?>">
                        <tr>
                            <td><input type="text" style="display:none" name="sid" value="<?php echo $value['sid'];?>"><?php echo $value['sid']?></td>
                            <td><?php echo $value['name']?></td>
                            <td><?php if($value['gender'])echo "男";else echo "女";?></td>
                            <td><?php echo $value['rank']?></td>
                            <td><?php echo $value['gpa']?></td>
                            <td><?php echo "第".$value['wish']."志愿"?></td>
                            <input type="text" style="display:none" name="department" value="<?php echo $value['department'];?>">
                            <td><input class="btn btn-default" type="submit" value="选择" name="choise"></td>
                            <td><input class="btn btn-default" type="submit" value="拒绝" name="choise"></td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                    </table>
                    <nav style="float: right;">
                        <ul class="pagination" >
                        <li><a href="#">&laquo;</a></li>
                        <li ><a href="#">1</a></li>
                        <li ><a href="#">2</a></li>
                        <li ><a href="#">3</a></li>
                        <li ><a href="#">4</a></li>
                        <li ><a href="#">5</a></li>
                        <li ><a href="#">&raquo;</a></li>


                        </ul>
                    </nav>
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

