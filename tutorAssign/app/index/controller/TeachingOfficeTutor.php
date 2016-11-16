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
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$page_size=5;
		$off_set=0;
		$dep="计算机系";
		if($_SERVER["REQUEST_METHOD"] == "POST")$dep=$_POST['department'];
		$list=Db::table('user_teacher t,tc_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 	
	 	if($dep='计算机实验班')
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','计算机系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 	else if($dep='数学实验班')
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','应用数学系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 	else $tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);
		$this->assign('user', $officer);
		var_dump($_SERVER["REQUEST_URI"]);
		if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["stu"] == 'modify')
			return $this->fetch('student_modify');
		return $this->fetch('student_assign');
	}
	public function tutor_assign()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$page_size=5;
		$off_set=0;
		$list=Db::table('user_teacher t,tc_result r')->where('t.workNumber = r.workNumber')->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate(4);
		$tea=$list->toArray()['data'];
		$i=0;
		foreach($tea as $value)
		{
			
			$stu=Db::query("select s.serialNum snum,s.name sname from tc_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
			$i++;	
		}
		$this->assign('data',$tea);
		$this->assign('user', $officer);
		return $this->fetch('tutor_assign');
	}
	public function student_to_modify()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$dep="计算机系";
		$list=Db::table('user_teacher t,tc_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
		$this->assign('user', $officer);
		return $this->fetch('student_modify');
	}
	public function student_modify()
	{
		$user = $this->auto_login();

		for($i=1;$i<=8;$i++)
		{
			$str="stu".$i;
			$str2="".$i;
			Db::table('tc_result')->where('sid','=',$_POST[$str])->setField('workNumber' , $_POST[$str2]);
		}

		$dep="计算机系";
		$list=Db::table('user_teacher t,tc_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$this->assign('user', $officer);
		return $this->fetch('student_assign');		
	}
	public function tutor_change()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$this->assign('user', $officer);
		return $this->fetch('tutor_change');
	}
	public function export()
	{

	}
	public function confirm()
	{
		
	}
}