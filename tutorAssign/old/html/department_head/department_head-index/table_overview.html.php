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
  <script type="text/javascript" src="../../../js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="../../../js/jquery.jeditable.mini.js"></script>
  <script type='text/javascript' src='../../../js/jquery-ui.min.js'></script>
  <script type="text/javascript">
$(function(){
   $('.edit').editable('../../../php/save.php', { 
     width     :400,
     height    :18,
     //onblur    : "ignore",
         cancel    : '取消',
         submit    : '确定',
         
         tooltip   : '单击可以编辑...',
     callback  : function(value, settings) {
       $("#modifiedtime").html("刚刚");
         }

     });
});
//调用jquery ui的datepicker日历插件
$.editable.addInputType('datepicker', {
    element : function(settings, original) {
        var input = $('<input class="input" />');
    input.attr("readonly","readonly");
        $(this).append(input);
        return(input);
    },
    plugin : function(settings, original) {
    var form = this;
    $("input",this).datepicker();
    }
});
</script>
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
            <?php
                  header("Content-type: text/html; charset:utf-8");                 
                  $con = mysql_connect("localhost","root","");
                  if (!$con)
                  {
                         die('Could not connect: ' . mysql_error());
                  }
                  else
                  {
                      $year = $_GET["year"];
                      $table_name = $_GET["table_name"];
                     // session_start();
                      mysql_select_db("teacher_class_system", $con);
                      mysql_query("SET NAMES UTF8");
                      //$year=date("Y");

                      $sql1="SELECT taskState FROM task_info WHERE relativeTable='$table_name'";
                      $result1 = mysql_query($sql1);
                       if(mysql_num_rows($result1)>0)
                      {
                        $row1 = mysql_fetch_array($result1);
                        $table_name = 'cb_'.$table_name;
                        $_SESSION["table_name"][0]= $table_name;
                      }
                      $sql = "SELECT * FROM $table_name";
                      $result = mysql_query($sql);
              if($row1[0]==0)
                echo " <p class='remind'>提示：教师报课截止日期未过，暂不可编辑。</p>";
              else if ($row1[0]==1)
                echo " <p class='remind'>提示：教师报课截止日期已过，任课教师列和备注列可单击进行编辑。</p>";
              else
                echo " <p class='remind'>提示：审核截止日期已过，不可编辑。</p>";

            ?>
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
                <table class="table_gen" border="1">
              <?php
                 
                      if($row1[0]==1){
                          while($row = mysql_fetch_array($result))
                          {

                              echo"<tr><td>".$row['grade'];     
                              echo"<td>".$row['major']."</td>";
                              echo"<td>".$row['people']."</td>";
                              echo"<td>".$row['courseName']."</td>";
                              echo"<td>".$row['courseType']."</td>";
                              echo"<td>".$row['courseCredit']."</td>";
                              echo"<td>".$row['courseHour']."</td>";
                              echo"<td>".$row['practiceHour']."</td>";
                              echo"<td>".$row['onMachineHour']."</td>";
                              echo"<td>".$row['timePeriod']."</td>";
                              if(preg_match("/[1-9]/",$row['grade']) && !strstr($row['grade'],"年")){
                                echo"<td class='edit' id='".$row['insertTime']."#"."teacherName'>".$row['teacherName']."</td>";
                                echo"<td class='edit' id='".$row['insertTime']."#"."remark'>".$row['remark']."</td>";
                              } else {
                                echo"<td>".$row['teacherName']."</td>";
                                echo"<td>".$row['remark']."</td>";
                              }
                        
                              echo"</td></tr>";
                            
                          }
                        }
                        else{
                          while($row = mysql_fetch_array($result))
                          {

                              echo"<tr><td>".$row['grade'];     
                              echo"<td>".$row['major']."</td>";
                              echo"<td>".$row['people']."</td>";
                              echo"<td>".$row['courseName']."</td>";
                              echo"<td>".$row['courseType']."</td>";
                              echo"<td>".$row['courseCredit']."</td>";
                              echo"<td>".$row['courseHour']."</td>";
                              echo"<td>".$row['practiceHour']."</td>";
                              echo"<td>".$row['onMachineHour']."</td>";
                              echo"<td>".$row['timePeriod']."</td>";
                              echo"<td>".$row['teacherName']."</td>";
                              echo"<td>".$row['remark']."</td>";
                              echo"</td></tr>";
                            
                          }
                        }
                      
                      
                      
                  }
              ?>
            </table>
             <?php
            echo'<form action="../../../php/file_export.php" method="post">
            <input type="hidden" name="table_name" value = "'.$table_name.'">
            <input type="submit"  class="btn-success btn-submit-export" value="导出为excel">
             </form>
            ';
                                 ?>
            <div>
        </div>
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
