<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\tutor_assign.html";i:1479314503;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
  <!--  <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/student.css">
    !-->
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
                <a href="<?php echo url('TeachingOfficeTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                <a href="<?php echo url('TeachingOfficeTutor/tutor_assign'); ?>"><li class="active"><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                <a href="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
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
                    <p>提示：您可以修改选课结果.</p>
                </div>

                <div class="page-header">
                    <h3>导师分配情况
                    </h3>
                </div>

                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th>导师工号</th>
                            <th>导师姓名</th>
                            <th>学生学号</th>
                            <th>学生姓名</th>
                        </tr>

                        <tbody>
                        <?php foreach ($data as $value) 
                        {
                                  
                            echo '<tr>

                            <td style="vertical-align:middle" rowspan="'.count($value['tstudentL']).'">' . $value['tnum'].
                            '</td>
                            <td style="vertical-align:middle" rowspan="'.count($value['tstudentL']).'">'.$value['tname'].'</td>
                            ';
                            $i=0;
                            foreach ($value['tstudentL'] as $value1) 
                            {
                               
                            if($i>0) echo '<tr>';
                             echo   '<td>' .  $value1['snum'] .'</td>
                                    <td>' . $value1['sname'].'</td>';
                               echo '
                               </tr>';
                              $i++;
                            }
                           
                           // echo  '';
                        }
                        ?> 
                        </tbody>
                    </table>
                   
                  
                    <div class="submit-area">
                        <button type="submit" class="btn btn-primary" id="sub-result-export">导&nbsp;&nbsp;出</button>
                        <button type="submit" class="btn btn-primary" id="sub-result-change">
                            <a style="color:white;" href="<?php echo url('TeachingOfficeTutor/tutor_to_change'); ?>">修&nbsp;&nbsp;改</a></button>
                     <!--   <button type="submit" class="btn btn-primary" id="sub-result-confirm">确&nbsp;&nbsp;认</button>  !-->
                    </div>

                    <nav>
                        <ul class="pagination" style="float: right;">
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/TeachingOfficeTutor/tutor_assign/'.($curPage-1)); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_29027__=$curPage-2;$__FOR_END_29027__=$curPage+3;for($i=$__FOR_START_29027__;$i < $__FOR_END_29027__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_assign/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_17298__=$totalPage-5;$__FOR_END_17298__=$totalPage;for($i=$__FOR_START_17298__;$i < $__FOR_END_17298__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_assign/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_21789__=1;$__FOR_END_21789__=6;for($i=$__FOR_START_21789__;$i < $__FOR_END_21789__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_assign/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_23028__=1;$__FOR_END_23028__=$totalPage;for($i=$__FOR_START_23028__;$i < $__FOR_END_23028__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_assign/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="#">&raquo;</a></li>
                          <?php endif; ?>
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
