<?php 
require dirname(__DIR__).'/lib/functions.php';
  session_start();
   header("Content-type: text/html; charset=utf-8"); 
  $workNumber = $_SESSION["temp"][0];
  $mark = $_SESSION["mark"];
  $name = $_POST["name"];
  $sex =$_POST["sex"];
  // $birthday=$_POST["birthday"];
  $department=$_POST["department"];
  $telephone = $_POST["telephone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $repassword = $_POST["repassword"];
  $test_email = '/^[a-zA-Z0-9][a-zA-Z0-9._-]*\@[a-zA-Z0-9]+\.[a-zA-Z0-9\.]+$/A';
  $test_mobilphone = '#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#';
  //判断表格是否未填写
  $empty = 0;
  
  //判断两次密码是否一致
  $equal_pwd = 1;

  if($name==''&&$sex==''&&$password==''&&$repassword==''&&$department==''&&$telephone==''&&$email=='')
    {
      $empty=1;
    }
  else
    {
        if($password!=$repassword)
          $equal_pwd=0;
        else if(strlen($telephone) > 0 && !preg_match($test_mobilphone,$telephone)){
         
          if($mark==0){
          echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
            echo"
              <script>alert('提示：信息修改失败！请填写11位手机号码！');
              window.location.href='../html/teacher/teacher_fill_information.php' </script>";
          }
          else{
          echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
             echo"
                <script>alert('提示：信息修改失败！请填写11位手机号码！');
                window.location.href='../html/teacher/teacher-information-change.php' </script>";
          }
        }

        
        else if(strlen($email) > 0 && preg_match($test_email,$email) == false ){
          if($mark==0){
          echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
            echo"
              <script>alert('提示：信息修改失败！邮箱地址格式错误！');
              window.location.href='../html/teacher/teacher_fill_information.php' </script>";
          }
          else{
          echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
            echo"
              <script>alert('提示：信息修改失败！邮箱地址格式错误！');
              window.location.href='../html/teacher/teacher-information-change.php' </script>";
          }
        }
        else{
                $con = get_db();
                mysql_query("UPDATE user_teacher SET name = '$name'               WHERE   workNumber = '$workNumber' AND '$name' != ''");
                mysql_query("UPDATE user_teacher SET sex = '$sex'                 WHERE   workNumber = '$workNumber' AND '$sex' != ''");
                // mysql_query("UPDATE user_teacher SET birthday = '$birthday'       WHERE   workNumber = '$workNumber' AND '$birthday' != ''");
                mysql_query("UPDATE user_teacher SET department = '$department'   WHERE   workNumber = '$workNumber' AND '$department' != ''");
                mysql_query("UPDATE user_teacher SET telephone = '$telephone'     WHERE   workNumber = '$workNumber' AND '$telephone' != ''");
                mysql_query("UPDATE user_teacher SET email = '$email'               WHERE   workNumber = '$workNumber' AND '$email' != ''");
                mysql_query("UPDATE user_teacher SET password = '$password'       WHERE   workNumber = '$workNumber' AND '$password' != ''");
                jump_success('修改信息成功！','../index.php');
            }
          }
        //不合法的处理
        if($empty==1){
          jump_error('未填写内容，无信息修改！');
          }
        else if(($password!=''&&$repassword!='') || ($equal_pwd==0)) 
          { 
          jump_error('信息修改失败！两次密码输入不一致！');
          } 
          
    
    ?>
  