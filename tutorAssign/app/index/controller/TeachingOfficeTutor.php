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
		$dep="";
		if($_SERVER["REQUEST_METHOD"] == "POST")$dep=$_POST['department'];
	//	var_dump($dep);
	  //  $list=Db::query("select t.workNumber tnum,t.name tname,s.serialNum snum,s.name sname from user_teacher t,tc_student s,tc_result r where t.workNumber=r.workNumber and s.sid=r.sid");
		$list=Db::table('user_teacher t,tc_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];
	 //  	var_dump($data);

	    $this->assign('data',$data);
		$this->assign('user', $officer);
		return $this->fetch('student_assign');
	}
	public function tutor_assign()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$page_size=5;
		$off_set=0;
	//	$tea=Db::query('select distinct t.workNumber tnum,t.name tname from user_teacher t,tc_result r where t.workNumber=r.workNumber');
		$list=Db::table('user_teacher t,tc_result r')->where('t.workNumber = r.workNumber')->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate(4);
		//$tea=Db::table('user_teacher')->join('LEFT JOIN tc_result ON user_teacher.workNumber = tc_result.workNumber')->field('user_teacher.workNumber as tnum,user_teacher.name as tname')->select();
		$tea=$list->toArray()['data'];
	//	var_dump($tea);
	//	echo "<br>";
		$i=0;
		foreach($tea as $value)
		{
			
			$stu=Db::query("select s.serialNum snum,s.name sname from tc_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
		//	echo "string";
			$i++;	
		}
		$this->assign('data',$tea);
		$this->assign('user', $officer);
		return $this->fetch('tutor_assign');
	}
	public function student_change()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$this->assign('user', $officer);
		return $this->fetch('student_change');
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