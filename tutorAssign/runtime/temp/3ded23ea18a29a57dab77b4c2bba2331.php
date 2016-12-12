<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office_tutor\tutor_change.html";i:1481467353;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap-editable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/tutor-change.css">
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
                    <a href="<?php echo url('/index/TeachingOfficeTutor/index'); ?>">
                        <li><i class="glyphicon glyphicon-user"></i> 个人信息</li>
                    </a>
                    <li><i class="glyphicon glyphicon-th-list"></i> 管理系负责人</li>
                    <a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change'); ?>">
                        <li class="active"><i class="glyphicon glyphicon-pencil"></i> 导师分配情况</li>
                    </a>
                    <a href="<?php echo url('/index/TeachingOfficeTutor/student_assign'); ?>">
                        <li><i class="glyphicon glyphicon-ok"></i> 学生分配情况</li>
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
                    <a href="<?php echo url('BaseController/logout'); ?>"><i class="glyphicon glyphicon-off"></i>退出</a>
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


                    <div class="form-horizontal" role="form">
                <div class="form-group">
                                        <form action="<?php echo url('TeachingOfficeTutor/tutor_change'); ?>" method="post">
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
                            <option value="信息安全与网络工程系" <?php if($dep == "信息安全与网络工程系") echo'selected = "true"';?>>信息安全与网络工程系</option>
                           
                            </select>  
                            <input type="hidden" name="stu" value="assign">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="display: inline;" id="sub-confirm" >确定</button>

                    </form>

                    </div>
                    

                </div>

                    
                    <div class="table-responsive">
                        

                        <table id="tresult" class="table table-bordered">

                            <thead> 
                                <tr>
                                    <th>导师工号</th>
                                    <th style="text-align: center;">导师姓名</th>
                                    <th>学生学号</th>
                                    <th>学生姓名</th>
                                    <th class="col-add" style="display: none">操作</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td id="<?php echo $v['tnum']; ?>" style="vertical-align:middle" rowspan="<?php echo $v['lenth']+1; ?>"><?php echo $v['tnum']; ?></td>
                                    <td class="teacher-name" rowspan="<?php echo $v['lenth']+1; ?>" style="vertical-align:middle"><?php echo $v['tname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button name="<?php echo $v['tname']; ?>" value="<?php echo $v['tnum']; ?>" class="btn-add" data-toggle='modal' data-backdrop="static" data-target="#addModal">新增
                                        </button>
                                    </td>
                               
                               <?php  if($v['lenth' ]== 0)echo "<td>暂无结果</td><td>暂无结果</td>"; if(is_array($v['tstudentL']) || $v['tstudentL'] instanceof \think\Collection): $i = 0; $__LIST__ = $v['tstudentL'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                                       <if condition="$i eq )">
                                        <else/><tr>
                                        </if>
                                    
                                        <td><?php echo $v2['snum']; ?></td>
                                        <td><?php echo $v2['sname']; ?></td>
                                        <td style="display: none;">
                                            <button class="btn-delete" id="<?php echo $v2['snum']; ?>" value="<?php echo $v2['snum']; ?>" name="<?php echo $v2['sname']; ?>" teacher_id="<?php echo $v['tnum']; ?>" data-toggle='modal' data-backdrop="static" data-target="#deleteModal">删除
                                            </button>
                                        </td>
                                </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                
                           
                            </tbody>
                        </table>
                    </div>

                    <div class="submit-area">
                        <div class="col-md-2"> </div>
                        <div class="col-md-2"> </div>
                        <div class="col-md-2"> 
                            <button type="submit" class="btn btn-primary" id="sub-result-export" onClick ="$('#sresult').tableExport({type:'excel',escape:'false'});">导&nbsp;&nbsp;出</button>
                        </div>

                        <div class="col-md-2"> 
                        <button type="submit" class="btn btn-danger" id="sub-result-change">修&nbsp;&nbsp;改</button>  
                        </div>
                    </div>

                    <div style="height: 60px">
                    <nav>
                        <ul class="pagination" style="float: right;">
                           <?php if($curPage != 1): ?>
                              <li><a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.($curPage-1).'/dep/'.$dep.'/grade/'.$grade); ?>">&laquo;</a></li>
                          <?php endif; if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_5532__=$curPage-2;$__FOR_END_5532__=$curPage+3;for($i=$__FOR_START_5532__;$i < $__FOR_END_5532__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): $__FOR_START_24847__=$totalPage-5;$__FOR_END_24847__=$totalPage;for($i=$__FOR_START_24847__;$i < $__FOR_END_24847__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } elseif($totalPage > 5): $__FOR_START_13934__=1;$__FOR_END_13934__=6;for($i=$__FOR_START_13934__;$i < $__FOR_END_13934__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } else: $__FOR_START_6633__=1;$__FOR_END_6633__=$totalPage;for($i=$__FOR_START_6633__;$i < $__FOR_END_6633__;$i+=1){ ?>
                              <li><a <?php if($i==$curPage) echo "class='active'"; ?> href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.$i.'/dep/'.$dep.'/grade/'.$grade); ?>" ><?php echo $i; ?></a></li>
                            <?php } endif; if($curPage < $totalPage-1): ?>
                            <li><a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change/page/'.($curPage+1).'/dep/'.$dep.'/grade/'.$grade); ?>">&raquo;</a></li>
                          <?php endif; ?>
                        </ul>
                    </nav>
                    </div>
                </div>
                <div class="footer" style="border-radius: 10px; margin-top: 80spx">
                    Designed by Lin & 我说的都队
                </div>
            </div>
        </div>
    </div>

    <!-- 新增弹出框 -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="addModalLabel">
                    某某老师
                </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="workNum" id="workNum">
                    <div>
                    <div id="info-load">等待数据加载...</div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>学号</th>
                                <th>姓名</th>
                            </tr>
                            </thead>
                            <tbody id="student_unassign">

                            </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    </form>
                    <div class="modal-footer">
                        <a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change'); ?>" id="btn-colse-add" class="btn btn-default" >关闭
                        </a>
                        <button id="btn-add-student" form="addStudent" class="btn btn-primary">
                            确认
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 删除弹出框 -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="deleteModalLabel">
                    删除学生
                </h4>
                </div>
                <div class="modal-body">
                    <div id="deleteinfo" style="width: 80%; text-align: center;font-size: 20">
                        
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo url('/index/TeachingOfficeTutor/tutor_change'); ?>" id="btn-colse-del" class="btn btn-default" >关闭
                        </a>
                        <button type="button" id="btn-del-student" class="btn btn-primary">
                            确认
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
    <script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>

    <!--导出excel-->
    <script type="text/javascript" src="<?php echo OLD; ?>/js/tableExport.js"></script>


    <script type="text/javascript">
    var teacher_id;
    var teacher_name;
    var student_id;
    var student_name;

    //点击修改按钮
    $("#sub-result-change").click(function() {
        $(".btn-add").css('display', 'inline');
        $(".btn-delete").css('display', 'block');
        $(".col-add").css('display', 'table-cell');
        $(".btn-add").parent().css('display', 'table-cell');
        $(".btn-delete").parent().css('display', 'table-cell');
        console.log('click');
    });

    //添加学生
    $(".btn-add").click(function() {
        teacher_id = $(this).val();
        teacher_name = $(this).attr('name');

        console.log($(this).val());
        $("#addModalLabel").text(teacher_name + '(' + teacher_id + ')');
        getUnassignStu(true,teacher_id);
    });


    //点击确认添加按钮。为导师添加学生
    $("#btn-add-student").click(function(){
        var isAnyChecked = false;
        console.log("btn-add-student");
        var selectedStudent = new Array();
        var arr = $("input[type='checkbox']");
        console.log("length="+arr.length);
        for( var i = 0; i < arr.length; ++i){
            if(arr[i].checked === true){
                selectedStudent.push(arr[i].value);
                isAnyChecked = true;
            }
        }

        if(isAnyChecked){
            //向服务器提交新增数据
            $.post("<?php echo PREFIX; ?>/TeachingOfficeTutor/insert",
            {
                teacher_id: teacher_id,
                stus: selectedStudent
            },
                function(data,status){
                  console.log(data);
                  if(status === "success"){
                    $("#info-load").css("color","green")
                    .css("display","block").text("提交更改成功");
                    
                    $("#student_unassign").empty();
                    getUnassignStu(false);
                  }else{
                    $("#info-load").css("color","red")
                    .css("display","block").text("提交更改失败");
                  }
                }
            );
        }else{
            $("#info-load").css("color","red")
            .css("display","block").text("未选中学生");
        }
    });


    function getUnassignStu(isFirstTime=true,teacher_id){
        //将未匹配学生显示在表格上
        $.getJSON("<?php echo PREFIX; ?>/TeachingOfficeTutor/select_student",{teacher_id:teacher_id},function(data, status){
            if(status === "success"){
                console.log('json');
                if(isFirstTime){
                    $("#info-load").css("display","none");
                }
                
                $.each(data.result,function(i, item){
                    $("#student_unassign").append(
                        "<tr><td><input class=\"chb\" value=\""+item.serialNum+"\" type=\"checkbox\"></td>" +
                        "<td>" + item.serialNum + "</td>" +
                        "<td>" + item.name + "</td></tr>"
                        );
                });

            }else{
                $("#info-load").css("color","red")
                .css("display","block").text("数据加载失败");
                console.log('fail')
            }
        });
    }

    //删除学生
    $(".btn-delete").click(function(){
        $("#btn-del-student").removeAttr("disabled");
        console.log("click");
        student_id = $(this).val();
        student_name = $(this).attr('name');
        teacher_id = $(this).attr('teacher_id');

        console.log($(this).val());
        // $("#workNum2").val(teacher_id);
        $("#deleteinfo").css("color","black");
        $("#deleteinfo").text("确认删除  "+student_name + '(' + student_id + ')?');
    });

    //向服务器提交删除信息
    $("#btn-del-student").click(function(){
        $(this).attr("disabled","disabled");
        //向服务器提交数据
        $.post("<?php echo PREFIX; ?>/TeachingOfficeTutor/delete",
        {
            teacher_id: teacher_id,
            student_id: student_id 
        },
            function(data,status){
              console.log(data);
              if(status === "success"){
                $("#deleteinfo").css("color","green")
                .css("display","block").text("删除成功！");
              }else{
                $("#info-load").css("color","red")
                .css("display","block").text("删除失败！");
              }
            }
        );
    });
    </script>
</body>
</html>
