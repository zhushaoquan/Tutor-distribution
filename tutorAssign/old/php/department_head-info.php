<?php 
require dirname(__DIR__).'/lib/functions.php';
echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
  session_start();
  $workNumber = $_SESSION["temp"][0];
  $name = $_POST["name"];
  $sex =$_POST["sex"];
  // $birthday=$_POST["birthday"];
  $department=$_POST["department"];
  $telephone = $_POST["telephone"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $repassword = $_POST["repassword"];
  //判断表格是否未填写
  $empty = 0;
  
  //判断两次密码是否一致
  $equal_pwd = 1;
  $major=$_POST["major"];
  // var_dump($major);
  // echo count($major)."</br>";
  if(count($major)==1&&$name==''&&$sex==''&&$password==''&&$repassword==''&&$department==''&&$telephone==''&&$email=='')
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
                mysql_query("UPDATE user_department_head SET name = '$name'               WHERE   workNumber = '$workNumber' AND '$name' != ''");
                mysql_query("UPDATE user_department_head SET sex = '$sex'                 WHERE   workNumber = '$workNumber' AND '$sex' != ''");
                // mysql_query("UPDATE user_department_head SET birthday = '$birthday'       WHERE   workNumber = '$workNumber' AND '$birthday' != ''");
                mysql_query("UPDATE user_department_head SET department = '$department'   WHERE   workNumber = '$workNumber' AND '$department' != ''");
                mysql_query("UPDATE user_department_head SET telephone = '$telephone'     WHERE   workNumber = '$workNumber' AND '$telephone' != ''");
                mysql_query("UPDATE user_department_head SET email = '$email'               WHERE   workNumber = '$workNumber' AND '$email' != ''");
                mysql_query("UPDATE user_department_head SET password = '$password'       WHERE   workNumber = '$workNumber' AND '$password' != ''");
                if(count($major)>1){

                mysql_query("DELETE FROM department_head_majors WHERE workNumber='$workNumber'");
                for($i=1;$i<count($major);$i++){
                mysql_query("INSERT INTO  department_head_majors(workNumber,major)  VALUES('$workNumber','$major[$i]')");
                    //echo "专业被选中".$i.":".$major[$i];//显示哪些复选框被选中
                  }
                }
                jump_success("修改信息成功！", "../index.php");
            }
          }
        //不合法的处理
        if($empty==1){
            jump_error('未填写内容，无信息修改！', '../html/department_head/department_head-information-change.php');
          }
        else if($password!=''&&$repassword!=''&&$equal_pwd==0) 
        { 
          jump_error('两次密码输入不一致！', '../html/department_head/department_head-information-change.php');
        } 
          
    
  
   
    ?>
  