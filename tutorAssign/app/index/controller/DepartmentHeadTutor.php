<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;
use think\Controller;

class DepartmentHeadTutor extends BaseController {

	public $pageSize = 3;
	
	public function index() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		

		$this->assign('user', $head);
		return $this->fetch('index');
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


	public function timeSetting() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$settingInfo = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		if (empty($settingInfo)) {
			$settingInfo['empty'] = 1;
		} else {
			$settingInfo['issueStart'] = date('Y-m-d H:i',$settingInfo['issueStart']);
			$settingInfo['issueEnd'] = date('Y-m-d H:i',$settingInfo['issueEnd']);

			$settingInfo['firstStart'] = date('Y-m-d H:i',$settingInfo['firstStart']);
			$settingInfo['firstEnd'] = date('Y-m-d H:i',$settingInfo['firstEnd']);

			$settingInfo['secondStart'] = date('Y-m-d H:i',$settingInfo['secondStart']);
			$settingInfo['secondEnd'] = date('Y-m-d H:i',$settingInfo['secondEnd']);

			$settingInfo['confirmFirstStart'] = date('Y-m-d H:i',$settingInfo['confirmFirstStart']);
			$settingInfo['confirmFirstEnd'] = date('Y-m-d H:i',$settingInfo['confirmFirstEnd']);

			$settingInfo['confirmSecondStart'] = date('Y-m-d H:i',$settingInfo['confirmSecondStart']);
			$settingInfo['confirmSecondEnd'] = date('Y-m-d H:i',$settingInfo['confirmSecondEnd']);

			$settingInfo['empty'] = 0;
		}

		$this->assign('settingInfo',$settingInfo);
		$this->assign('user', $head);
		return $this->fetch('time_setting');

	}

	public function infoSetting() {
		$user = $this->auto_login();
		$userExist = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		$request = Request::instance();
		if ($request->isPost()) {
			$info = $request->post();

			$data['workNumber'] = $user['workNumber'];
			$data['voluntaryNum'] = $info['voluntaryNum'];

			$data['issueStart'] = strtotime($info['issueStart']);
			$data['issueEnd'] = strtotime($info['issueEnd']);

			$data['firstStart'] = strtotime($info['firstStart']);
			$data['firstEnd'] = strtotime($info['firstEnd']);

			$data['secondStart'] = strtotime($info['secondStart']);
			$data['secondEnd'] = strtotime($info['secondEnd']);

			$data['confirmFirstStart'] = strtotime($info['confirmFirstStart']);
			$data['confirmFirstEnd'] = strtotime($info['confirmFirstEnd']);

			$data['confirmSecondStart'] = strtotime($info['confirmSecondStart']);
			$data['confirmSecondEnd'] = strtotime($info['confirmSecondEnd']);

			$data['totalMax'] = $info['totalMax'];
			$data['totalMin'] = $info['totalMin'];
			$data['defaultNum'] = $info['defaultNum'];
			$data['experialMax'] = $info['experialMax'];

			if (empty($userExist)) {
				if (Db::table('tc_voluntaryinfosetting')->insert($data)) {
					$this->success("时间设置成功",url('timeSetting'));
				} else {
					$this->error("时间设置失败，请重新设置",url('timeSetting'));
				}
			} else {
				if (Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->update($data)) {
					$this->success("时间更新成功",url('timeSetting'));
				} else {
					$this->error("时间更新失败，请重新更新",url('timeSetting'));
				}
			}
			// dump($data);
			// dump($info);
		}
	}

	public function test($page=1) {
		// $user = $this->auto_login();
		// $head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
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

		$teacher = Db::table('user_teacher')->where('department',$student[0]['field'])->page($page,$this->pageSize)->select();
		$teacherTotal = count(Db::table('user_teacher')->where('department',$student[0]['field'])->select());
		$teacherTotalPage = ceil($teacherTotal/$this->pageSize);

		return json($voluntary);
				// dump($teacher);

	}


	public function testtest() {
		$data = Db::table('tc_voluntary')->select();
		// $dat = json_decode($data);
		$dat = file_get_contents('data.txt');
		dump($dat);
		// file_put_contents('data.txt', var_export($data,true));
		// return json($dat);
		// return json($data);
	}
}
