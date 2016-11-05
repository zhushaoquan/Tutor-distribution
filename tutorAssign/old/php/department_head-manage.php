<?php
require dirname(__DIR__).'/lib/functions.php';

$workNumber = $_POST["workNumber"];
$name = $_POST["name"];
$password = $_POST["password"];
$jud = $_POST["jud"];

header("Content-type: text/html; charset:utf-8");
$con = get_db();;
if($jud=='cut')
{
  $reque = mysql_query("SELECT * FROM user_department_head WHERE workNumber = '$workNumber'");
  $row =mysql_fetch_array($reque);  
        //var_dump($row);
  $reque=mysql_query("DELETE FROM user_department_head WHERE workNumber='$workNumber' AND password='$password'");
  if(!$row[0])
  {
    jump_error('不存在该职工号，删除失败');
  }else if ($row[1] != $password)
  {
    jump_error('密码错误，删除失败');
  }else
  {
    jump_success('删除成功');
  }

}

else if($jud=='add')
{
  $reque=mysql_query("INSERT INTO  user_department_head(workNumber,name,password)  VALUES('$workNumber','$name','$password')");
  if(!$reque)
  {
   jump_error('添加失败');
 }
 else
 {
  jump_success('添加成功');
}
}

?>