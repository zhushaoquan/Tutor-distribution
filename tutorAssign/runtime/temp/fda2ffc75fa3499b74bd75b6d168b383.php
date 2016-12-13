<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:111:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\student_assign.html";i:1481616090;}*/ ?>
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
                <a href="<?php echo url('/index/TeachingOfficeTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('TeachingOfficeTutor/head_list'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li></a>
                <a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change'); ?>"><li ><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li></a>
                <a href="<?php echo url('/index/TeachingOfficeTutor/student_assign'); ?>"><li class="active"><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li></a>
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
                 <div class="form-horizontal" role="form">
                <div class="form-group">
                                        <form action="<?php echo url('TeachingOfficeTutor/student_assign'); ?>" method="post">
                        <label class="col-md-2 control-label"  >选择年级：</label>
                        <div class="col-xs-2" >
                            <select id="gradeSelect" class="form-control" name="grade" style="display: inline; width: 80%">
                                   
                                    <?php if(is_array($gg) || $gg instanceof \think\Collection): $i = 0; $__LIST__ = $gg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['grade']; ?>" <?php if($grade == $v['grade']) echo 'selected="true"';?>><?php echo $v['grade']; ?>级</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            
                        </div>
                     
                        <label class="col-md-2 control-label"  >选择系别：</label>
                        <div class="col-xs-2" >
                            <select id="departSelect" class="form-control" name="department" style="display: inline; width: 100%">
                                 <option value="应用数学系" <?php if($dep == "应用数学系") echo'selected = "true"';?>>应用数学系</option>
                            <option value="信息与计算科学系" <?php if($dep == "信息与计算科学系") echo'selected = "true"';?>>信息与计算科学系</option>
                            <option value="计算机系" <?php if($dep == "计算机系") echo'selected = "true"';?>>计算机系</option>
                            <option value="软件工程系" <?php if($dep == "软件工程系") echo'selected = "true"';?>>软件工程系</option>
                            <option value="信息安全与网络系" <?php if($dep == "信息安全与网络系") echo'selected = "true"';?>>信息安全与网络系</option>
                            <option value="计算机实验班" <?php if($dep == "计算机实验班") echo'selected = "true"';?>>计算机实验班</option>
                            <option value="数学实验班" <?php if($dep == "数学实验班") echo'selected = "true"';?>>数学实验班</option>
                            </select>  
                            <input type="hidden" name="stu" value="assign">
                        </div>
                        
                        <button type="submit" class="btn btn-info" style="display: inline;" id="sub-confirm" >确定</button>

                    </form>

                    </div>
                    

                </div>
                <!-- </div> -->
                <!-- <br /> -->
                <!-- <div class="table-responsive"> -->
                    <table id="sresult" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                               <th>学生学号</th>
                                <th>学生姓名</th>
                                <th>导师工号</th>
                                <th>导师姓名</th>
                            </tr>                            
                        </thead>

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
                        <div class="col-md-2"> </div>
                        <div class="col-md-2"> </div>
                        <div class="col-md-2"> 
                            <button type="submit" class="btn btn-info" id="sub-result-export"> <a id="downloadFile" href="<?php echo OLD; ?>/../教师初始账号表.xls" download="result" style="color: #fff; text-decoration: none;">导&nbsp;&nbsp;出</a></button>
                        </div>
                        <div class="col-md-2"> 
                        <button type="submit" class="btn btn-danger" id="sub-result-change"><a style="color:white;" href="<?php echo url('/index/TeachingOfficeTutor/student_to_modify/dep/'.$dep.'/grade/'.$grade); ?>">修&nbsp;&nbsp;改</a></button>  
                        </div>
                    </div>

                    <nav>
                        <ul class="pagination" style="float: right;">
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.($curPage-1).'/dep/'.$dep.'/grade/'.$grade); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_21375__=$curPage-2;$__FOR_END_21375__=$curPage+3;for($i=$__FOR_START_21375__;$i < $__FOR_END_21375__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_11422__=$totalPage-5;$__FOR_END_11422__=$totalPage;for($i=$__FOR_START_11422__;$i < $__FOR_END_11422__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_19161__=1;$__FOR_END_19161__=6;for($i=$__FOR_START_19161__;$i < $__FOR_END_19161__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_24864__=1;$__FOR_END_24864__=$totalPage;for($i=$__FOR_START_24864__;$i < $__FOR_END_24864__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="<?php echo url('/index/TeachingOfficeTutor/student_assign/page/'.($curPage+1).'/dep/'.$dep.'/grade/'.$grade); ?>">&raquo;</a></li>
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
<script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/backstage.js"></script>
<!--导出excel-->
<script type="text/javascript" src="<?php echo OLD; ?>/js/tableExport.js"></script>
</body>
</html>
