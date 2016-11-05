<?php
  require dirname(__FILE__).'/lib/functions.php';
?>
<?php
    /*根据时间自动更新数据库状态*/
		$year =date("Y");
		$date =date("Ymd");
		//echo $time;
		header("Content-type: text/html; charset:utf-8");                 
                   $con = @mysql_connect("localhost","root","root");
                   if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {
                      mysql_select_db("teacher_class_system", $con);
                      mysql_query("SET NAMES UTF8");
                      $result = mysql_query("SELECT * FROM task_info where year >= '$year'");
                      while($row = mysql_fetch_array($result))
                      {
                      	$table_name=$row["relativeTable"];
                         if($row["teacherDeadline"]<$date&&$row["taskState"]=='0')
                         {
                         	$result1 = mysql_query("UPDATE `task_info` SET `taskState` = '1' where relativeTable='$table_name'");
                         }
                          if($row["departmentDeadline"]<$date&&$row["taskState"]=='1')
                         {
                         	$result1 = mysql_query("UPDATE task_info SET taskState = '2' where relativeTable='$table_name'");
                         }
                      }
                      
                      


                  }
		?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>教师报课系统-登录</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet"/>
<link href="css/login.css" type="text/css" rel="stylesheet"/>
<script language="javascript"  src="js/index.js" ></script>
<script language="javascript"  src="js/jquery2.14.min.js" ></script>
<script language="javascript"  src="js/bootstrap.js" ></script>
</head>

<body>

 <!-- 弹出框 -->
  <div class="login-alert" id="login-alert">
    <div class="alert alert-info" role="alert">
      <p>账号或密码不正确,登录失败！</p>
    </div>
  </div>

<div class="container">
 

  <div id="login-box">
    <form action="php/login.php" class="form-signin" id="login-form" role="form" method="post">
      <div id="login-head">
        <img src="image/form-logo1.png"></div>
      <div class="form-group">
        <input type="text" placeholder="工号:"  class="form-control"  name="login-user" required ></div>
      <div class="form-group">
        <input placeholder="密码:"  type="password"  class="form-control"  name="login-password" required />    
      </div>
      <div id="iden" class="checkbox">
        <label>
          <input type="radio" name="ident" value="teacher"  checked="checked" />    
          教师
        </label>
        <label>
          <input type="radio" name="ident" value="department_head" />    
          系负责人
        </label>
        <label>
          <input type="radio" name="ident" value="teaching_office" />    
          教学办
        </label>
      </div>
      <div class="form-group">
        <button class="btn btn-success btn-block" id="sub-login">登录</button>
      </div>
    </form>
</div>
</div>
<div id="footer">
  <p>Designed by Lin</p>
</div>
</body>
  <script>  
      api = {
        "login":"php/login1.php"
      };
      /*表单提交按钮点击事件*/
      $("#sub-login").click(function(e){
        e.preventDefault();
        var data = $("#login-form").serializeArray();
        data = jsonData(data);
        // console.log(data);
        $.post(api.login,data,function(result){
          if(result==true){
            /*跳转到系统首页*/
          }
          else{
            console.log(result);
            /*弹窗提示密码错误*/
            $("#login-alert").slideDown(600);
            setTimeout(function(){
               $("#login-alert").slideUp(600);
             },3000);
          }
        });
        
      });

      //将serializeArray()结果转化成一个json对象
      function jsonData(arr){
          var jsonStr={};
          $(arr).each(function(i,ele){
              $(jsonStr).attr(ele.name,ele.value);
          });
          return jsonStr;
      }
  </script>
</html>