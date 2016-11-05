<?php 
require dirname(__DIR__).'/lib/functions.php';
session_start();
header("Content-type: text/html; charset=utf-8"); 
$workNumber = $_SESSION["temp"][0];
$name = $_POST["name"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
   //判断表格是否未填写
$empty = 0;

  //判断两次密码是否一致
$equal_pwd = 1;

  // var_dump($major);
  // echo count($major)."</br>";
if($name==''&&$password==''&&$repassword==''&&$telephone==''&&$email=='')
{
  $empty=1;
      //echo $empty."</br>";
}
else
{
  if($password!=$repassword)
    $equal_pwd=0;
  else{
    $con = get_db();
    mysql_select_db("teacher_class_system", $con);//连接到数据库
    mysql_query("SET NAMES UTF8");
    mysql_query("UPDATE user_teaching_office SET name = '$name'               WHERE   workNumber = '$workNumber' AND '$name' != ''");
    mysql_query("UPDATE user_teaching_office SET telephone = '$telephone'     WHERE   workNumber = '$workNumber' AND '$telephone' != ''");
    mysql_query("UPDATE user_teaching_office SET email = '$email'               WHERE   workNumber = '$workNumber' AND '$email' != ''");
    mysql_query("UPDATE user_teaching_office SET password = '$password'       WHERE   workNumber = '$workNumber' AND '$password' != ''");

    jump_success('修改信息成功！', "../index.php");
  }
}
        //不合法的处理
if($empty==1){
  jump_error('未填写内容，无信息修改！', "../html/teaching_office/teaching_office-information-change.php");
}
else if($password!=''&&$repassword!=''&&$equal_pwd==0) 
{ 

  jump_error("两次密码输入不一致！", "../html/teaching_office/teaching_office-information-change.php");
} 




?>
