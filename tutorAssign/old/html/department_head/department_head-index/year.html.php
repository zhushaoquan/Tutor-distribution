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
  <script type="text/javascript" src="../../../js/jquery.min.js"></script>
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
  <link href="../../../css/base.css" type="text/css" rel="stylesheet"/>
 </head>
 <body>

 <div id="container">
      <div id="head">
          <div id="logo">
            <img src="../../../image/logo.png" width="220" height="78">
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
                      $result = mysql_query("SELECT * FROM user_department_head where workNumber='$workNumber'");
                      if(mysql_num_rows($result)>0)
                      {
                        $row = mysql_fetch_array($result);          
                        $GLOBALS['name']=$row['name'];
                      }
                  }
            ?>
            <a class="a_exit" href="../../jump.php">退出系统</a>
            <p>欢迎您，<span>
              <?php
                if(!isset($name)||empty($name))
                {  
                  header("Location:../../index.php");        
                  //jump_success("请重新登录", '../../index.php');
                } 
               echo $name;
                   ?> 
            </span>系负责人</p>
          <div >
            <p class="remind">提示：单击＜个人信息＞右上角的＜修改信息＞，更改自己负责的专业后，可在此查看对应专业报课信息。</p>
          </div>
          </div>
        </div>
        <div id="main-content">
          <div id="sider">
            <ul>    
              <li class="now_li"><a class="a_sider a_now" href="../department_head-index">报课情况</a></li>  
              <li><a class="a_sider" href="../department_head_manager-teacher.php">管理教师</a></li>
              <li><a class="a_sider" href="../department_head-information.php">个人信息</a></li>
            </ul>
          </div>
          <div id="right-text">
                
              <!--此处应显示所有年份列表-->
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
                      //$year=date("Y");
                      $sql="SELECT DISTINCT year,semester FROM task_info ORDER BY year DESC,semester DESC";//查询表格所有年份学期
                      $result=mysql_query($sql);
                      if(!empty($result)){
                        while($row=mysql_fetch_array($result))//对于每条年份学期记录
                        {
                          $sql1="SELECT major FROM department_head_majors WHERE workNumber='$workNumber'";//查找职工号对应的专业
                          $result1 = mysql_query($sql1);
                          if(!empty($result1)){
                               while( $row1=mysql_fetch_array($result1)){

                                //查询当年当学期里，表名包含该负责人所负责的该专业的所有表名
                                $sql2="SELECT relativeTable FROM task_info WHERE  relativeTable  LIKE '%$row1[major]%' AND year = $row[year] AND semester = $row[semester]";
                               
                                $result2=mysql_query($sql2); 
                                if(mysql_num_rows($result2)>0)  
                                  {
                                         echo'<li class="list-group-item">
                                      <span class="table_name">'.$row['year'].'年'.$row['semester'].'学期'.'</span>'
                                       .'<span class="table_download">
                                      <a class="list-group-item-a" href="index.php?year='.$row['year'].'&semester='.$row['semester'].'">'.'点击查看</a></sapn>';  
                                      break;
                                  }
                                  
                                 
                              }
                         }
                        }
                      }
                      //echo $year;
                  }
              ?>
            <div>
        </div>
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
