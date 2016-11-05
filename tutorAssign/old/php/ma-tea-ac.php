<?php
	 $workNumber = $_POST["workNumber"];
   $name = $_POST["name"];
	 $password = $_POST["password"];
	 $jud = $_POST["jud"];
	 //echo$sno.$spassword."ok";
	 //echo $jud;
	 header("Content-type: text/html; charset:utf-8");
	 $con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}

  	else
  	{
  		mysql_select_db("teacher_class_system", $con);//连接到数据库
    	mysql_query("SET NAMES UTF8");
    	if($jud=='cut')
    	{
    		$reque=mysql_query("DELETE FROM user_teacher WHERE workNumber='$workNumber'");
    		if(!$reque)
    		{
    			echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
      	 		echo"<script>alert('删除失败');
				window.location.href='../html/teaching_office/teaching_office_manager-teacher.php'</script>";
      		 }
      		 else
      		 {
      		 	echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
      	 		echo"<script>alert('删除成功');
				window.location.href='../html/teaching_office/teaching_office_manager-teacher.php'</script>";
      		 }

    	}

   		else if($jud=='add')
   		{
   			$reque=mysql_query("INSERT INTO  user_teacher(workNumber,name,password)  VALUES('$workNumber','$name','$password')");
    		if(!$reque)
    		{
    			echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
      	 		echo"<script>alert('添加失败');
				window.location.href='../html/teaching_office/teaching_office_manager-teacher.php'</script>";
      		 }
      		 else
      		 {
      		 	echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
      	 		echo"<script>alert('添加成功');
				window.location.href='../html/teaching_office/teaching_office_manager-teacher.php'</script>";
      		 }
   		}
  	}
?>