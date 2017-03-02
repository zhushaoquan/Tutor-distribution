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
		if ($officer['avator'] == "") {
        	$officer['avatorIsEmpty'] = 1;
        }
        if ($officer['avator'] != "") {
        	$officer['avatorIsEmpty'] = 0;
        }
		
		$this->assign('user', $officer);
		return $this->fetch('index');
	}
    public function test() {
		
		$user = $this->auto_login();

        $this->assign('user',$user);
        return $this->fetch('head_manager');
	}
	public function student_assign($dep="",$to="",$grade=0)
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=7;
		$gg=DB::table('tc_grade')->field('grade')->select();
		$grade=$gg[0]['grade'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$grade=$_POST['grade'];
			$dep=$_POST['department'];
		}
	//	var_dump($dep);

		$data=Db::table('user_teacher t,user_student_'.$grade.' s,tc_result_'.$grade.' r')
		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->where('s.grade',$grade)
		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		->order('s.serialNum')->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade, 'to'=>$to)
				                                     	]);

		// $total=	count(Db::table('user_teacher t,user_student_'.$grade.' s,tc_result_'.$grade.' r')
		// 		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->where('s.grade',$grade)
		// 		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		// 		->order('s.serialNum')->select());
		// $totalPage = ceil($total/$pageSize);

		// var_dump($data);
		// exit;


	 	if($dep =='计算机实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','计算机系')->where('isExperial','=',1)->field('workNumber,name')->order('workNumber')->select();
	 		$dep ='计算机实验班';
	 	}
	 	else if($dep =='数学实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','应用数学系')->where('isExperial','=',1)->field('workNumber,name')->order('workNumber')->select();
	 		$dep ='数学实验班';
	 	}
	 	else 
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->order('workNumber')->select();
	
		// $pageBar = [
		// 	'total'     => $total,
		// 	'totalPage' => $totalPage+1,
		// 	'pageSize'  => $pageSize,
		// 	'curPage'   => $page
		// 	];
		$this->assign('gg',$gg);
		$this->assign('dep',$dep);
		// var_dump($grade);
		$this->assign('grade',$grade);
		// $this->assign($pageBar);
	 	$this->assign('teacher',$tealist);
	    
		$this->assign('user', $officer);	
		var_dump($_SERVER["REQUEST_METHOD"]);
		//exit;
		if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["stu"] == 'modify')
		{
			$page=$data->render();
			$this->assign('page',$page);
			$this->assign('data',$data->all());
			return $this->fetch('student_modify');
		}
		$this->assign('data',$data);
		if($to=="modify") return $this->fetch('student_modify');
		return $this->fetch('student_assign');
	}

	public function tutor_change($dep="应用数学系",$grade=0)
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=4;
		$gg=DB::table('tc_grade')->field('grade')->select();
		$grade=$gg[0]['grade'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$grade=$_POST['grade'];
			$dep=$_POST['department'];
		}
		$tea=Db::table('user_teacher t')->where('department',$dep)
		->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);

	//	var_dump($tea[0]);
		$page = $tea->render();
		//$tea = $tea->all();
		// exit;
		
		// $total=count(Db::table('user_teacher t')->where('department',$dep)
		// ->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		// $totalPage = ceil($total/$pageSize);
		$tea = $tea->all();
		$i=0;
		foreach($tea as $value)
		{
			$stu=Db::query("select s.serialNum snum,s.name sname from user_student_" .$grade." s,tc_result_".$grade. " r where  r.workNumber=?  and s.sid=r.sid ",[$value['tnum']]);
			$tea[$i]['tstudentL'] = $stu;
			$tea[$i]['lenth'] =count($stu);
			$i++;	
			//var_dump($tea[$i]['grade']);
		}

		// $pageBar = [
		// 	'total'     => $total,
		// 	'totalPage' => $totalPage+1,
		// 	'pageSize'  => $pageSize,
		// 	'curPage'   => $page
		// 	];
		$this->assign('page',$page);
		$this->assign('gg',$gg);
		$this->assign('dep',$dep);
		$this->assign('grade',$grade);
		// $this->assign($pageBar);
		$this->assign('data',$tea);
		$this->assign('user', $officer);
		return $this->fetch('tutor_change');
	}
	public function student_modify()
	{
		$gg=DB::table('tc_grade')->field('grade')->select();
		$grade=$gg[0]['grade'];
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		
		for($i=1;$i<=$_POST['count'];$i++)
		{
			$str="".$i;
			$str1="snum".$i;
		//	var_dump($str);
		//	var_dump($str1);
		//	var_dump($_POST[$str1]);
			$seri=DB::table('user_student_'.$grade)->where('serialNum',$_POST[$str1])->field('sid')->find();
		//	var_dump($seri['sid']);
			Db::table('tc_result_'.$grade)->where('sid',$seri['sid'])->setField('workNumber',$_POST[$str]);
		}
	//exit();
		$pageBar = [
			'total'     => 0,
			'totalPage' => 1,
			'pageSize'  => 7,
			'curPage'   => 1
			];
		$this->assign($pageBar);
		$dep="";

		$list=Db::table('user_teacher t,user_student_'.$grade.' s,tc_result_'.$grade.' r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate(8);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('gg',$gg);
	 	$this->assign('teacher',$tealist);
	    $this->assign('data',$data);	
		$this->assign('user', $officer);
		$this->success('修改成功','TeachingOfficeTutor/student_assign');
	}
	public function student_to_modify($dep="应用数学系",$grade=0)
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$pageSize=7;
		$page=1;
		$gg=DB::table('tc_grade')->field('grade')->select();
		$grade=$gg[0]['grade'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
		//	$grade=$_POST['grade'];
			$dep=$_POST['department'];
		}
		$data=Db::table('user_teacher t,user_student_' .$grade.' s,tc_result_'.$grade.' r')
		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		->order('s.serialNum')->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);

		$page = $data->render();

		// $total=	count(Db::table('user_teacher t,user_student_' .$grade.' s,tc_result_'.$grade.' r')
		// 		->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)
		// 		->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')
		// 		->order('s.serialNum')->select());
		// $totalPage = ceil($total/$pageSize);
	 	if($dep =='计算机实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','计算机系')->where('isExperial','=',1)->field('workNumber,name')->order('workNumber')->select();
	 		$dep ='计算机实验班';
	 	}
	 	else if($dep =='数学实验班')
	 	{
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=','应用数学系')->where('isExperial','=',1)->field('workNumber,name')->order('workNumber')->select();
	 		$dep ='数学实验班';
	 	}
	 	else 
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->order('workNumber')->select();
	
		// $pageBar = [
		// 	'total'     => $total,
		// 	'totalPage' => $totalPage+1,
		// 	'pageSize'  => $pageSize,
		// 	'curPage'   => $page
		// 	];
		$this->assign('dep',$dep);
		//$this->assign($pageBar);

		//$dep="";
		$list=Db::table('user_teacher t,user_student_'.$grade.' s,tc_result_'.$grade.' r')->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->field('t.workNumber as tnum,t.name as tname,s.serialNum as snum,s.name as sname,s.sid as sid')->order('s.serialNum')->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);
	   	$data=$list->toArray()['data'];	 
	   	$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	 	$this->assign('gg',$gg);
	 	$this->assign('dep',$dep);
	 	$this->assign('grade',$grade);
	 	$this->assign('teacher',$tealist);
	 	$this->assign('page', $page);
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
	//	return $_POST['grade'];
		$sid=Db::table('user_student_'.$_POST['grade'])->where('serialNum',$_POST['student_id'])->field('sid')->find();
		$flag1=Db::table('tc_result_'.$_POST['grade'])->where('sid',$sid['sid'])->where('workNumber',$_POST['teacher_id'])->delete();
		$flag2=Db::table('user_student_'.$_POST['grade'])->where('sid',$sid['sid'])->setField('chosen',0);
		if($flag1&&$flag2)return "success";
		return "fail";
	}
	public function insert()
	{

		$flag=1;
		foreach ($_POST['stus'] as $value) 
		{
	//		var_dump($value);
			$sid=Db::table('user_student_'.$_POST['grade'])->where('serialNum',$value)->field('sid')->find();
		//	$have=count(Db::table('tc_result')->where('sid',$sid)->select());
		//	if($have == 0)
		//	{
				$flag=Db::table('tc_result_'.$_POST['grade'])->insert(["sid" => $sid['sid'] , 'workNumber' => $_POST['teacher_id']]);
				if($flag == 0)$this->error('增加失败','TeachingOfficesTutor/tutor_assign');
		 		Db::table('user_student_'.$_POST['grade'])->where('serialNum',$value)->setField('chosen',1);
		 //	}
		}
		 // $flag1=Db::table('tc_result')->insert(["sid" => $_POST['student'] , 'workNumber' => $_POST['teacher']]);
		 // $flag2=Db::table('user_student')->where('sid',$_POST['student'])->setField('chosen',1);
		 $this->success('增加成功','TeachingOfficeTutor/tutor_assign');
		//$this->error('增加失败','TeachingOfficeTutor/tutor_assign');
	}

	public function select_student()
	{
	//	return json($_POST['grade']);
	//	exit();
	//	return $_POST['teacher_id'];
		$dep=DB::table('user_teacher')->where('workNumber',$_GET['teacher_id'])->field('department')->find();
	//	var_dump($dep);
	//	return json($dep);
		$ise=DB::table('user_teacher')->where('workNumber',$_GET['teacher_id'])->field('isExperial')->find();
		$data=DB::table('user_student_'.$_GET['grade'])->where('chosen',0)->where('department',$dep['department'])->field('name,serialNum')->order('serialNum')->select();
		if($ise==1)
		{
			$data1=DB::table('user_student_'.$_GET['grade'])->where('chosen',0)->where('department',"计算机实验班")->field('name,serialNum')->order('serialNum')->select();
			$data=array_merge($data,$data1);
		}
		else if($ise==2)
		{
			$data1=DB::table('user_student_'.$_GET['grade'])->where('chosen',0)->where('department',"数学实验班")->field('name,serialNum')->order('serialNum')->select();
			$data=array_merge($data,$data1);
		}
		else if($ise==3)
		{
			$data1=DB::table('user_student_'.$_GET['grade'])->where('chosen',0)->where('department',"计算机实验班")->field('name,serialNum')->order('serialNum')->select();
			$data=array_merge($data,$data1);
			$data1=DB::table('user_student_'.$_GET['grade'])->where('chosen',0)->where('department',"数学实验班")->field('name,serialNum')->order('serialNum')->select();
			$data=array_merge($data,$data1);
		}
		$d['result']= $data;
	//	var_dump($data);
		return json($d);
	}

	public function head_list()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$R1=DB::table('user_department_head')->where('department',"应用数学系")->field('workNumber,name')->find();
		$size=count($R1);
		$R1['size']=$size;
		$R2=DB::table('user_department_head')->where('department',"信息与计算科学系")->field('workNumber,name')->find();
		$size=count($R2);
		$R2['size']=$size;
		$R3=DB::table('user_department_head')->where('department',"计算机系")->field('workNumber,name')->find();
		$size=count($R3);
		$R3['size']=$size;
		$R4=DB::table('user_department_head')->where('department',"信息安全与网络系")->field('workNumber,name')->find();
		$size=count($R4);
		$R4['size']=$size;
		$R5=DB::table('user_department_head')->where('department',"软件工程系")->field('workNumber,name')->find();
		$size=count($R5);
		$R5['size']=$size;
		$R6=DB::table('user_department_head')->where('department',"计算机实验班")->field('workNumber,name')->find();
		$size=count($R6);
		$R6['size']=$size;
		$R7=DB::table('user_department_head')->where('department',"数学实验班")->field('workNumber,name')->find();
		$size=count($R7);
		$R7['size']=$size;

		$this->assign('R1',$R1);
		$this->assign('R2',$R2);
		$this->assign('R3',$R3);
		$this->assign('R4',$R4);
		$this->assign('R5',$R5);
		$this->assign('R6',$R6);
		$this->assign('R7',$R7);
		$this->assign('user', $officer);
		return $this->fetch('head_list');
	}

	public function to_head_manager()
	{
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		$R1=DB::table('user_department_head')->where('department',"应用数学系")->field('workNumber,name')->find();
		$size1=count($R1);
		$R2=DB::table('user_department_head')->where('department',"信息与计算科学系")->field('workNumber,name')->find();
		$size2=count($R2);
		$R3=DB::table('user_department_head')->where('department',"计算机系")->field('workNumber,name')->find();
		$size3=count($R3);
		$R4=DB::table('user_department_head')->where('department',"信息安全与网络系")->field('workNumber,name')->find();
		$size4=count($R4);
		$R5=DB::table('user_department_head')->where('department',"软件工程系")->field('workNumber,name')->find();
		$size5=count($R5);
		$R6=DB::table('user_department_head')->where('department',"计算机实验班")->field('workNumber,name')->find();
		$size6=count($R6);
		$R7=DB::table('user_department_head')->where('department',"数学实验班")->field('workNumber,name')->find();
		$size7=count($R7);

		$this->assign('R1',$R1);
		$this->assign('R2',$R2);
		$this->assign('R3',$R3);
		$this->assign('R4',$R4);
		$this->assign('R5',$R5);
		$this->assign('R6',$R6);
		$this->assign('R7',$R7);
		$this->assign('size1',$size1);
		$this->assign('size2',$size2);
		$this->assign('size3',$size3);
		$this->assign('size4',$size4);
		$this->assign('size5',$size5);
		$this->assign('size6',$size6);
		$this->assign('size7',$size7);
		$this->assign('user', $officer);
		return $this->fetch('head_manager');
	}

	public function select_tutor()
	{
		$where['name']=array('like','%'.$_GET['headname'].'%');

		if($_GET['department']=='计算机实验班')
		{
			$result['result']=DB::table('user_teacher')->where($where)->where('isExperial',1)->whereor('isExperial',3)->field('workNumber,name')->select();
		}
		else if($_GET['department']=='数学实验班')
		{
			$result['result']=DB::table('user_teacher')->where($where)->where('isExperial',2)->whereor('isExperial',3)->field('workNumber,name')->select();
		
		}
		else
		{
			$result['result']=DB::table('user_teacher')->where($where)->where('department',$_GET['department'])->field('workNumber,name')->select();
		}
		//	$result['result']['department']=$_GET['department'];
		// foreach ($result['result'] as $value) 
		// {
		// 	$value['department']=$_GET['department'];
		// }
		$result['department']=$_GET['department'];
		//var_dump($result);
		return json($result);
	}

	public function add_head()
	{
		$tea=DB::table('user_teacher')->where('workNumber',$_GET['workNumber'])->find();
		DB::table('user_department_head')->where('workNumber',$_GET['workNumber'])->delete();
		$data=array('name' => $tea['name'],
			'password' => $tea['password'],
			'workNumber' => $tea['workNumber'],
			'sex' => $tea['sex'],
			'birthday' => $tea['birthday'],
			'telephone' => $tea['telephone'],
			'email' => $tea['email'],
			'avator' => $tea['avator'],
			'department' => $_GET['department']
			);
		// var_dump($data);
		
		DB::table('user_department_head')->where('department',$_GET['department'])->delete();
		$flag=DB::table('user_department_head')->insert($data);
		if($flag)return "1";
		else return "0";
	}
	public function up()
	{
		DB::table('user_student_2014')->where('department',"信息安全与网络工程系")->setField('department',"信息安全与网络系");
	}
	public function modify() {
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();

		if ($officer['avator'] == "") {
        	$officer['avatorIsEmpty'] = 1;
        }
        if ($officer['avator'] != "") {
        	$officer['avatorIsEmpty'] = 0;
        }
        $this->assign('user', $officer);
		return $this->fetch('modify');
	}

	public function saveModify() {
		$user = $this->auto_login();
		$where['workNumber'] = $user['workNumber'];
		$request = Request::instance();

		//获取上传的头像的信息
		$avator = request()->file('avator');
		if ($avator != "") {
			$avatorInfo = $avator->move('../uploads/teachingOfficer');
			if ($avatorInfo) {
				$temp['ava'] = explode("..", $avatorInfo->getPathName());
				$data['avator'] = $temp['ava'][1];
			}
		}
		if ($request->isPost()) {
			$password = $request->post('newPasswordConfirm');
			if ($password == "") {
				$data['password'] = $request->post('oldPassword');
			} else {
				$data['password'] = $request->post('newPasswordConfirm');
			}

			$data['telephone'] = $request->post('telephone');
			$data['email'] = $request->post('email');

			if (Db::table('user_teaching_office')->where($where)->update($data)) {
				$this->success("信息修改成功!",url('index'));
			} else {
				$this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
			}
		}
	}



	public function oldPasswordConfirm() {
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();

        $request = Request::instance();
        if ($request->isPost()) {
            $oldPassword = $request->post();
            if ($oldPassword['oldPW'] != $officer['password']) {
                $data = false;
            }
            if ($oldPassword['oldPW'] == $officer['password']) {
                $data = true;
            }
        return json($data);
        }
	}

}