<?php 
  session_start();
  $workNumber = $_SESSION["temp"][0];
  $table_name = $_POST['table_name'];
  $cb_table_name = "cb_".$table_name;
  $class_select = $_POST['class_select'];
  $remark[]='0';
  for($i=1;$i<count($class_select);$i++)
  {
     $x=$class_select[$i];
     //echo $x;
     
     $remark1 = $_POST["$x"];
     //echo  $remark1."</br>";
     $remark[]=$remark1;
  }
 
  echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
  
 //echo $workNumber;
   $con = mysql_connect("localhost","root","");
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }
    else
    {
      mysql_select_db("teacher_class_system", $con);//连接到数据库
      mysql_query("SET NAMES UTF8");
      for($i=1;$i<count($class_select);$i++)
      {
        //echo count($class_select);
        //echo $class_select[$i].'</br>';
         //获取教师姓名
         $result=mysql_query("SELECT name FROM user_teacher WHERE workNumber='$workNumber'");
         if(mysql_num_rows($result)>0)
         {
            $row=mysql_fetch_array($result);
            $teacherName=$row["name"];
         }

        //将教师姓名插入不分行表格
         $sql="UPDATE $cb_table_name SET teacherName = concat(teacherName,'$teacherName','；') where insertTime=$class_select[$i]";
         mysql_query($sql);

         //将备注插入不分行表格对应的行
         $sql="UPDATE $cb_table_name SET remark = concat(remark,'$remark[$i]','；') where insertTime=$class_select[$i]";
         mysql_query($sql);
         //echo $remark[$i];
         
     
          //对分行表格的处理
         //获取当前插入行的信息

         $sql1 = "SELECT * FROM $cb_table_name WHERE insertTime='$class_select[$i]'";
         //echo $class_select[$i]."</br>";
         $result1 = mysql_query($sql1);
         $row1 = mysql_fetch_array($result1);
              $insertTime=$row1['insertTime']; 
              //echo $insertTime."</br>";
              $grade=$row1['grade'];     
              $major=$row1['major'];
              $people=$row1['people'];
              $courseName=$row1['courseName'];
              $courseType=$row1['courseType'];
              $courseCredit=$row1['courseCredit'];
              $courseHour=$row1['courseHour'];
              $practiceHour=$row1['practiceHour'];
              $onMachineHour=$row1['onMachineHour'];
              $timePeriod=$row1['timePeriod'];
              
              
          //echo $table_name."</br>";
         $sql="INSERT INTO `$table_name`(`insertTime`,`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`) VALUES('$insertTime','$workNumber','$grade','$major','$people','$courseName','$courseType','$courseCredit','$courseHour','$practiceHour','$onMachineHour','$timePeriod','$teacherName','$remark[$i]')";
         $result=mysql_query($sql);
         //echo $sql."</br>";
        

        

      }//根据选中课程的标识(inserttime)将选课的教师添加到两张表
        echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
        echo"
          <script>alert('填写成功，请到相关页面查看！');
          window.location.href='../html/teacher/teacher_fill_online/'</script>";
    }
 ?>