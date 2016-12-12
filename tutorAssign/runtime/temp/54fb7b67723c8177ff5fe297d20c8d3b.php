<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teacher_tutor\student_list.html";i:1481552370;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/teacher.css">
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
                <a href="<?php echo url('TeacherTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('TeacherTutor/student_list'); ?>"><li class="active"><i class="glyphicon glyphicon-th-list"></i> 可选学生</li></a>
                <a href="<?php echo url('TeacherTutor/issue_submit'); ?>"><li><i class="glyphicon glyphicon-pencil"></i> 课题提交</li></a>
                <a href="<?php echo url('TeacherTutor/show_result'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 志愿结果</li></a>
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
                </div>
<?php if($ontime==11 || $ontime==22) {?>
                <div class="my-information-title">
                    <span>可选学生</span>
                </div>
                <hr>
<!--

                <?php if($user['isExperial']) {?>
                 <div class="dropdown" style="padding: 0 50px 0 50px;">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">请选择方向
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href=<?php echo url('TeacherTutor/student_list1'); ?>>实验班</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href=<?php echo url('TeacherTutor/student_list2'); ?>>非实验班</a></li>
                    </ul>
                </div>
                <?php }?>
-->
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
                            <?php if(is_array($students) || $students instanceof \think\Collection): $i = 0; $__LIST__ = $students;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                                <tr>
                                <form method="post" action="<?php echo url('TeacherTutor/student_list'); ?>">
                                    <td><input style="display: none;" type="text" value="<?php echo $t['sid']; ?>" name="sid"><?php echo $t['sid']; ?></td>
                                    <td><a href="<?php echo url('/index/TeacherTutor/show_resultdetail/sid/'.$t['sid']); ?>"><?php echo $t['name']; ?></a></td>
                                    <td><?php echo $t['gender']; ?></td>
                                    <td><?php echo $t['rank']; ?></td>
                                    <td><?php echo $t['gpa']; ?></td>
                                    <td><?php if($t['wishFirst'] == $user['workNumber'])echo "第一志愿";else if($t['wishSecond'] == $user['workNumber'])echo "第二志愿"; else if($t['wishThird'] == $user['workNumber'])echo "第三志愿"; else if($t['wishForth'] == $user['workNumber'])echo "第四志愿";else echo "第五志愿"?></td>
                                    <?php if($ontime == 11 || $ontime == 22) {?>
                                    <td><input class="btn btn-default" data-toggle="modal" data-backdrop="static" data-target="#choiceModal"  value="选择" name="choise"></td>
                                    <td><input class="btn btn-default" data-toggle="modal" data-backdrop="static" data-target="#rejectModal"  value="拒绝" name="choise"></td>
                                    <?php }?>
                                </form>    
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <nav>
                      <ul class="pagination" style="float: right;">
                      <a href="<?php echo url('/index/index/TeacherTutor/student_list/'.($curPage-1)); ?>">&laquo;</a>
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/index/TeacherTutor/student_list/'.($curPage-1)); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_27102__=$curPage-2;$__FOR_END_27102__=$curPage+3;for($i=$__FOR_START_27102__;$i < $__FOR_END_27102__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeacherTutor/student_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_13593__=$totalPage-5;$__FOR_END_13593__=$totalPage;for($i=$__FOR_START_13593__;$i < $__FOR_END_13593__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('index/TeacherTutor/student_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_3168__=1;$__FOR_END_3168__=6;for($i=$__FOR_START_3168__;$i < $__FOR_END_3168__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeacherTutor/student_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_10339__=1;$__FOR_END_10339__=$totalPage;for($i=$__FOR_START_10339__;$i < $__FOR_END_10339__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeacherTutor/student_list/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="#">&raquo;</a></li>
                          <?php endif; ?>
                            <li><a href="#">共<?php echo $total; ?>名学生</a></li>
                      </ul>
                    </nav>
                </div>
<?php }?>                
                <!-- <div class="button-position">
                    <button class="btn btn-info" type="submit">修改</button>
                </div> -->

            </div>
            <button></button>
            <div class="footer"  style="border-radius: 10px;">
                Designed by Lin & 我说的都队
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="choiceModal" tabindex="-1" role="dialog" aria-labelledby="choiceModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closepop" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="choiceModalLabel">
                   确定学生信息
                </h4>
            </div>
            <div class="modal-body">
        
                <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                     <div>
                         <ul>
                             <li><span>姓名：</span><span></span><span>性别: </span><span></span></li>
                             <li><span>排名：</span><span></span><span>绩点：</span><span></span></li>
                             <li><span>志愿顺序：</span><span></span></li>
                         </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" value="选择">
                    确认选择
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closepop" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="rejectModalLabel">
                    确定学生信息
                </h4>
            </div>
            <div class="modal-body">
                <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                         <ul>
                             <li><span>姓名：</span><span></span><span>性别: </span><span></span></li>
                             <li><span>排名：</span><span></span><span>绩点：</span><span></span></li>
                             <li><span>志愿顺序：</span><span></span></li>
                         </ul>
            
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    确认拒绝
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>
</body>
</html>


