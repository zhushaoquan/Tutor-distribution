<?php


header("Content-type: text/html; charset=utf-8"); 
	  $dir=dirname(__FILE__);//获取当前脚本的绝对路径                
    $dir=str_replace("//","/",$dir)."/";
    
    //echo $_FILES['testFile']['name'];
    if($_FILES['testFile']['name']==''){
       echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
       echo"
          <script>alert('未选择文件！');
          window.location.href='../html/teaching_office/teaching_office-index.php'</script>";

    }
    else
      {
        $table_name = $_POST["file_input"];
      //echo $dir;
      //print_r($_FILES['testFile']);
      $filename='uploadFile.xls'; //可以定义一个上传后的文件名称
      $result=move_uploaded_file($_FILES['testFile']['tmp_name'],$dir.$filename);//假如上传到当前目录下

      //判断上传文件的文件名
      $judge_cover=0;
     
      $db_host="localhost";                                           //连接的服务器地址
      $db_user="root";                                                //连接数据库的用户名
      $db_psw="";                                                 //连接数据库的密码
      $db_name="teacher_class_system";                                           //连接的数据库名称
      $db=new mysqli($db_host,$db_user,$db_psw,$db_name);
      //检查连接是否成功
      if (mysqli_connect_errno($db)){
          //注意mysqli_connect_error()新特性
        die('Unable to connect!'). mysqli_connect_error();
      }
      $db->query("set names 'utf8'");

      if($result)  //如果上传文件成功，就执行导入excel操作
      {
       require_once 'reader.php';
       $data = new Spreadsheet_Excel_Reader();
       $data->setOutputEncoding('utf-8');//设置在页面中输出的编码方式

        //该方法会自动判断上传的文件格式，不符合要求会显示错误提示信息(错误提示信息在该方法内部)。
       $data->read("$filename");  //读取上传到当前目录下名叫$filename的文件
       error_reporting(E_ALL ^ E_NOTICE);
       $teacherDeadline =$_POST["teacherDeadline"];
       $departmentDeadline=$_POST["departmentDeadline"];
       //动态建表的后缀获取
           $year = $_POST['year'];
           $semester = $_POST['semester'];
           $tableName1 = $table_name.$year.$semester; //动态建表的表名
           $tableName2 = "cb_".$table_name.$year.$semester; //动态cb建表的表名
       //时间判断
      if($year < date('Y',time())){
        echo"
            <script>alert('所选年份要不小于当前年份！');
            window.location.href='../html/teaching_office/teaching_office-index.php'</script>";

       }else if( $teacherDeadline <= date('Ymd',time()) )
        {
          echo"
            <script>alert('报课截止日期要大于当前日期！');
            window.location.href='../html/teaching_office/teaching_office-index.php'</script>";

       }else if($teacherDeadline >= $departmentDeadline )  {
        echo"
            <script>alert('报课截止时间应小于审核截止时间！');
            window.location.href='../html/teaching_office/teaching_office-index.php'</script>";
       }else{
           
        
        $sql = "SELECT * FROM task_info WHERE relativeTable = '$tableName1'";
        $result1 = mysqli_query($db,$sql);
        

        if(mysqli_num_rows($result1)>0){  //查询表中有多少行  对于存在的课表进行覆盖处理
        $judge_cover = 1;
        $sql="delete from task_info where relativeTable=$tableName1";
        $db->query($sql);
        mysqli_query($db,"drop table $tableName1");
        mysqli_query($db,"drop table $tableName2");
        
        //echo "<script>alert("该表已存在，成功覆盖");
        //       window.location.href='../html/teaching_office/teaching_office-index.php'</script>;</script>";

        }
        //创建非cb表
        $sql = "CREATE TABLE IF NOT EXISTS $tableName1 (
          `insertTime` int(10) NOT NULL,
          `workNumber` varchar(40)  COLLATE utf8_unicode_ci,
          `grade` varchar(30) COLLATE utf8_unicode_ci,
          `major` varchar(30) COLLATE utf8_unicode_ci,
          `people` varchar(30) COLLATE utf8_unicode_ci,
          `courseName` varchar(30) COLLATE utf8_unicode_ci,
          `courseType` varchar(30) COLLATE utf8_unicode_ci,
          `courseCredit` varchar(30) COLLATE utf8_unicode_ci,
          `courseHour` varchar(30) COLLATE utf8_unicode_ci,
          `practiceHour` varchar(30) COLLATE utf8_unicode_ci,
          `onMachineHour` varchar(30) COLLATE utf8_unicode_ci,
          `timePeriod` varchar(30) COLLATE utf8_unicode_ci,
          `teacherName` varchar(200) COLLATE utf8_unicode_ci,
          `remark` varchar(200) COLLATE utf8_unicode_ci,
          PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,
            `courseType`,`courseCredit`,`courseHour`,`practiceHour`,
            `onMachineHour`,`timePeriod`,`teacherName`,`remark`))";
        $db->query($sql);
        $sql = "ALTER TABLE $tableName1 ADD INDEX ( `insertTime` ) ";//设置索引
        $db->query($sql);
        $state = '0';
        $sql = "INSERT INTO task_info(relativeTable,year,semester,departmentDeadline,teacherDeadline,taskState)
        VALUES('".$tableName1."','".$year."','".$semester."','".$departmentDeadline."','".$teacherDeadline."','".$state."')";
        $db->query($sql);//将新建表格信息记录到task_info表
        //创建cb表
        $sql = "CREATE TABLE IF NOT EXISTS $tableName2 (
          `insertTime` int(10) NOT NULL,
          `grade` varchar(40) COLLATE utf8_unicode_ci,
          `major` varchar(30) COLLATE utf8_unicode_ci,
          `people` varchar(30) COLLATE utf8_unicode_ci,
          `courseName` varchar(30) COLLATE utf8_unicode_ci,
          `courseType` varchar(30) COLLATE utf8_unicode_ci,
          `courseCredit` varchar(30) COLLATE utf8_unicode_ci,
          `courseHour` varchar(30) COLLATE utf8_unicode_ci,
          `practiceHour` varchar(30) COLLATE utf8_unicode_ci,
          `onMachineHour` varchar(30) COLLATE utf8_unicode_ci,
          `timePeriod` varchar(30) COLLATE utf8_unicode_ci,
          `teacherName` varchar(200) COLLATE utf8_unicode_ci,
          `remark` varchar(200) COLLATE utf8_unicode_ci,
          PRIMARY KEY (`grade`,`major`,`people`,`courseName`,
            `courseType`,`courseCredit`,`courseHour`,`practiceHour`,
            `onMachineHour`,`timePeriod`,`teacherName`,`remark`))";
        $db->query($sql);
        $sql = "ALTER TABLE $tableName2 ADD INDEX ( `insertTime` ) ";//设置索引
        $db->query($sql);
        // $sql = "INSERT INTO task_info(relativeTable,year,semester,departmentDeadline,teacherDeadline,taskState)
        // VALUES('".$tableName2."','".$year."','".$semester."','".$departmentDeadline."','".$teacherDeadline."','".$state."')";
        // $db->query($sql);//将新建表格信息记录到task_info表
       //如果excel表带标题，则从$i=2开始，去掉excel表中的标题部分(要将$i<=改为$i<否则会插入一条多余的空数据)
       for ($i = 1; $i <$data->sheets[0]['numRows']; $i++)
       {
        $sql = "INSERT INTO $tableName1(insertTime,grade,major,people,courseName,courseType,courseCredit,courseHour,practiceHour,onMachineHour,
        timePeriod,teacherName,remark) VALUES('".
        $i."','".                                //用于排序
        $data->sheets[0]['cells'][$i][1]."','".    //年级
        $data->sheets[0]['cells'][$i][2]."','".    //专业
        $data->sheets[0]['cells'][$i][3]."','".    //人数
        $data->sheets[0]['cells'][$i][4]."','".    //课程名
        $data->sheets[0]['cells'][$i][5]."','".    //课程类型
        $data->sheets[0]['cells'][$i][6]."','".    //学分
        $data->sheets[0]['cells'][$i][7]."','".    //学时
        $data->sheets[0]['cells'][$i][8]."','".     //实验学时
        $data->sheets[0]['cells'][$i][9]."','".    //上机学时
        $data->sheets[0]['cells'][$i][10]."','".   //起止时间
        $data->sheets[0]['cells'][$i][11]."','".   //教师名
        $data->sheets[0]['cells'][$i][12]."')";    //备注
  		  $db->query($sql);
        $sql = "INSERT INTO $tableName2(insertTime,grade,major,people,courseName,courseType,courseCredit,courseHour,practiceHour,onMachineHour,
        timePeriod,teacherName,remark) VALUES('".
        $i."','".                                //用于排序
        $data->sheets[0]['cells'][$i][1]."','".    //年级
        $data->sheets[0]['cells'][$i][2]."','".    //专业
        $data->sheets[0]['cells'][$i][3]."','".    //人数
        $data->sheets[0]['cells'][$i][4]."','".    //课程名
        $data->sheets[0]['cells'][$i][5]."','".    //课程类型
        $data->sheets[0]['cells'][$i][6]."','".    //学分
        $data->sheets[0]['cells'][$i][7]."','".    //学时
        $data->sheets[0]['cells'][$i][8]."','".     //实验学时
        $data->sheets[0]['cells'][$i][9]."','".    //上机学时
        $data->sheets[0]['cells'][$i][10]."','".   //起止时间
        $data->sheets[0]['cells'][$i][11]."','".   //教师名
        $data->sheets[0]['cells'][$i][12]."')";    //备注
        $db->query($sql);
        //$insert_info.= " $sql</br>\n";          //可以用来显示数据插入的信息

       }
       //$sql2="SELECT * FROM  `teacher_class` ORDER BY  `insert_time` ASC"; 
       //echo $sql;
       //$totalNums=$data->sheets[0]['numRows']-1;//求出导入的总数据条数(这里是减去2，才会得到去除标题后的总数据)
       //echo "导入成功！";
       //echo($totalNums);//导入的数据量
       unlink("$filename");  //删除上传的excel文件
       echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
       if($judge_cover==0) 
        echo"
            <script>alert('上传成功！');
            window.location.href='../html/teaching_office/teaching_office-index.php'</script>";
          
       else
         echo"
            <script>alert('该课表已存在，覆盖成功！');
            window.location.href='../html/teaching_office/teaching_office-index.php'</script>";
      }
      }
      else
      {
       $errmsg="上传失败";
      }
    }
?>