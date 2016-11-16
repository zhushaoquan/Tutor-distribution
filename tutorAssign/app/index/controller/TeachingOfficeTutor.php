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

	public function student_assign($page=1)
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=8;

		$dep="";
		if($_SERVER["REQUEST_METHOD"] == "POST")$dep=$_POST['department'];

		$data=Db::table('user_teacher t,user_student s,tc_result r')
		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		->order('s.serialNum')->page($page,$pageSize)->select();

		$total=	count(Db::table('user_teacher t,user_student s,tc_result r')
				->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
				->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
				->order('s.serialNum')->select());
		$totalPage = ceil($total/$pageSize);

	 	if($dep='计算机实验班')
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','计算机系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 	else if($dep='数学实验班')
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','应用数学系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 	else $tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	
		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $pageSize,
			'curPage'   => $page
			];

		$this->assign($pageBar);
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);
		$this->assign('user', $officer);		
		// if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["stu"] == 'modify')
		// 	return $this->fetch('student_modify');
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
			$stu=Db::query("select s.serialNum snum,s.name sname from user_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
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

		$dep="计算机系";
		$list=Db::table('user_teacher t,user_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
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
	public function delete()
	{
		$flag1=Db::table('tc_result')->where('sid',$_POST['student'])->where('workNumber',$_POST['teacher'])->delete();
		$flag2=Db::table('user_student')->where('sid',$_POST['student'])->setField('chosen',0);
		if($flag1==1 && $flag2==1)$this->success('删除成功','TeachingOfficeTutor/tutor_assign');
		$this->error('删除失败','TeachingOfficeTutor/tutor_assign');
	}
	public function insert()
	{
		$flag1=Db::table('tc_result')->insert(["sid" => $_POST['student'] , 'workNumber' => $_POST['teacher']]);
		$flag2=Db::table('user_student')->where('sid',$_POST['student'])->setField('chosen',1);
		if($flag1==1 && $flag2==1)$this->success('增加成功','TeachingOfficeTutor/tutor_assign');
		$this->error('增加失败','TeachingOfficeTutor/tutor_assign');
	}

	public function select_student()
	{
		$data=DB::table('user_student')->where('chosen',0)->field('name,serialNum')->select();
		$d['result']= $data;
		return json($d);
	}
	public function test()
	{
		$lists=Db::table('user_student')->paginate(5);
		$page=$lists->render();
		$this->assign('lists',$lists);
		$this->assign('page',$page);
		return $this->fetch('test');
	}
}