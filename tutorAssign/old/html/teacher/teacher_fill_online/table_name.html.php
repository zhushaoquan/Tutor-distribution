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

                 $work_number = $_SESSION["temp"][0];
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
                      $result = mysql_query("SELECT * FROM user_teacher where workNumber='$work_number'");
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
            </span>老师</p>
            <p class='remind'>提示：已填写过的表格，可在“查看表格”页面查看</p>
          </div>
          <div id="status2">
          </div>
        </div>
        <div id="main-content">
          <div id="sider">
            <ul>    
              <li><a class="a_sider" href="../teacher_table_overview"  >查看表格</a></li>
              <li class="now_li"><a class="a_sider a_now" href="../teacher_fill_online">填写表格</a></li>
              <li><a class="a_sider" href="../teacher-information.php">个人信息</a></li>
            </ul>
          </div>
          <div id="right-text">
                
              <!--此处应显示当前年份列表-->
              <?php
                 header("Content-type: text/html; charset:utf-8");                 
                   $con = mysql_connect("localhost","root","");
                   if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {
                      //$year = $_GET["year"];
                      mysql_select_db("teacher_class_system", $con);
                      mysql_query("SET NAMES UTF8");
                      $year=date("Y");
                      $sql="SELECT relativeTable,taskState FROM task_info WHERE year='$year'AND taskState=0";
                      $result=mysql_query($sql);
                      $count=0;
                      if(mysql_num_rows($result)>0)
                      while($row=mysql_fetch_array($result))
                      {
                          $count++;
                          switch ($row['relativeTable']) {
                            case strstr($row['relativeTable'],'tc_com_exc'):
                              $table_name_show='计算机卓越班报课表';
                              break;
                            case strstr($row['relativeTable'], 'tc_com_ope'):
                              $table_name_show='计算机实验班报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_com_nor'):
                              $table_name_show='计算机普通班报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_inf_sec'):
                              $table_name_show='信息安全报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_math_nor'):
                              $table_name_show='数学普通班报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_math_ope'):
                              $table_name_show='数学实验班报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_net_pro'):
                              $table_name_show='网络工程报课表';
                              break;
                            case strstr($row['relativeTable'],'tc_soft_pro'):
                              $table_name_show='软件工程报课表';
                              break;            
                            default:

                              break;
                          }
                          //echo $table_name_show;
                          $table_name1 = $row["relativeTable"];
                          //var_dump($table_name1);
                          //判断表格是否已经填写
                          $sql1="SELECT count(*)FROM $table_name1 WHERE workNumber='$work_number'";
                          //echo $sql1;
                          $result1 = mysql_query($sql1);
                          $row1=mysql_fetch_array($result1);
                          $sql2="SELECT teacherDeadline FROM task_info where relativeTable = '$table_name1'";
                          $result2 = mysql_query($sql2);
                          $row2=mysql_fetch_array($result2);
                          if($row1[0]==0)
                          {
                             //未填写
                            $yearTime=substr($row2[0], 0,4);
                            $monthTime=substr($row2[0], 4,2);
                            $dayTime=substr($row2[0], 6,2);
                          echo'<li class="list-group-item">
                          <span class="table_name">'.$table_name_show.'</span>'
                           .'<span class="table_time">
                           截止日期:'.$yearTime.'/'.$monthTime.'/'.$dayTime.'</span>'
                           .'<span class="table_download">
                          <a class="list-group-item-a" href="index.php?table_name='.$row['relativeTable'].'">'.'点击填写</a></span>';
                          }
                
                          //已经填写
                          else{
                            $yearTime=substr($row2[0], 0,4);
                            $monthTime=substr($row2[0], 4,2);
                            $dayTime=substr($row2[0], 6,2);
                            echo'<li class="list-group-item">
                          <span class="table_name">'.$table_name_show.'</span>'
                           .'<span class="table_time">
                           截止日期:'.$yearTime.'/'.$monthTime.'/'.$dayTime.'</span>'
                           .'<span class="table_complete">
                          已填写过</span>';
                          }
                          //echo $result1;
                          if($count==0)
                          {
                            echo "暂无今年报课表";
                          }
                      }
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
