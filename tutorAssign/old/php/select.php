<?php 
	header('Content-type: application/json');
	$select_level = $_POST["select_level"];

	if($select_level=="second")
		$select_key = $_POST["first_key"];
	if($select_level=="third")
		$select_key = $_POST["second_key"];

	

	if($select_level=="first"){
		$first_select = array("success"=>"true","data"=>array("0"=>array("name"=>"请选择学年","value"=>""),"1"=>array("name"=>"2016","value"=>"2016"),"2"=>array("name"=>"2017","value"=>"2017")));
		$first_select = json_encode($first_select);
		echo $first_select;
	}
	else if($select_level=="second"){
		$second_select = array("success"=>"true","data"=>array("0"=>array("name"=>"请选择学年","value"=>""),"1"=>array("name"=>"2016","value"=>"2016"),"2"=>array("name"=>"2017","value"=>"2017")));
		$second_select = json_encode($second_select);
		echo $second_select;
	}
	else if($select_level=="third"){
		$third_select = array("success"=>"true","data"=>array("0"=>array("name"=>"请选择学年","value"=>""),"1"=>array("name"=>"2016","value"=>"2016"),"2"=>array("name"=>"2017","value"=>"2017")));
		$third_select = json_encode($third_select);
		echo $third_select;

	}
	
 ?>