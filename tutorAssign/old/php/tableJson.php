<?php 
	header('Content-type: application/json');
	$paras_limit=$_GET["limit"];
	$paras_offset=$_GET["offset"];
	//$paras_search=$_GET["search"];
	
	
	$data =array("total" => 14, "rows"=>array("0"=>array("Name"=>"M","Age"=>"15"),"1"=>array("Name"=>"M","Age"=>"16"),"2"=>array("Name"=>"M","Age"=>"16"),"3"=>array("Name"=>"M","Age"=>"16"),"4"=>array("Name"=>"M","Age"=>"16"),"5"=>array("Name"=>"M","Age"=>"16"),"6"=>array("Name"=>"M","Age"=>"16"),"7"=>array("Name"=>"M","Age"=>"16"),"8"=>array("Name"=>"M","Age"=>"16"),"9"=>array("Name"=>"M","Age"=>"16")));
	$result = array("0"=>array("Name"=>"M","age"=>"14"),"1"=>array("name"=>"M","age"=>"14"));
	 echo json_encode($data);
 ?>