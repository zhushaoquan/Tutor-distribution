<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:110:"C:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\department_head_tutor\match_setting.html";i:1481298841;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/bootstrap.css">
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
                <a href="<?php echo url('DepartmentHeadTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <a href="<?php echo url('DepartmentHeadTutor/studentManager'); ?>"><li><i class="glyphicon glyphicon-th-list"></i> 学生管理</li></a>
                <li><i class="glyphicon glyphicon-pencil"></i> 导师管理</li>
                <a href="<?php echo url('DepartmentHeadTutor/timeSetting'); ?>"><li><i class="glyphicon glyphicon-time"></i> 匹配设置</li></a>
                <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>"><li class="active"><i class="glyphicon glyphicon-ok"></i> 匹配结果</li></a>
                <li><i class="glyphicon glyphicon-download-alt"></i> 结果导出</li>
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
                    <p>提示：以下学生未分配到导师，请手动分配或系统智能分配，分配结果请逐一进行确认！</p>
                </div>
                <div class="my-information-title">
                    <span>分配列表</span>
                    <a href="" class="btn btn-info button-size btn-edit" style="width: 90px;">智能分配</a>
                </div>
                <div class="my-information-subtitle">
                    <span>为未分配到导师的学生进行导师分配</span>
                </div>

                <div class="table-position">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>学号</th>
                                <th>姓名</th>
                                <th>第一志愿</th>
                                <th>第二志愿</th>
                                <th>第三志愿</th>
                                <th>第四志愿</th>
                                <th>第五志愿</th>
                                <th>分配操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($voluntary) || $voluntary instanceof \think\Collection): $i = 0; $__LIST__ = $voluntary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $v['information']['serialNum']; ?></td>
                                    <td><?php echo $v['information']['name']; ?></td>
                                    <td><?php echo $v['firstTeacher']['name']; ?></td>
                                    <td><?php echo $v['secondTeacher']['name']; ?></td>
                                    <td><?php echo $v['thirdTeacher']['name']; ?></td>
                                    <td><?php echo $v['forthTeacher']['name']; ?></td>
                                    <td><?php echo $v['fifthTeacher']['name']; ?></td>
                                    <td>
                                        <button id="btn-teacher" value="<?php echo $v['information']['sid']; ?>" class="teacher-select" href="#" style="text-decoration: none;background-color: transparent;border-style: none;"><span>可选导师</span></button>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table> 

                    <nav>
                      <ul class="pagination" style="float: right;">
                          <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/index/DepartmentHeadTutor/matchSetting/'.($curPage-1)); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_30035__=$curPage-2;$__FOR_END_30035__=$curPage+3;for($i=$__FOR_START_30035__;$i < $__FOR_END_30035__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='now'"; ?> href="<?php echo url('/index/index/DepartmentHeadTutor/matchSetting/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_8514__=$totalPage-5;$__FOR_END_8514__=$totalPage;for($i=$__FOR_START_8514__;$i < $__FOR_END_8514__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='now'"; ?> href="<?php echo url('/index/index/DepartmentHeadTutor/matchSetting/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_23437__=1;$__FOR_END_23437__=6;for($i=$__FOR_START_23437__;$i < $__FOR_END_23437__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='now'"; ?> href="<?php echo url('/index/index/DepartmentHeadTutor/matchSetting/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_13348__=1;$__FOR_END_13348__=$totalPage;for($i=$__FOR_START_13348__;$i < $__FOR_END_13348__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='now'"; ?> href="<?php echo url('/index/index/DepartmentHeadTutor/matchSetting/page/'.$i); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="#">&raquo;</a></li>
                          <?php endif; ?>
                      </ul>
                    </nav>   
                </div>

                <div class="table-position-popup">
                    <span class="close-custom"><strong>关闭</strong></span>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>姓名</th>
                                <th>是否带实验班</th>
                                <th>所需计实班人数</th>
                                <th>所需数实班人数</th>
                                <th>所需自然班人数</th>
                                <th>当前计实班人数</th>
                                <th>当前数实班人数</th>
                                <th>当前自然班人数</th>
                                <th>分配操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($teacher) || $teacher instanceof \think\Collection): $k = 0; $__LIST__ = $teacher;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($k % 2 );++$k;?>
                                <tr>
                                    <td><?php echo $k; ?></td>
                                    <td><?php echo $t['name']; ?></td>
                                    <td>是</td>
                                    <td style="text-align: center;"><?php echo $t['isExperial']; ?></td>
                                    <td style="text-align: center;">10</td>
                                    <td style="text-align: center;">10</td>
                                    <td style="text-align: center;">10</td>
                                    <td style="text-align: center;">10</td>
                                    <td style="text-align: center;">10</td>
                                    <td>
                                        <button href="#" class="btn-alloc" value="<?php echo $t['workNumber']; ?>" style="text-decoration: none;background-color: transparent;border-style: none;"><span>确认分配</span></button>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
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
<script type="text/javascript">
    $(document).ready(function(){
        var popupID = $('.table-position-popup');
        popupMarginLeft = ($('body').width() - popupID.width() - 50)/2;     
        popupID.css('left',popupMarginLeft + 'px');

        var mask = '<div class="mask"></div>';

        $('.teacher-select').click(function(){
            $('body').append(mask);
            popupID.fadeIn(400).css('display','block');
;        });

        $('.close-custom').click(function(){
            $('.mask').remove();
            popupID.css('display','none');
;        });
    });


</script>

<script type="text/javascript">
    var sid;
    var workNumber;
    $(".teacher-select").click(function(){
        sid = $(this).val();
        // console.log(sid);
    });

    $(".btn-alloc").click(function(){
        workNumber = $(this).val();
        // console.log(workNumber);
        $.post("../DepartmentHeadTutor/allocStudent.html",
    {
        sid: sid,
        workNumber: workNumber
    },
    function(data,status){
        if(status == "success"){
            // console.log(data);
            location.href = "../DepartmentHeadTutor/matchSetting.html"
        }
    }
    );
    });
</script>>
</body>
</html>


