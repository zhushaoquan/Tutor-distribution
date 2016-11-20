<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;
use think\Controller;

class DepartmentHeadTutor extends BaseController {

	public $pageSize = 7;
	
	public function index() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		

		$this->assign('user', $head);
		return $this->fetch('index');
	}


	public function matchSetting($page=1) {
		$user = $this->auto_login();

		$student = Db::table('user_student')->where('chosen',0)->where('department',$user['department'])->page($page,$this->pageSize)->select();

		$total = count(Db::table('user_student')->where('chosen',0)->where('department',$user['department'])->select());
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
		for ($i=0; $i <count($teacher) ; $i++) { 
			$teacher[$i]['issue'] = Db::table('tc_issue')->where('workNumber',$teacher[$i]['workNumber'])->find();

		}

		$teacherTotal = count($teacher);
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
		$this->assign('user', $user);
		return $this->fetch('match_setting');
				// dump($teacher);
			// dump($teacher);
			// dump($voluntary);
	}


	public function timeSetting() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$settingInfo = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		if (empty($settingInfo)) {
			$settingInfo['empty'] = 1;

			$settingInfo['voluntaryNum'] = 5;
			$settingInfo['totalMax'] = 8;
			$settingInfo['totalMin'] = 0;
			$settingInfo['defaultNum'] = 8;
			$settingInfo['experialMax'] = 5;

			$settingInfo['issueStart'] = NULL;
			$settingInfo['issueEnd'] = NULL;

			$settingInfo['firstStart'] = NULL;
			$settingInfo['firstEnd'] = NULL;

			$settingInfo['secondStart'] = NULL;
			$settingInfo['secondEnd'] = NULL;

			$settingInfo['confirmFirstStart'] = NULL;
			$settingInfo['confirmFirstEnd'] = NULL;

			$settingInfo['confirmSecondStart'] = NULL;
			$settingInfo['confirmSecondEnd'] = NULL;

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
		// dump($settingInfo);

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



	public function allocStudent() {
		$request = Request::instance();
		if ($request->isPost()) {
			$data = $request->post();

			Db::table('tc_result')->insert($data);
			Db::table('user_student')->where('sid',$data['sid'])->setField('chosen',1);
			Db::table('tc_issue')->where('workNumber',$data['workNumber'])->setInc('totalNow',1);
		}
		
	}


	//智能分配 —— 核心功能
	public function intelligentAlloc()
    {
        $user = $this->auto_login();

        //获取学生信息
        $student = Db::table('user_student')->where('chosen', 0)->where('department', $user['department'])->field('sid,serialNum,gpa,chosen')->select();
        $countStudent = count($student);

        for ($i = 0; $i < $countStudent; $i++) {
            $student[$i]['voluntary'] = Db::table('tc_voluntary')->where('sid', $student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();

            $inputStudent[$i] = $student[$i]['serialNum'] . ' ' . $student[$i]['gpa'] . PHP_EOL . $student[$i]['voluntary']['wishFirst'] . PHP_EOL . $student[$i]['voluntary']['wishSecond'] . PHP_EOL . $student[$i]['voluntary']['wishThird'] . PHP_EOL . $student[$i]['voluntary']['wishForth'] . PHP_EOL . $student[$i]['voluntary']['wishFifth'] . PHP_EOL . PHP_EOL;
        }
        //将获取的学生信息转换为.txt文件
        file_put_contents('student.txt', $inputStudent);

        //获取导师信息
        $teacher = Db::table('user_teacher')->where('department', $user['department'])->select();
        $countTeacher = count($teacher);


        for ($i = 0; $i < $countTeacher; $i++) {
            $teacherIssue[$i] = Db::table('tc_issue')->where('workNumber', $teacher[$i]['workNumber'])->find();
            $teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalNatur'] - $teacherIssue[$i]['nowNatur'];

            $inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        }
        //将获取的老师信息转换为.txt文件
        file_put_contents('teacher.txt', $inputTeacher);

        //调用算法进行分配
        $fileNameWithParam = 'distribute.exe ' . $countStudent . ' ' . $countTeacher;
        system($fileNameWithParam);

        $studentElected = file_get_contents('student_elected.txt');      //获取通过算法得到分配的学生的结果，转换为string
        $studentUnelected = file_get_contents('student_unelected.txt');  //获取通过算法仍然未得到分配的学生的结果，转换为string
        $tutorAssign = file_get_contents('tutor_assign.txt');            //获取通过算法，生成的导师对应学生的结果，转换为string

        //分割studentElected字符串，转换为数组
        $studentElected = str_replace("\r\n", '', $studentElected);
        $studentElectedArr = explode(',', $studentElected);
        for ($i = 0; $i < count($studentElectedArr); $i++) {
            $studentElectedArr[$i] = explode(' ', $studentElectedArr[$i]);

            $studentElectedResult[$i]['serialNum'] = $studentElectedArr[$i][0];
            $studentElectedResult[$i]['sid'] = Db::table('user_student')->where('serialNum', $studentElectedResult[$i]['serialNum'])->field('sid')->find();
            $studentElectedResult[$i]['sname'] = Db::table('user_student')->where('serialNum', $studentElectedResult[$i]['serialNum'])->field('name')->find();
            $studentElectedResult[$i]['workNumber'] = $studentElectedArr[$i][1];
            $studentElectedResult[$i]['tname'] = Db::table('user_teacher')->where('workNumber', $studentElectedResult[$i]['workNumber'])->field('name')->find();
        }

        //分割studentUnlected字符串，转换为数组
        $studentUnelected = str_replace("\r\n", '', $studentUnelected);
        $studentUnelectedArr = explode(',', $studentUnelected);
        for ($i = 0; $i < count($studentUnelectedArr); $i++) {
            $studentUnelectedArr[$i] = explode(' ', $studentUnelectedArr[$i]);

            $studentUnelectedResult[$i]['serialNum'] = $studentUnelectedArr[$i][0];
        }

        //分割tutorAssign字符串，转换为数组
        $tutorAssign = str_replace("\r\n", '', $tutorAssign);
        $tutorAssignArr = explode(',', $tutorAssign);
        for ($i = 0; $i < count($tutorAssignArr); $i++) {
            $tutorAssignArr[$i] = explode(' ', $tutorAssignArr[$i]);

            $tutorAssignResult[$i]['workNumber'] = $tutorAssignArr[$i][0];
            $tutorAssignResult[$i]['count'] = $tutorAssignArr[$i][1];
            $tutorAssignResult[$i]['avaliableNumber'] = $tutorAssignArr[$i][2];
            if ($tutorAssignArr[$i][3] == "null") {
                $tutorAssignResult[$i]['student'] = null;
            } else {
                $tutorAssignResult[$i]['student'] = $tutorAssignArr[$i][3];

                $tutorAssignResult[$i]['student'] = explode('-', $tutorAssignResult[$i]['student']);
            }
        }

        // dump($tutorAssignResult);
        $this->assign('studentElectedResult', $studentElectedResult);
        $this->assign('user', $user);
        return $this->fetch('assign_result');

        // return json($studentElectedResult); //返回通过算法得到分配的学生的JSON
        // return json($studentUnelectedResult); //获取通过算法仍然未得到分配的学生的JSON
        // dump($tutorAssignArr);
        // dump($tutorAssignResult);

    }


	public function assignResult() {
		$user = $this->auto_login();


		//获取学生信息
		$student = Db::table('user_student')->where('chosen',0)->where('department',$user['department'])->field('sid,serialNum,gpa,chosen')->select();
		$countStudent = count($student);

		for ($i=0; $i <$countStudent ; $i++) { 
			$student[$i]['voluntary'] = Db::table('tc_voluntary')->where('sid',$student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();

			$inputStudent[$i] = $student[$i]['serialNum'].' '.$student[$i]['gpa'].PHP_EOL.$student[$i]['voluntary']['wishFirst'].PHP_EOL.$student[$i]['voluntary']['wishSecond'].PHP_EOL.$student[$i]['voluntary']['wishThird'].PHP_EOL.$student[$i]['voluntary']['wishForth'].PHP_EOL.$student[$i]['voluntary']['wishFifth'].PHP_EOL.PHP_EOL;
		}
		//将获取的学生信息转换为.txt文件
		file_put_contents('student.txt', $inputStudent);

		//获取导师信息
		$teacher = Db::table('user_teacher')->where('department',$user['department'])->select();
		$countTeacher = count($teacher);


		for ($i=0; $i <$countTeacher ; $i++) {
			$teacherIssue[$i] = Db::table('tc_issue')->where('workNumber',$teacher[$i]['workNumber'])->find(); 
			$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalNatur'] - $teacherIssue[$i]['nowNatur'];

			$inputTeacher[$i] = $teacher[$i]['workNumber'].' '.$teacher[$i]['avaliableNumber'].PHP_EOL;
		}
		//将获取的老师信息转换为.txt文件
		file_put_contents('teacher.txt', $inputTeacher);

		//调用算法进行分配
		$fileNameWithParam = 'distribute.exe '.$countStudent.' '.$countTeacher;
		system($fileNameWithParam);

		$studentElected = file_get_contents('student_elected.txt');      //获取通过算法得到分配的学生的结果，转换为string
		$studentUnelected = file_get_contents('student_unelected.txt');  //获取通过算法仍然未得到分配的学生的结果，转换为string
		$tutorAssign = file_get_contents('tutor_assign.txt');            //获取通过算法，生成的导师对应学生的结果，转换为string

		//分割studentElected字符串，转换为数组
		$studentElected = str_replace("\r\n", '', $studentElected);
		$studentElectedArr = explode(',', $studentElected);
		for ($i=0; $i <count($studentElectedArr) ; $i++) { 
			$studentElectedArr[$i] = explode(' ', $studentElectedArr[$i]);

			$studentElectedResult[$i]['serialNum'] = $studentElectedArr[$i][0];
			$studentElectedResult[$i]['sid'] = Db::table('user_student')->where('serialNum',$studentElectedResult[$i]['serialNum'])->field('sid')->find();
			$studentElectedResult[$i]['sname'] = Db::table('user_student')->where('serialNum',$studentElectedResult[$i]['serialNum'])->field('name')->find();
			$studentElectedResult[$i]['workNumber'] = $studentElectedArr[$i][1];
			$studentElectedResult[$i]['tname'] = Db::table('user_teacher')->where('workNumber',$studentElectedResult[$i]['workNumber'])->field('name')->find();
		}

		//分割studentUnlected字符串，转换为数组
		$studentUnelected = str_replace("\r\n", '', $studentUnelected);
		$studentUnelectedArr = explode(',', $studentUnelected);
		for ($i=0; $i <count($studentUnelectedArr) ; $i++) { 
			$studentUnelectedArr[$i] = explode(' ', $studentUnelectedArr[$i]);

			$studentUnelectedResult[$i]['serialNum'] = $studentUnelectedArr[$i][0];
		}

		//分割tutorAssign字符串，转换为数组
		$tutorAssign = str_replace("\r\n", '', $tutorAssign);
		$tutorAssignArr = explode(',', $tutorAssign);
		for ($i=0; $i <count($tutorAssignArr) ; $i++) { 
			$tutorAssignArr[$i] = explode(' ', $tutorAssignArr[$i]);

			$tutorAssignResult[$i]['workNumber'] = $tutorAssignArr[$i][0];
			$tutorAssignResult[$i]['count'] = $tutorAssignArr[$i][1];
			$tutorAssignResult[$i]['avaliableNumber'] = $tutorAssignArr[$i][2];
			if ($tutorAssignArr[$i][3] == "null") {
				$tutorAssignResult[$i]['student'] = null;
			} else {
				$tutorAssignResult[$i]['student'] = $tutorAssignArr[$i][3];

				$tutorAssignResult[$i]['student'] = explode('-', $tutorAssignResult[$i]['student']);
			}
		}

		// dump($tutorAssignResult);
		$this->assign('studentElectedResult',$studentElectedResult);
		$this->assign('user', $user);
		return $this->fetch('assign_result');

		// return json($studentElectedResult); //返回通过算法得到分配的学生的JSON
		// return json($studentUnelectedResult); //获取通过算法仍然未得到分配的学生的JSON
		// dump($tutorAssignArr);
		// dump($tutorAssignResult);



		$this->assign('user', $user);
		return $this->fetch('assign_result');
	}

//
//	public function assignResult() {
//		$user = $this->auto_login();
//
//		$this->assign('user', $user);
//		return $this->fetch('assign_result');
//	}


	public function assignResultConfirm($r) {
		dump($r);
	}



	//测试调用算法
	public function cTest() {
		$data = Db::table('user_student')->select();
		return json($data);
	}
}
