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
    jQuery.fn.rowspan = function(colIdx) { //封装的一个JQuery小插件
    return this.each(function(){
    var that;
    $('tr', this).each(function(row) {
    $('td:eq('+colIdx+')', this).filter(':visible').each(function(col) {
    if (that!=null && $(this).html() == $(that).html()) {
    rowspan = $(that).attr("rowSpan");
    if (rowspan == undefined) {
    $(that).attr("rowSpan",1);
    rowspan = $(that).attr("rowSpan"); }
    rowspan = Number(rowspan)+1;
    $(that).attr("rowSpan",rowspan);
    $(this).hide();
    } else {
    that = this;
    }
    });
    });
    });
    }
    $(function() {
    $("#table_cl_info").rowspan(0);//
   
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
                 $workNumber = $_SESSION["temp"][0];
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
                      $result = mysql_query("SELECT * FROM user_teaching_office where workNumber='$workNumber'");
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
            </span>教学办</p>
          </div>
          <div id="status2">
          
          </div>
        </div>
        <div id="main-content">
          <div id="sider">
            <ul>
              <li><a class="a_sider" href="teaching_office-index.php"  >上传表格</a></li>
              <li><a class="a_sider" href="teaching_office_table_overview">报课情况</a></li>  
              <li class="now_li"><a class="a_sider a_now" href="teaching_office_manager-teacher.php">管理教师</a></li>
              <li><a class="a_sider" href="teaching_office-information.php">个人信息</a></li>
            </ul>
          </div>
          <div id="right-text">
          <div class="table_input_area">
           <form  method="post"  action="../../php/file_input1.php"   enctype="multipart/form-data">
               <input type="file" name="testFile" >
               </br> </br> </br> 
               <button  type="initial" class="btn-initial ">教师账号导入</button>
          </form>
          
          <a class="btn-jz" href="teaching_office_manager-department_head.php">系负责人账号管理</a>
          
          <div style="margin-top:30px;"><p>现有教师账号:</p></div>
          <table class="table_gen_wid" border="1" id="st-info-m">
              <tbody>
                <tr>
                <th>职工号</th>
                <th>姓名</th>
                <th>密码</th>
                </tr>
                 <?php 
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
                      $result = mysql_query("SELECT * FROM user_teacher");
                      if(mysql_num_rows($result)>0)
                      while($row = mysql_fetch_array($result))
                            {
                              echo"<tr><td>".$row['workNumber']."</td>";
                              echo"<td>".$row['name']."</td>";
                              echo"<td>".$row['password']."</td>";
                              echo"</td></tr>";
                            }
                  }  
                ?>
                <tr>

                </tr>
                <tbody>
            </table>
        </div>
        
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
