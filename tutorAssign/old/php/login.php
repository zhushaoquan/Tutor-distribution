<?php 
require dirname(__DIR__).'/lib/functions.php';
session_start();
$name = $_POST["login-user"];
$name = trim($name);
$_SESSION["temp"][0]=$name;
$pwd = $_POST["login-password"];
$pwd = trim($pwd);
$data = $_POST["data"];
$jud=0;
echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
$con = get_db();
if($jud=="teacher")//教师类型身份验证
{
	$result = mysql_query("SELECT * FROM user_teacher");
	if(mysql_num_rows($result)>0)
	while($row = mysql_fetch_array($result))
	{
		if($row['workNumber'] === $name&&$row['password'] === $pwd)
		{
			if($row['telephone'] != ''&&$row['email'] != '' )
				jump_success("登录成功", '../html/teacher/teacher_table_overview/index.php');
			else
				jump_success("登录成功", '../html/teacher/teacher_fill_information.php');
		}

	}
	if($jud==0)
	{
		jump_error('账号或密码错误！');
	}

}

if($idf=="department_head")//系负责人类型身份验证
{
	$result = mysql_query("SELECT * FROM user_department_head");
	if(mysql_num_rows($result)>0)
	while($row = mysql_fetch_array($result))
	{
		if($row['workNumber'] === $name&&$row['password'] === $pwd)
		{
			jump_success("登录成功", '../html/department_head/department_head-index');

		}

	}
	if($jud==0)
	{
		jump_error('账号或密码错误！');
	}

}

if($idf=="teaching_office")//教学办类型身份验证
{
	$result = mysql_query("SELECT * FROM user_teaching_office");
	if(mysql_num_rows($result)>0)
	while($row = mysql_fetch_array($result))
	{
		if($row['workNumber'] === $name&&$row['password'] === $pwd)
		{
			jump_success("登录成功", '../html/teaching_office/teaching_office-index.php');

		}

	}
	if($jud==0)
	{
		jump_error('账号或密码错误！');
	}

}	
?>
