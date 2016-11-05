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
                   $currentyear= date('Y',time());
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
               //  if(!isset($name)||empty($name))
               //  {  
               //    header("Location:../../index.php");        
               //    //jump_success("请重新登录", '../../index.php');
               //  }  
               // echo $name;
                   ?> 
            </span>教学办</p>
          <span class='remind6'>提示一:“同一年份、同一学期、同专业“的报课表只能有一份，</span><span class='remind3'>重复上传会覆盖原课表！</span><span class='remind4'>若原报课表</span><span class='remind3'>已有教师报课，将丢失数据</span><span class='remind5'>！</span>
          </div>
          <div id="status2">
          
          </div>
        </div>
        <div id="main-content">
          <div id="sider">
            <ul>
              <li class="now_li"><a class="a_sider a_now" href="teaching_office-index.php"  >上传表格</a></li>
              <li><a class="a_sider" href="teaching_office_table_overview">报课情况</a></li>  
              <li><a class="a_sider" href="teaching_office_manager-teacher.php">管理教师</a></li>
              <li><a class="a_sider" href="teaching_office-information.php">个人信息</a></li>
            </ul>
          </div>
          <div id="right-text">
          <span class='remind6'>提示二:若上传时，使用</span><span class='remind3'>Excel2003及以上版本或WPS</span><span class='remind4'>的表格，请把文件</span><span class='remind3'>另存为.xls后缀的文件</span><span class='remind5'>再上传！</span>
          <div class="table_input_area">
           <form  method="post"  action="../../php/file_input.php"   enctype="multipart/form-data">
            <div class="term_select">
            <label>选择学年</label>
              <select name ="year">
                <?php
                echo'
                <option value ="'.$currentyear.'">'.$currentyear.'</option>';
                $currentyear++;
                 echo'
                <option value ="'.$currentyear.'">'.$currentyear.'</option>';
                $currentyear++;
                  echo'
                <option value ="'.$currentyear.'">'.$currentyear.'</option>';
                ?>
              </select>
              <label>报课截止日期<label>
              <input type="text" name="teacherDeadline"  placeholder="格式:20140101" >
            </div>
            </br>
            <div class="date_select">
              <label>选择学期</label>
               <select name ="semester">
                <option value ="01">01</option>
                <option value ="02">02</option>
                <option value ="03">03</option>
                <option value ="04">04</option>
                <option value ="05">05</option>
              </select>
              <label>审核截止日期</label>
                <input type="text" name="departmentDeadline"  placeholder="格式:20140101" >  
             </div>  

               <input type="file" name="testFile" >
               </br> </br> </br> 
              <label>选择对应专业：<label></br></br>
                 <input type="radio" name="file_input" value="tc_soft_pro"  checked="checked" />软件工程
               </br> </br>
                 <input type="radio" name="file_input" value="tc_com_nor" />计算机专业
                </br> </br> 
                 <input type="radio" name="file_input" value="tc_com_ope" />计算机（实验班）
                </br> </br>
                <input type="radio" name="file_input" value="tc_com_exc" />计算机（卓越班）
                </br> </br> 
                 <input type="radio" name="file_input" value="tc_net_pro" />网络工程专业
                </br> </br>
                <input type="radio" name="file_input" value="tc_math_nor" />数学专业
                </br> </br> 
                 <input type="radio" name="file_input" value="tc_math_ope" />数学类（实验班）
                </br> </br>
                 <input type="radio" name="file_input" value="tc_inf_sec" />信息安全专业
                </br> </br>
       
               <button  type="initial" class="btn-initial ">确认提交</button>
          </form>
        </div>
         
            <div>
        </div>
 </div>
  <div id ="footer">
    <p>Designed by Code.R</p>
  </div>
 </body>
</html>
