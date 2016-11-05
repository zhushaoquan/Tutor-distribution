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
                var ok5=false;
                var test_mobilphone = /^0?1[3|4|5|8][0-9]\d{8}$/;
                var test_email = /^[a-zA-Z0-9][a-zA-Z0-9._-]*\@[a-zA-Z0-9]+\.[a-zA-Z0-9\.]+$/;   

                // 验证姓名
                $('input[name="name"]').focus(function(){
                  $(this).next().text('请填写您的真实姓名').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 1 && $(this).val().length <=20 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok1=true;
                    }else{
                        $(this).next().text('请填写您的真实姓名');
                    }
                     
                });
                // 验证年龄
                $('input[name="age"]').focus(function(){
                    $(this).next().text('请填写您的年龄').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 1 && $(this).val().length <=200 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().text('年龄应该为1-3位数之间');
                    }
                
                });

                // 验证生日
                $('input[name="birthday"]').focus(function(){
                    $(this).next().text('生日格式：19810101').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 1 && $(this).val().length <=200 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().text('生日格式：19810101');
                    }

                }); 

                // 验证系别
                $('input[name="department"]').focus(function(){
                    $(this).next().text('请填写您所属系别').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 1 && $(this).val().length <=200 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().text('请填写您所属系别');
                    }

                });    

                // 验证电话
                $('input[name="telephone"]').focus(function(){
                  $(this).next().text('请填写11位手机号码').removeClass('state1').addClass('state2');
                    
                }).blur(function(){
                  if (test_mobilphone.test($(this).val())) {
                     $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                  }else{
                     $(this).next().text('请正确填写手机号码').removeClass('state1').addClass('state3');
                  }

                });    

                // 验证电话邮箱
                $('input[name="email"]').focus(function(){
                    $(this).next().text('邮箱大致格式：xxxxxx@xx.xxx').removeClass('state1').addClass('state2');
                }).blur(function(){ 
                    if(test_email.test($(this).val())){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().text('请正确填写邮箱地址').removeClass('state1').addClass('state3');
                    }

                });    
                
                 // 验证性别
                $('input[name="sex"]').focus(function(){
                    $(this).next().text('性别为‘男’或‘女’').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val()== "男" || $(this).val()=="女" && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok3=true;
                    }else{
                        $(this).next().text('请输入‘男’或‘女’').removeClass('state1').addClass('state3');
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
                 $_SESSION["mark"]=1;
                 $workNumber = $_SESSION["temp"][0];
                 $mark = 1;
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
                      $result = mysql_query("SELECT * FROM user_teacher where workNumber='$workNumber'");
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
            </span>老师</p>
          </div>
          <div id="status2">
            <div id="refer-to-change">
            </div>
          </div>

      </div>

      <div id="main-content">
          <div id="sider">
            <ul>
              <li><a class="a_sider" href="teacher_table_overview">查看表格</a></li>  
              <li><a class="a_sider" href="teacher_fill_online">填写表格</a></li>
              <li class="now_li"><a class="a_sider a_now" href="teacher-information.php">个人信息</a></li>
            </ul>
          </div>

          <div id="right-text">
            
            <div id="re-text">
                <form name="information" action="../../php/teacher-info.php" method="post">
                <input placeholder="姓名:"  class="re-input" type="text"   name="name" /> <span class='state1'>请输入姓名</span>
                <input placeholder="性别:"  class="re-input" type="text"   name="sex" /> <span class='state1'>请输入性别</span> 
                <!-- <input placeholder="生日:"  class="re-input" type="text"   name="birthday" /> <span class='state1'>请输入生日</span> -->
                <input placeholder="系别:"  class="re-input" type="text"   name="department" /> <span class='state1'>请输入系别</span>
                <input placeholder="电话:"  class="re-input" type="text"   name="telephone" /> <span class='state1'>请输入电话</span>  
                <input placeholder="邮箱:"  class="re-input" type="text"   name="email" /> <span class='state1'>请输入邮箱</span>
                <input placeholder="密码:"  class="re-input" type="password"   name="password" /> <span class='state1'>请输入密码</span>
                <input placeholder="确认密码:"  class="re-input" type="password"   name="repassword" /> <span class='state1'>请确认密码</span>
                </br> 

                  <input type="submit" id="change_submit" class="btn btn-success"  value="确认修改" />
               </form>
            </div>
          <div>
    </div>
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
