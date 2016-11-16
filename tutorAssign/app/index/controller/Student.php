<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class Student extends BaseController {

	public function index() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        if ($user['chosen'] == 0) {
        	$student['chosen'] = '否';
        } else {
        	$student['chosen'] = '是';
        }
        $this->assign('user', $student);
		return $this->fetch('index');
	}

	

	public function modify() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        if ($user['chosen'] == 0) {
        	$student['chosen'] = '否';
        } else {
        	$student['chosen'] = '是';
        }
        $this->assign('user', $student);
		return $this->fetch('modify');
	}

	public function tutor_list() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //
        $tutors = Db::table('user_teacher')->where('department',$student['department'])->select();


        $res = Db::table('tc_voluntaryinfoSetting')->find();
        $res['nowtime'] = time();
        $data['message'] = '';
        $data['firstStart'] = $res['firstStart'];
        $data['secondStart'] = $res['secondStart'];
        $data['firstEnd'] = $res['firstEnd'];
        $data['secondEnd'] = $res['secondEnd'];
        if($res['nowtime'] < $res['firstEnd'] && $res['nowtime'] > $res['firstStart']) {
            $data['message'] = "当前为第一轮的志愿填报时间：".date('Y-m-d',$res['firstStart'])."至".date('Y-m-d',$res['firstEnd']).",请同学们按时填报、修改志愿！";
         } else if($res['nowtime'] < $res['secondEnd'] && $res['nowtime'] > $res['secondStart']) {
         	$data['message'] = "当前为第二轮的志愿填报时间：".date('Y-m-d',$res['secondStart'])."至".date('Y-m-d',$res['secondEnd']).",请同学们按时填报、修改志愿！";

         } else {
            $data['message'] = "当前不在填报志愿时间段内！";
         }


        $this->assign('message', $data['message']);
        $this->assign('tutors', $tutors);
        $this->assign('user', $user);
		return $this->fetch('tutor_list');
	}

	public function tutor_detail() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //
        $tutors = Db::table('user_teacher')->where('department',$student['department'])->select();

        $this->assign('tutors', $tutors);
        $this->assign('user', $user);
		return $this->fetch('tutor_list');

	}

	public function edit_voluntary() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //
        $tutors = Db::table('user_teacher')->where('department',$student['department'])->select();
        $res = Db::table('tc_voluntaryinfoSetting')->find();
        $res['nowtime'] = time();
        $data['message'] = '';
        $data['ontime']=1;
        $data['firstStart'] = $res['firstStart'];
        $data['secondStart'] = $res['secondStart'];
        $data['firstEnd'] = $res['firstEnd'];
        $data['secondEnd'] = $res['secondEnd'];

        if($res['nowtime'] < $res['firstEnd'] && $res['nowtime'] > $res['firstStart']) {
            $data['message'] = "当前为第一轮的志愿填报时间：".date('Y-m-d',$res['firstStart'])."至".date('Y-m-d',$res['firstEnd']).",请同学们按时填报、修改志愿！";
         } else if($res['nowtime'] < $res['secondEnd'] && $res['nowtime'] > $res['secondStart']) {
         	$data['message'] = "当前为第二轮的志愿填报时间：".date('Y-m-d',$res['secondStart'])."至".date('Y-m-d',$res['secondEnd']).",请同学们按时填报、修改志愿！";

         } else {
            $data['message'] = "当前不在填报志愿时间段内！";
            $data['ontime'] = 0;
         }
        $this->assign('tutors', $tutors);
        $this->assign('user', $user);
		$request = Request::instance();
        if ($request->isPost()) {
        	$data1['sid'] = $user['sid'];
            $data1['wishFirst'] = $request->post('wishFirst', '');
            $data1['wishSecond'] = $request->post('wishSecond', '');
            $data1['wishThird'] = $request->post('wishThird', '');
            $data1['wishForth'] = $request->post('wishForth', '');
            $data1['wishFifth'] = $request->post('wishFifth', '');  
            $result = Db::table('tc_voluntary')->where('sid', $user['sid'])->find();
	        if($result==NULL) {
	        	Db::table('tc_voluntary')->insert($data1);
	        } else {
	        	$data1['vid'] = $result['vid'];
	        	DB::table('tc_voluntary')->update($data1);
	        }


	        //给个提示！！


        }
		return $this->fetch('edit_voluntary',$data);
        
	}


	public function show_result() {
		$user = $this->auto_login();
		$result = Db::table('tc_result')->where('sid',$user['sid'])->find();
		$this->assign('user',$user);

		if($result != NULL) {
			$teacher = Db::table('user_teacher')->where('workNumber', $result['workNumber'])->find();
		    $sids = Db::table('tc_result')->where("sid!=".$user['sid']." and "."workNumber=".$teacher['workNumber'])->select();
		    if($sids != NULL) {
		    	 $students = array();
			     $i = 0;
			     foreach ($sids as $key => $value) {
			    	$stuinfo = Db::table('user_student')->where('sid',$value['sid'])->find();    	
			    	$students[$i] = $stuinfo;
			    	$i++;
		    	 }
		    } else {
		    	$students = NULL;
		    }
			$this->assign('voluntory_teacher',$teacher);
			$this->assign('voluntory_students',$students);
			$this->assign('message',"志愿结果已出，请及时查看");

		} else {
			$this->assign('message',"志愿结果未出，请耐心等待!");

		}
		return $this->fetch('show_result');
	}

	public function matchSetting($page=1) {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$student = Db::table('user_student')->where('chosen',0)->page($page,$this->pageSize)->select();

		$total = count(Db::table('user_student')->where('chosen',0)->select());
		$totalPage = ceil($total/$this->pageSize);

		for ($i=0; $i <count($student) ; $i++) { 
			$voluntary[$i] = Db::table('tc_voluntary')->where('sid',$student[$i]['sid'])->find();
			$voluntary[$i]['information'] = Db::table('user_student')->where('sid',$student[$i]['sid'])->field('sid,field,serialNum,name')->find();

			$voluntary[$i]['firstTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishFirst'])->field('name')->find();
			$voluntary[$i]['secondTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishSecond'])->field('name')->find();
			$voluntary[$i]['thirdTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishThird'])->field('name')->find();
			$voluntary[$i]['forthTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishForth'])->field('name')->find();
			$voluntary[$i]['fifthTeacher'] = Db::table('user_teacher')->where('workNumber',$voluntary[$i]['wishFifth'])->field('name')->find();
		}

		$teacher = Db::table('user_teacher')->where('department',$student[0]['department'])->select();
		$teacherTotal = count(Db::table('user_teacher')->where('department',$student[0]['department'])->select());
		$teacherTotalPage = ceil($teacherTotal/$this->pageSize);

		$pageBar = [
			'total'     => $total,
			'totalPage' => $totalPage+1,
			'pageSize'  => $this->pageSize,
			'curPage'   => $page
			];

		$teacherPageBar = [
			'teacherTotal'     => $teacherTotal,
			'teacherTotalPage' => $teacherTotalPage+1,
			'teacherPageSize'  => $this->pageSize,
			'teacherCurPage'   => $page
			];

		$this->assign($pageBar);
		$this->assign($teacherPageBar);
		$this->assign('student',$student);
		$this->assign('voluntary',$voluntary);
		$this->assign('teacher',$teacher);
		$this->assign('user', $head);
		return $this->fetch('match_setting');
				// dump($teacher);

	}

	

}