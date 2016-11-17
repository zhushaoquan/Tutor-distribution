<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:111:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\student_assign.html";i:1479317654;}*/ ?>
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
                <a href="<?php echo url('TeachingOfficeTutor/tutor_change'); ?>"><li ><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                <a href="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"><li class="active"><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
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
                    <h3>学生分配情况
                    </h3>
                </div>

                <div class="form-group">
                    <label  class="col-sm-1 control-label">选择系别：</label>
                    <div class="col-sm-4">
                    <form action="<?php echo url('TeachingOfficeTutor/student_assign'); ?>"  method="post">
                        <select class="form-control" name="department" style="display: inline; width: 45%">
                            <option value="计算机系">计算机系</option>
                            <option value="数学系">数学系</option>
                            <option value="网络工程系">网络工程系</option>
                            <option value="软件工程系">软件工程系</option>
                            <option value="信息安全系">信息安全系</option>
                            <option value="系统结构系">系统结构系</option>
                            <option value="计算机实验班">计算机实验班</option>
                            <option value="数学实验班">数学实验班</option>
                        </select>  
                        <input type="hidden" name="stu" value="assign">
                        <input type="submit" class="btn btn-primary" style="display: inline;" id="sub-result-export">
                    </form>
                    </div>
                </div>

                <br /><br /><br />
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                           <th>学生学号</th>
                            <th>学生姓名</th>
                            <th>导师工号</th>
                            <th>导师姓名</th>
                        </tr>

                        <tbody>
                            <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $v['snum']; ?></td>
                                    <td><?php echo $v['sname']; ?></td>
                                    <td><?php echo $v['tnum']; ?></td>
                                    <td><?php echo $v['tname']; ?></td>
                                    
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>

                    <div class="submit-area">
                        <button type="submit" class="btn btn-primary" id="sub-result-export">导&nbsp;&nbsp;出</button>
                           <button type="submit" class="btn btn-primary" id="sub-result-change"><a style="color:white;" href="<?php echo url('TeachingOfficeTutor/student_to_modify'); ?>">修&nbsp;&nbsp;改</a></button>  
                   
                    </div>

                    <nav>
                        <ul class="pagination" style="float: right;">
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.($curPage-1).'/dep/'.$dep); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_14233__=$curPage-2;$__FOR_END_14233__=$curPage+3;for($i=$__FOR_START_14233__;$i < $__FOR_END_14233__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_2272__=$totalPage-5;$__FOR_END_2272__=$totalPage;for($i=$__FOR_START_2272__;$i < $__FOR_END_2272__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_18147__=1;$__FOR_END_18147__=6;for($i=$__FOR_START_18147__;$i < $__FOR_END_18147__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_32530__=1;$__FOR_END_32530__=$totalPage;for($i=$__FOR_START_32530__;$i < $__FOR_END_32530__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="#">&raquo;</a></li>
                          <?php endif; ?>
                            <li><a href="#">共<?php echo $total; ?>名学生</a></li>
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
