<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeachingOfficeTutor extends BaseController {
	
	public function index() 
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		
		$this->assign('user', $officer);
		return $this->fetch('index');
	}
	public function student_assign()
	{
		$user = $this->auto_login();
		$page_size=5;
		$off_set=0;
		$dep="";
	  $list=Db::query("select t.workNumber tnum,t.name tname,s.serialNum snum,s.name sname from user_teacher t,tc_student s,tc_result r where t.workNumber=r.workNumber and s.sid=r.sid");
		var_dump($list);
		exit();
		return $this->fetch('student_assign');
	}
	public function tutor_assign()
	{
		$user = $this->auto_login();
		$page_size=5;
		$off_set=0;
		$tea=Db::query('select distinct t.workNumber tnum,t.name tname from user_teacher t,tc_result r where t.workNumber=r.workNumber');
		//Db::table('user_teacher t,tc_result r')->field('t.workNumber tnum,t.name tname')->where('t.workNumber','r.workNumber')->select();
	//	$len=count($tea);
	//	var_dump($len);
		$i=0;
		foreach($tea as $value)
		{
			
			$stu=Db::query("select s.serialNum snum,s.name sname from tc_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
			$i++;
		//	echo "<br />".$value['tnum']."<br />";
		//	var_dump($stu);
		}
		var_dump($tea);
			echo  "<br>";
		//   $list=Db::query("select t.workNumber tnum,t.name tname,s.serialNum snum,s.name sname from user_teacher t,tc_student s,tc_result r where t.workNumber=r.workNumber and s.sid=r.sid");
		
		// var_dump($result);
		// exit();
		return $this->fetch('tutor_assign');
	}
	public function change()
	{

	}

	public function export()
	{

	}
	public function confirm()
	{
		
	}
}