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

	public function student_assign($page=1,$dep="",$to="")
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=8;

		if($_SERVER["REQUEST_METHOD"] == "POST")$dep=$_POST['department'];
		var_dump($dep);
		$data=Db::table('user_teacher t,user_student s,tc_result r')
		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		->order('s.serialNum')->page($page,$pageSize)->select();

		$total=	count(Db::table('user_teacher t,user_student s,tc_result r')
				->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
				->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
				->order('s.serialNum')->select());
		$totalPage = ceil($total/$pageSize);

	 	if($dep =='计算机实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','计算机系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 		$dep ='计算机实验班';
	 	}
	 	else if($dep =='数学实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','应用数学系')->where('isExperial','=',1)->field('workNumber,name')->select();
	 		$dep ='数学实验班';
	 	}
	 	else $tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	
		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $pageSize,
			'curPage'   => $page
			];
		$this->assign('dep',$dep);
		$this->assign($pageBar);
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);
		$this->assign('user', $officer);	
		if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["stu"] == 'modify')
			return $this->fetch('student_modify');
		if($to=="modify") return $this->fetch('student_modify');
		return $this->fetch('student_assign');
	}

	public function tutor_change($page=1)
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=4;
		$tea=Db::table('user_teacher t')
		->field('t.workNumber as tnum,t.name as tname')->distinct(true)->page($page,$pageSize)->select();
		
		$total=count(Db::table('user_teacher t')
		->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		$totalPage = ceil($total/$pageSize);
		$i=0;
		foreach($tea as $value)
		{
			$stu=Db::query("select s.serialNum snum,s.name sname from user_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
			$tea[$i]['lenth'] =count($stu);
			$i++;	
		}

		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $pageSize,
			'curPage'   => $page
			];

		$this->assign($pageBar);
		$this->assign('data',$tea);
		$this->assign('user', $officer);
		return $this->fetch('tutor_change');
	}
	public function student_modify()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		
		for($i=1;$i<=$_POST['count'];$i++)
		{
			$str="".$i;
			$str1="snum".$i;
			Db::table('tc_result')->where('sid',$_POST[$str1])->setField('workNumber',$_POST[$str]);
		}
		$pageBar = [
			'total'     => 0,
			'totalPage' => 1,
			'pageSize'  => 8,
			'curPage'   => 1
			];
		$this->assign($pageBar);
		$dep="";
		$list=Db::table('user_teacher t,user_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
		$this->assign('user', $officer);
		$this->success('修改成功','TeachingOfficeTutor/student_assign');
	}
	public function student_to_modify()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageBar = [
			'total'     => 0,
			'totalPage' => 1,
			'pageSize'  => 8,
			'curPage'   => 1
			];
		$this->assign($pageBar);
		$dep="";
		$list=Db::table('user_teacher t,user_student s,tc_result r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('dep',$dep);
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
		$this->assign('user', $officer);
		return $this->fetch('student_modify');
	}
/*	public function tutor_to_change()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=4;
		$page=1;
		$tea=Db::table('user_teacher t,tc_result r')->where('t.workNumber = r.workNumber')
		->field('t.workNumber as tnum,t.name as tname')->distinct(true)->page($page,$pageSize)->select();	
		$total=count(Db::table('user_teacher t,tc_result r')->where('t.workNumber = r.workNumber')
			->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		$totalPage = ceil($total/$pageSize);
		$i=0;
		foreach($tea as $value)
		{
			$stu=Db::query("select s.serialNum snum,s.name sname from user_student s,tc_result r where  r.workNumber=?  and s.sid=r.sid",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
			$i++;	
		}

		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $pageSize,
			'curPage'   => $page
			];
		$this->assign($pageBar);
		$this->assign('data',$tea);
		$this->assign('user', $officer);
		return $this->fetch('tutor_change');
	} */
    public function delete()
    {
        $sid=Db::table('user_student')->where('serialNum',$_POST['student_id'])->field('sid')->find();
        $flag1=Db::table('tc_result')->where('sid',$sid['sid'])->where('workNumber',$_POST['teacher_id'])->delete();
        $flag2=Db::table('user_student')->where('sid',$sid['sid'])->setField('chosen',0);
        if($flag1&&$flag2)return "success";
        return "fail";
    }
	public function insert()
	{

		$flag=1;
		foreach ($_POST['stus'] as $value) 
		{
	//		var_dump($value);
			$sid=Db::table('user_student')->where('serialNum',$value)->field('sid')->find();
		//	$have=count(Db::table('tc_result')->where('sid',$sid)->select());
		//	if($have == 0)
		//	{
				$flag=Db::table('tc_result')->insert(["sid" => $sid['sid'] , 'workNumber' => $_POST['teacher_id']]);
				if($flag == 0)return "fail";
		 		Db::table('user_student')->where('serialNum',$value)->setField('chosen',1);
		 //	}
		}
		 // $flag1=Db::table('tc_result')->insert(["sid" => $_POST['student'] , 'workNumber' => $_POST['teacher']]);
		 // $flag2=Db::table('user_student')->where('sid',$_POST['student'])->setField('chosen',1);
		 return "success";
		//$this->error('增加失败','TeachingOfficeTutor/tutor_assign');
	}

	public function select_student()
	{
		$data=DB::table('user_student')->where('chosen',0)->field('name,serialNum')->select();
		$d['result']= $data;
		return json($d);
	}

}
