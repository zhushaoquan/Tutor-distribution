<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:111:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\student_modify.html";i:1479492614;}*/ ?>
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

    .table td{
        vertical-align: middle;
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
                    <a href="<?php echo url('/index/TeachingOfficeTutor/index'); ?>">
                        <li><i class="glyphicon glyphicon-user"></i> 个人信息</li>
                    </a>
                    <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                    <a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change'); ?>">
                        <li><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                    </a>
                    <a href="<?php echo url('/index/TeachingOfficeTutor/student_assign'); ?>">
                        <li class="active"><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
                    </a>
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
                        <p>提示：毕设导师志愿时间为2016年10月19日至2016年10月22日，请同学们在规定时间内完成志愿选择.</p>
                    </div>
                    <div class="page-header">
                        <h3>学生分配结果修改
                    </h3>
                    </div>
                    <div class="form-group">
                        <label class="control-label" style="width: 100px;display: inline-block; text-align: center; vertical-align: middle;">选择系别：</label>
                        <div style="display: inline-block;">
                            <form id="department-submit" action="<?php echo url('TeachingOfficeTutor/student_assign'); ?>" method="post">
                                <select class="form-control" name="department" style="display: inline-block; width: 200px">
                                    <option value="应用数学系" <?php if($dep == "应用数学系") echo'selected = "true"';?>>应用数学系</option>
                                    <option value="信息与计算科学系" <?php if($dep == "信息与计算科学系") echo'selected = "true"';?>>信息与计算科学系</option>
                                    <option value="计算机系" <?php if($dep == "计算机系") echo'selected = "true"';?>>计算机系</option>
                                    <option value="软件工程系" <?php if($dep == "软件工程系") echo'selected = "true"';?>>软件工程系</option>
                                    <option value="信息安全与网络工程系" <?php if($dep == "信息安全与网络工程系") echo'selected = "true"';?>>信息安全与网络工程系</option>
                                    <option value="计算机实验班" <?php if($dep == "计算机实验班") echo'selected = "true"';?>>计算机实验班</option>
                                    <option value="数学实验班" <?php if($dep == "数学实验班") echo'selected = "true"';?>>数学实验班</option>
                                </select>
                                <input type="hidden" name="stu" value="modify">
                                <button type="submit" class="btn btn-primary" id="sub-result-confirm" form="department-submit">确&nbsp;&nbsp;认</button>
                            </form>
                        </div>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <form action="<?php echo url('/index/TeachingOfficeTutor/student_modify'); ?>" method="post" id="modify-info">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>导师姓名</th>
                            </tr>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($data as $value) 
                                    {
                                        echo 
                                        '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$value['snum'].'</td>
                                            <td>'.$value['sname'].'</td>
                                            <td style="width: 200px; padding:0; margin: 0; ">
                                            <input type="hidden" name="snum'.$i.'" value="'.$value['snum'].'">
                                            <select  name="'.$i.'" class="form-control" style="width: 200px; padding:5px 0; margin: 0; ">';
                                            
                                            foreach ($teacher as  $value1) 
                                            {                                      
                                            echo 
                                            '<option value="'.$value1['workNumber'].'" ';
                                            if($value1['workNumber'] == $value['tnum']) echo'selected = "true"';
                                            echo  '>'.$value1['workNumber'].'('.$value1['name'].')'.'</option>';
                                            }       
                                            echo    '</select></td>
                                            
                                        </tr>';
                                        $i++;
                                    }
                                    echo '<input type="hidden" name="count" value="'.($i-1).'">';
                                ?>

                            </tbody>
                           
                        </table>
                        <div class="submit-area">
                            <button type="submit" class="btn btn-primary" style="width: 100px" id="modify-info">确&nbsp;&nbsp;认</button>
                        </div>
                        </form>
                        <nav style="margin-bottom: 100px">
                            <ul class="pagination" style="float: right;">
                                <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.($curPage-1).'/dep/'.$dep.'/to/'.'modify'); ?>">&laquo;</a></li>
                              <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_1438__=$curPage-2;$__FOR_END_1438__=$curPage+3;for($i=$__FOR_START_1438__;$i < $__FOR_END_1438__;$i+=1){ ?>
                                  <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/to/'.'modify'); ?>" ><?php echo $i; ?></a></li>
                                <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_26585__=$totalPage-5;$__FOR_END_26585__=$totalPage;for($i=$__FOR_START_26585__;$i < $__FOR_END_26585__;$i+=1){ ?>
                                  <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/to/'.'modify'); ?>" ><?php echo $i; ?></a></li>
                                <?php } elseif($totalPage > 5): $__FOR_START_21024__=1;$__FOR_END_21024__=6;for($i=$__FOR_START_21024__;$i < $__FOR_END_21024__;$i+=1){ ?>
                                  <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/to/'.'modify'); ?>" ><?php echo $i; ?></a></li>
                                <?php } else: $__FOR_START_27939__=1;$__FOR_END_27939__=$totalPage;for($i=$__FOR_START_27939__;$i < $__FOR_END_27939__;$i+=1){ ?>
                                  <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/to/'.'modify'); ?>" ><?php echo $i; ?></a></li>
                                <?php } endif; if($curPage < $totalPage-1): ?>
                                <li><a href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.($curPage+11).'/dep/'.$dep.'/to/'.'modify'); ?>">&raquo;</a></li>
                              <?php endif; ?>
                                
                            </ul>
                        </nav>
                    
                    </div>
                </div>
                <div class="footer" style="border-radius: 10px;">
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
