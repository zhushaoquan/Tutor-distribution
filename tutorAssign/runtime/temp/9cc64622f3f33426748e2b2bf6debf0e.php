<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"C:\wamp64\www\tutorAssign\public/../app/index\view\student\tutorList.html";i:1479292629;}*/ ?>
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
                <a href="<?php echo url('Student/tutorList'); ?>"><li class="active"><i class="glyphicon glyphicon-th-list"></i> 专业导师</li></a>
                <a href="<?php echo url('Student/editVoluntary'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 志愿填报</li></a>
                <a href="<?php echo url('Student/showResult'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 最终结果</li></a>
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
                <div class="page-header">
                    <h3>导师列表
                    </h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>职称</th>
                            <th>研究方向</th>
                            <th>电子邮件</th>
                            <th>选择</th>
                        </tr>

                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>张栋</td>
                            <td>男</td>
                            <td>副教授</td>
                            <td>计算机网络</td>
                            <td>1111111111@qq.com</td>
                            <td><input class="btn btn-default" type="submit" value="选择"></td>
                        </tr>
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


