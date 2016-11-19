<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:107:"/Applications/MAMP/htdocs/2/Tutor-distribution/tutorAssign/public/../app/index/view/student/tutor_list.html";i:1479325954;}*/ ?>
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
                <a href="<?php echo url('Student/tutor_list'); ?>"><li class="active"><i class="glyphicon glyphicon-th-list"></i> 专业导师</li></a>
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
            <div class="main-content" style="border-radius: 10px;padding: 20px;">
                <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                    <p>提示1</p>
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
                        </tr>
                        <tbody>
                            <?php if(is_array($teachers) || $teachers instanceof \think\Collection): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo $t['workNumber']; ?></td>
                                    <td><?php echo $t['name']; ?></td>
                                    <td><?php echo $t['sex']; ?></td>
                                    <td><?php echo $t['title']; ?></td>
                                    <td><?php echo $t['department']; ?></td>
                                    <td><?php echo $t['email']; ?></td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <nav>
                      <ul class="pagination" style="float: right;">
                      <a href="<?php echo url('/index/index/Student/tutor_list/'.($curPage-1)); ?>">&laquo;</a>
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/index/Student/tutor_list/'.($curPage-1)); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_2110977363__=$curPage-2;$__FOR_END_2110977363__=$curPage+3;for($i=$__FOR_START_2110977363__;$i < $__FOR_END_2110977363__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/Student/tutor_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_78978426__=$totalPage-5;$__FOR_END_78978426__=$totalPage;for($i=$__FOR_START_78978426__;$i < $__FOR_END_78978426__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('index/Student/tutor_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_1533023189__=1;$__FOR_END_1533023189__=6;for($i=$__FOR_START_1533023189__;$i < $__FOR_END_1533023189__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/Student/tutor_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_1835318216__=1;$__FOR_END_1835318216__=$totalPage;for($i=$__FOR_START_1835318216__;$i < $__FOR_END_1835318216__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/Student/tutor_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="#">&raquo;</a></li>
                          <?php endif; ?>
                            <li><a href="#">共<?php echo $total; ?>名导师</a></li>
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


