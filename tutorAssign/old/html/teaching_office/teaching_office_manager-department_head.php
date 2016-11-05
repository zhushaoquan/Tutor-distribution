<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
  <title>教师报课管理系统</title>
  <script type="text/javascript" src="../../js/jquery.min.js"></script>
   <script type="text/javascript">
   $(function(){
    setSize();
   }
    )
       $(window).resize(function(){
            setSize();
       });
       function setSize(){
            var height1 = $("#bgConsure").height();
            var height2 = $("#footer").height();
            var number = parseInt(height1);
            var right_nav = $("#right-nav").height();
            var min_height = number - 110;
             var r_min_height = min_height - right_nav;
            $("#register-content").css('min-height', min_height);
             $("#right-content").css('height', r_min_height);
            var left = $("#left").height();
            //alert(left);
        };
    </script> 
    <script>
            $(function(){
 
                var ok1=false;
                var ok2=false;
                var ok3=false;
                var ok4=false;
                var ok4=false;
 
                

                //验证职工号
                $('input[name="workNumber"]').focus(function(){
                    $(this).next().text('职工号应该为1-20位之间').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >=1 && $(this).val().length <=20 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok4=true;
                    }else{
                        $(this).next().text('职工号应该为1-20位之间').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证密码
                $('input[name="password"]').focus(function(){
                    $(this).next().text('密码应该为1-20位之间').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >=1 && $(this).val().length <=20 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok4=true;
                    }else{
                        $(this).next().text('密码应该为1-20位之间').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证确认密码
                    $('input[name="repassword"]').focus(function(){
                    $(this).next().text('输入的确认密码要和上面的密码一致').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 1 && $(this).val().length <=20 && $(this).val()!='' && $(this).val() == $('input[name="password"]').val()){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok5=true;
                    }else{
                        $(this).next().text('输入的确认密码要和上面的密码一致').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //提交按钮,所有验证通过方可提交
 
              
                 
            });
        </script>
  
  <script type="text/javascript">
   $(function(){
    setSize();
   }
    )
       $(window).resize(function(){
          setSize();
       });
        function setSize() {
            var height1 = $("#bgConsure").height();
            var height2 = $("#footer").height();
            var number = parseInt(height1);
            var right_nav = $("#right-nav").height();
            var min_height = number - 110;
             var r_min_height = min_height - right_nav;
            $("#left").css('min-height', min_height);
            $("#right").css('min-height', min_height);
            $("#left").css('height', min_height);
            $("#right").css('height', min_height);
           
             $("#right-content").css('height', r_min_height);
            var left = $("#left").height();
            var width1 = $("#container").width();
            var width11 = parseInt(width1);
            var width_status = width11 - 221;
            $("#status1").css('min-width',width_status);
             $("#status2").css('min-width',width_status);
            $("#right-text").css('width',width_status);
            //alert(left);
        }   
    </script> 
  <link href="../../css/base.css" type="text/css" rel="stylesheet"/>
 </head>
 <body>

 <div id="container">
      <div id="head">
          <div id="logo">
            <img src="../../image/logo.png" width="220" height="78">
          </div>
          <div id="status1">
            <?php 
                 session_start();
                 $workNumber = $_SESSION["temp"][0];
                 header("Content-type: text/html; charset:utf-8");                 
                   $con = mysql_connect("localhost","root","");
                   if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {
                      mysql_select_db("teacher_class_system", $con);
                      mysql_query("SET NAMES UTF8");
                      $result = mysql_query("SELECT * FROM user_teaching_office where workNumber='$workNumber'");
                      if(mysql_num_rows($result)>0)
                      {
                        $row = mysql_fetch_array($result);
                        $GLOBALS['name']=$row['name'];
                      }
                  }
            ?>
            <a class="a_exit" href="../jump.php">退出系统</a>
            <p>欢迎您，<span>
              <?php
                if(!isset($name)||empty($name))
                {  
                  header("Location:../../index.php");        
                  //jump_success("请重新登录", '../../index.php');
                } 
               echo $name;
                   ?> 
            </span>教学办</p>
          </div>
          <div id="status2">
            
          </div>

      </div>

      <div id="main-content">
          <div id="sider">
           <ul>
              <li><a class="a_sider" href="teaching_office-index.php"  >上传表格</a></li>
              <li><a class="a_sider" href="teaching_office_table_overview">报课情况</a></li>  
              <li class="now_li"><a class="a_sider a_now" href="teaching_office_manager-teacher.php">管理教师</a></li>
              <li><a class="a_sider" href="teaching_office-information.php">个人信息</a></li>
            </ul>
          </div>

          <div id="right-text">
            
           
              <table class="table_gen" border="1" id="st-info-m1">
              <tbody>
                <tr>
                <th>职工号</th>
                <th>姓名</th>
                <th>密码</th>
                </tr>
                 <?php 
                  header("Content-type: text/html; charset:utf-8");                 
                   $con = mysql_connect("localhost","root","");
                   if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {
                      mysql_select_db("teacher_class_system", $con);
                       mysql_query("SET NAMES UTF8");
                      $result = mysql_query("SELECT * FROM user_department_head");
                      if(mysql_num_rows($result)>0)
                      {
                         while($row = mysql_fetch_array($result))
                            {
                              echo"<tr><td>".$row['workNumber']."</td>";
                              echo"<td>".$row['name']."</td>";
                              echo"<td>".$row['password']."</td>";
                              echo"</td></tr>";
                            }
                      }
                  }  
                ?>
                <tr>

                </tr>
                <tbody>
            </table>
                <form action="../../php/department_head-manage.php" method="post">
                <input placeholder="职工号:"  class="re-input" type="text"   name="workNumber" required="required"/> <span class='state1'>请输入职工</span>
                <input placeholder="姓名:"  class="re-input" type="text"   name="name" /> <span class='state1'>请输入姓名(可不填)</span>
                <input placeholder="密码:"  class="re-input" type="text"   name="password" required="required"/> <span class='state1'>请输入密码</span>
              
                  </br>      
                  <div class="judgement">
                  <input type="radio" class="jud" name="jud" value="add"  checked="checked"  /> 添加该用户
                  <input type="radio" class="jud" name="jud" value="cut" />删除该用户
                  </div>
                

                  <input type="submit"  id="change_submit_l" class=" btn-recover btn-submit"  value="确认提交" />
                 
               </form>
            
          
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
