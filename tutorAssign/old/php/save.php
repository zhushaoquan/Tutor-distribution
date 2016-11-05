<?php
	
     session_start();
     $table_name = $_SESSION["table_name"][0];
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
    	    $field=$_POST['id'];
    	    if(!empty($field))//分割字符串
    	    {
    	    	$divid_field = explode('#',$field,2);
    	    	$insertTime = $divid_field[0];
    	    	$fieldname = $divid_field[1];
    	    	//echo $divid_field[0]."</br>".$divid_field[1]."</br>";
    	    	//var_dump($divid_field);
    	    }
    	   // echo $field;
    	    $val=$_POST['value'];
    	    //echo $val;
			
		
			if($field=="note"){
				if(strlen($val)>100){
					echo "您输入的字符大于100字了";
					exit;
				}
			}
			$time=date("Y-m-d H:i:s");
			if(empty($val)){
		   		 
			}else{
				$sql="UPDATE $table_name SET $fieldname = '$val' WHERE insertTime = $insertTime";
				$result=mysql_query($sql);
			if($result){
			   echo $val;

			}else{
			    echo "数据错误";	
			}
}
     }

?>