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
		
		if ($head['avator'] == "") {
        	$head['avatorIsEmpty'] = 1;
        }
        if ($head['avator'] != "") {
        	$head['avatorIsEmpty'] = 0;
        }

        $timeStatus = $this->getTimeStatus();
        $this->assign('timeStatus',$timeStatus);
		$this->assign('user', $head);
		return $this->fetch('index');
	}

	public function getTimeStatus() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select(); 

		$timeSet = Db::table('tc_voluntaryinfosetting')->where('grade',$grade[0]['grade'])->where('workNumber',$user['workNumber'])->find();
        $currentTime = time();
        if (!empty($timeSet)) {
        	if ($currentTime < $timeSet['issueStart']) {
        		$timeStatus = 1; //选导暂未开始
        	} elseif ($currentTime > $timeSet['issueStart'] && $currentTime < $timeSet['issueEnd']) {
        		$timeStatus = 2; //导师填报课题阶段
        	} elseif ($currentTime > $timeSet['firstStart'] && $currentTime < $timeSet['firstEnd']) {
        		$timeStatus = 3; //学生第一轮填报志愿阶段
        	} elseif ($currentTime > $timeSet['secondStart'] && $currentTime < $timeSet['secondEnd']) {
        		$timeStatus = 4; //学生第二轮填报志愿阶段
        	} elseif ($currentTime > $timeSet['confirmFirstStart'] && $currentTime < $timeSet['confirmFirstEnd']) {
        		$timeStatus = 5; //导师第一轮选择学生阶段
        	} elseif ($currentTime > $timeSet['confirmSecondStart'] && $currentTime < $timeSet['confirmSecondEnd']) {
        		$timeStatus = 6; //导师第二轮选择学生阶段
        	} else {
        		$timeStatus = 7; //选导已结束
        	}
        } else {
        	$timeStatus = 0;  //未设置选导时间
        }

        return $timeStatus;
	}

	public function matchSetting() {
		$user = $this->auto_login();

		$this->assign('user', $user);
		return $this->fetch('auto_assign');
				// dump($teacher);
			// dump($teacher);
			// dump($voluntary);
	}


	public function timeSetting() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$settingInfo = Db::table('tc_voluntaryinfosetting')->where('grade',$grade[0]['grade'])->where('workNumber',$user['workNumber'])->find();

		if (empty($settingInfo)) {
			$settingInfo['empty'] = 1;

			$settingInfo['voluntaryNum'] = 5;
			$settingInfo['totalMax'] = 3;
			$settingInfo['totalMin'] = 0;
			$settingInfo['defaultNum'] = 3;
			$settingInfo['experialMax'] = 3;
			$settingInfo['grade'] = $grade[0]['grade'];

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
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$userExist = Db::table('tc_voluntaryinfosetting')->where('grade',$grade[0]['grade'])->where('workNumber',$user['workNumber'])->find();

		$request = Request::instance();
		if ($request->isPost()) {
			$info = $request->post();

			$data['workNumber'] = $user['workNumber'];
			$data['department'] = $user['department'];
			$data['voluntaryNum'] = $info['voluntaryNum'];
			$data['grade'] = date('Y',strtotime("-2 year"));

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

			if ($user['department'] == "计算机实验班") {
				$teacher = Db::table('user_teacher')->where('isExperial',1)->whereOr('isExperial',3)->select();
				$count = count($teacher);
				for ($i=0; $i <$count ; $i++) { 
					if (!(Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$teacher[$i]['workNumber'])->find())) {
						$defaultIssue['workNumber'] = $teacher[$i]['workNumber'];
						$defaultIssue['time'] = time();
						$defaultIssue['totalCompExper'] = $info['experialMax'];
						$defaultIssue['totalMathExper'] = 0;
						$defaultIssue['totalNatur'] = $info['defaultNum']-$info['experialMax'];
						$defaultIssue['compExperNow'] = 0;
						$defaultIssue['mathExperNow'] = 0;
						$defaultIssue['naturNow'] = 0;

						Db::table('tc_issue_'.$grade[0]['grade'])->insert($defaultIssue);
					}
				}
			} elseif ($user['department'] == "数学实验班") {
				$teacher = Db::table('user_teacher')->where('isExperial',2)->whereOr('isExperial',3)->select();
				$count = count($teacher);
				for ($i=0; $i <$count ; $i++) { 
					if (!(Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$teacher[$i]['workNumber'])->find())) {
						$defaultIssue['workNumber'] = $teacher[$i]['workNumber'];
						$defaultIssue['time'] = time();
						$defaultIssue['totalCompExper'] = 0;
						$defaultIssue['totalMathExper'] = $info['experialMax'];
						$defaultIssue['totalNatur'] = $info['defaultNum']-$info['experialMax'];
						$defaultIssue['compExperNow'] = 0;
						$defaultIssue['mathExperNow'] = 0;
						$defaultIssue['naturNow'] = 0;

						Db::table('tc_issue_'.$grade[0]['grade'])->insert($defaultIssue);
					}
				}
			} else {
				$teacher = Db::table('user_teacher')->where('department',$user['department'])->select();
				$count = count($teacher);
				for ($i=0; $i <$count ; $i++) { 
					if (!(Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$teacher[$i]['workNumber'])->find())) {
						$defaultIssue['workNumber'] = $teacher[$i]['workNumber'];
						$defaultIssue['time'] = time();
						$defaultIssue['totalCompExper'] = 0;
						$defaultIssue['totalMathExper'] = 0;
						$defaultIssue['totalNatur'] = $info['defaultNum'];
						$defaultIssue['compExperNow'] = 0;
						$defaultIssue['mathExperNow'] = 0;
						$defaultIssue['naturNow'] = 0;

						Db::table('tc_issue_'.$grade[0]['grade'])->insert($defaultIssue);
					}
				}
			}

			if (empty($userExist)) {
				if (Db::table('tc_voluntaryinfosetting')->insert($data)) {
					$this->success("时间设置成功",url('timeSetting'));
				} else {
					$this->error("时间设置失败，请重新设置",url('timeSetting'));
				}
			} else {
				if (Db::table('tc_voluntaryinfosetting')->where('grade',$grade[0]['grade'])->where('workNumber',$user['workNumber'])->update($data)) {
					$this->success("时间更新成功",url('timeSetting'));
				} else {
					$this->error("时间更新失败，请重新更新",url('timeSetting'));
				}
			}
			
		}
	}

	public function auto_assign2(){
		$user = $this->auto_login();
		$this->assign('user',$user);
        return $this->fetch("auto_assign2");
    }

	//手动分配导师接口
	public function allocStudent() {
		$request = Request::instance();
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		if ($request->isGet()) {
			$data = $request->get();

			$student = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$data['serialNum'])->field('sid,department,chosen')->find();
			$teacher = Db::table('user_teacher')->where('workNumber',$data['workNumber'])->find();
			$issue = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$data['workNumber'])->find();

			$insert['sid'] = $student['sid'];
			$insert['workNumber'] = $data['workNumber'];
			
			if ($student['department'] == "计算机实验班") {
				if (($issue['compExperNow']+1) <= $issue['totalCompExper']) {
					Db::table('tc_result_'.$grade[0]['grade'])->insert($insert);  //插入结果表
					Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$data['serialNum'])->setField('chosen',1); //是否中选设置为已中选
					Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$data['workNumber'])->setInc('compExperNow',1); //导师的计算机实验班当前学生数加1

					$status['status'] = true;
					return json($status);
				}
			} elseif ($student['department'] == "数学实验班") {
				if (($issue['mathExperNow']+1) <= $issue['totalMathExper']) {
					Db::table('tc_result_'.$grade[0]['grade'])->insert($insert);  //插入结果表
					Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$data['serialNum'])->setField('chosen',1); //是否中选设置为已中选
					Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$data['workNumber'])->setInc('mathExperNow',1); //导师的数学实验班当前学生数加1

					$status['status'] = true;
					return json($status);
				}
			} else {
				if (($issue['naturNow']+1) <= $issue['totalNatur']) {
					Db::table('tc_result_'.$grade[0]['grade'])->insert($insert);  //插入结果表
					Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$data['serialNum'])->setField('chosen',1); //是否中选设置为已中选
					Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$data['workNumber'])->setInc('naturNow',1); //导师的自然班当前学生数加1

					$status['status'] = true;
					return json($status);
				}
			}
			$status['status'] = false;
			return json($status); 
		}
		
	}


	//智能分配 —— 核心功能
	public function intelligentAlloc() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		// $user['department'] = "计算机系";
		// $user['workNumber'] = "11061";
		$wishList = ['wishFirst','wishSecond','wishThird','wishForth','wishFifth'];
		$voluntaryNum = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();

		//获取未分配到导师的学生信息
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('chosen',0)->where('department',$user['department'])->field('sid,serialNum,gpa,chosen')->select();
		$countStudent = count($student);
		$inputStudent = [];

		for ($i=0; $i <$countStudent ; $i++) {
			//获取每个学生的志愿信息
			if (Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid', $student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find()) { 
				$student[$i]['voluntary'] = Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid', $student[$i]['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();

			//将每个学生的志愿信息转换成规定格式的txt文件
				$inputStudent[$i] = $student[$i]['serialNum'] . ' ' . $student[$i]['gpa'] . PHP_EOL;
		        for ($j=0; $j <$voluntaryNum['voluntaryNum'] ; $j++) {
		            $inputStudent[$i] = $inputStudent[$i] . $student[$i]['voluntary'][$wishList[$j]] . PHP_EOL;
		        }
		        if (($i+1) != $countStudent) {
			        $inputStudent[$i] = $inputStudent[$i] . PHP_EOL;
			    }
		    }
		}

		$countInputStudent = count($inputStudent);

		if ($countInputStudent != 0) {
			//将获取的学生信息转换为.txt文件
	        file_put_contents('student.txt', $inputStudent);

	        $inputTeacher = $this->getAvailableTeacher();
	        $countInputTeacher = count($inputTeacher);

	        //将获取的老师信息转换为.txt文件
	        file_put_contents('teacher.txt', $inputTeacher);

	        //调用算法进行分配
	        $fileNameWithParam = 'distribute.exe ' . $countInputStudent . ' ' . $countInputTeacher . ' ' . $voluntaryNum['voluntaryNum'];
	        system($fileNameWithParam);

	        //二次调用算法分配
	        $studentUnElected = file_get_contents('student_unelected.txt');
	        if ($studentUnElected != "") {
	        	$studentUnElected = str_replace("\r\n", '', $studentUnElected);
		        $studentUnElectedArr = explode(',', $studentUnElected);
		        $countInputStudent2 = count($studentUnElectedArr);

		        $inputTeacher2 = $this->getAvailableTeacher();
		        $countInputTeacher2 = count($inputTeacher2);
		        //将获取的老师信息转换为.txt文件
		        file_put_contents('teacher2.txt', $inputTeacher2);

		        $fileNameWithParam2 = 'distribute2.exe ' . $countInputStudent2 . ' ' . $countInputTeacher2;
		        system($fileNameWithParam2);

		        $studentElected2 = file_get_contents('student_elected2.txt');
		        $studentElected2 = str_replace("\r\n", '', $studentElected2);
		        $studentElectedArr2 = explode(',', $studentElected2);
	        }

	        $studentElected = file_get_contents('student_elected.txt');      
	        $studentElected = str_replace("\r\n", '', $studentElected);
	        $studentElectedArr1 = explode(',', $studentElected);

	        if ($studentUnElected != "") {
		        $studentElectedArr = array_merge($studentElectedArr1,$studentElectedArr2);
		    } else {
		    	$studentElectedArr = $studentElectedArr1;
		    }

	        //分割studentElected字符串，转换为数组，并存到临时的结果表中
	        for ($i = 0; $i < count($studentElectedArr); $i++) {
	            $studentElectedArr[$i] = explode(' ', $studentElectedArr[$i]);

	            $studentElectedResult[$i]['serialNum'] = $studentElectedArr[$i][0];
	            $studentElectedResult[$i]['stuInfo'] = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum', $studentElectedResult[$i]['serialNum'])->field('sid,serialNum,name,gpa')->find();
	            $studentElectedResult[$i]['workNumber'] = $studentElectedArr[$i][1];
	            $studentElectedResult[$i]['teaInfo'] = Db::table('user_teacher')->where('workNumber', $studentElectedResult[$i]['workNumber'])->field('workNumber,name')->find();

	            if (Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid',$studentElectedResult[$i]['stuInfo']['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find()) {
		            $vol_num[$i] = array_keys(Db::table('tc_voluntary_'.$grade[0]['grade'])->where('sid',$studentElectedResult[$i]['stuInfo']['sid'])->field('wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find(),$studentElectedResult[$i]['teaInfo']['workNumber']);
		            if ($vol_num[$i] == null) {
		            	$vol_num[$i] = "algorithmAlloced";
		            	$vol_num[$i] = array($vol_num[$i]);
		            }
		            if ($vol_num[$i][0] == "wishFirst") {
		            	$volOrder = "第一志愿";
		            } elseif ($vol_num[$i][0] == "wishSecond") {
		            	$volOrder = "第二志愿";
		            } elseif ($vol_num[$i][0] == "wishThird") {
		            	$volOrder = "第三志愿";
		            } elseif ($vol_num[$i][0] == "wishForth") {
		            	$volOrder = "第四志愿";
		            } elseif ($vol_num[$i][0] == "wishFifth") {
		            	$volOrder = "第五志愿";
		            } elseif ($vol_num[$i][0] == "algorithmAlloced") {
		            	$volOrder = "算法分配";
		            }

		            $insert[$i]['sid'] = $studentElectedResult[$i]['stuInfo']['sid'];
		            $insert[$i]['serialNum'] = $studentElectedResult[$i]['stuInfo']['serialNum'];
		            $insert[$i]['student_name'] = $studentElectedResult[$i]['stuInfo']['name'];
		            $insert[$i]['vol_num'] = $volOrder;
		            $insert[$i]['gpa'] = $studentElectedResult[$i]['stuInfo']['gpa'];
		            $insert[$i]['teacher_name'] = $studentElectedResult[$i]['teaInfo']['name'];
		            $insert[$i]['workNumber'] = $studentElectedResult[$i]['teaInfo']['workNumber'];
		            $insert[$i]['checked'] = 0;

		            if (Db::table('tc_temp_result')->where('sid',$insert[$i]['sid'])->find()) {
		            	Db::table('tc_temp_result')->update($insert[$i]);
		            } else {
		            	Db::table('tc_temp_result')->insert($insert[$i]);
		            }
		        }
	        }
		    $data['status'] = "success";
		    return json($data);
		} else {
			$data['amount'] = 0;
			$data['msg'] = "所有学生均未填报志愿，无法进行智能分配";
			$data['information'] = "";
			return json($data);
		}
	    // return json($insert);
        $this->assign('user', $user);
        // return json($insert);

	}

	public function getAvailableTeacher() {
		$user = $this->auto_login();
		// $user['department'] = "信息安全与网络工程系";
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		//获取导师信息
        if ($user['department'] == "计算机实验班") {
        	$teacher = Db::table('user_teacher')->where('isExperial',1)->whereOr('isExperial',3)->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的计算机实验班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalCompExper'] - $teacherIssue[$i]['compExperNow'];

        		//将每个导师的信息转换成规定格式的字符串
	        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        } elseif ($user['department'] == "数学实验班") {
        	$teacher = Db::table('user_teacher')->where('isExperial',2)->whereOr('isExperial',3)->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的数学实验班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalMathExper'] - $teacherIssue[$i]['mathExperNow'];

        		//将每个导师的信息转换成规定格式的字符串
	        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        } else {
        	$teacher = Db::table('user_teacher')->where('department',$user['department'])->select();
        	$countTeacher = count($teacher);

        	for ($i=0; $i <$countTeacher ; $i++) { 
        		//获取每个老师的当前可带的自然班的学生数
        		$teacherIssue[$i] = Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber', $teacher[$i]['workNumber'])->find();
        		$teacher[$i]['avaliableNumber'] = $teacherIssue[$i]['totalNatur'] - $teacherIssue[$i]['naturNow'];

        		//将每个导师的信息转换成规定格式的字符串
	        		$inputTeacher[$i] = $teacher[$i]['workNumber'] . ' ' . $teacher[$i]['avaliableNumber'] . PHP_EOL;
        	}
        }
        return $inputTeacher;
	}

	//智能分配结果学生列表
	public function studentElectedList() {
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$pageSize = 10;

		$request = Request::instance();
		if ($request->isGet()) {
		    $data = $request->get();
			$curPage = $data['curPage'] != '' ? $data['curPage'] : 1;
			$checkList = $data['check'];

			$totalPage = ceil(count(Db::table('tc_temp_result')->select())/$pageSize);
			$student['amount'] = $totalPage;
			$student['information'] = Db::table('tc_temp_result')->order('serialNum asc')->page($curPage,$pageSize)->select();

			if ($checkList != "") {
				$count = count($checkList);
				for ($i=0; $i <$count ; $i++) {
					if ($checkList[$i]['checked'] == "true") {
						$checkVal = 1;
					} elseif ($checkList[$i]['checked'] == "false") {
						$checkVal = 0;
					}
					Db::table('tc_temp_result')->where('serialNum',$checkList[$i]['serialNum'])->setField('checked',$checkVal);
				}
			}
			return json($student);
		}
	}



	//确认分配结果
	public function assignResultConfirm() {
		$checkedList = Db::table('tc_temp_result')->where('checked',1)->select();
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		$count = count($checkedList);
		for ($i=0; $i <$count ; $i++) { 
			$result['sid'] = $checkedList[$i]['sid'];
			$result['workNumber'] = $checkedList[$i]['workNumber'];

			$student = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$checkedList[$i]['serialNum'])->find();

			Db::table('tc_result_'.$grade[0]['grade'])->insert($result);  //向结果表插入数据
			Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$checkedList[$i]['serialNum'])->setField('chosen',1);  //对应的学生中选状态置为1

			if ($student['department'] == "计算机实验班") {
				Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$checkedList[$i]['workNumber'])->setInc('compExperNow',1);  //导师当前计算机实验班人数加1
			} elseif ($student['department'] == "数学实验班") {
				Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$checkedList[$i]['workNumber'])->setInc('mathExperNow',1);  //导师当前数学实验班人数加1
			} else {
				Db::table('tc_issue_'.$grade[0]['grade'])->where('workNumber',$checkedList[$i]['workNumber'])->setInc('naturNow',1);  //导师当前自然班人数加1
			}
		}
		Db::table('tc_temp_result')->where('1=1')->delete(); //清空临时结果表
		return json('success');
	}


	//经过智能分配算法后，返回已选择的学生数和总的学生数
	public function checkNumAndAllNum() {
		$request = Request::instance();
		if ($request->isGet()) {
			$allNum = count(Db::table('tc_temp_result')->select());
			$checkNum = count(Db::table('tc_temp_result')->where('checked',1)->select());

			$data['check'] = $checkNum;
			$data['total'] = $allNum;

			return json($data);
		}
	}


	public function modify() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();

		if ($head['avator'] == "") {
        	$head['avatorIsEmpty'] = 1;
        }
        if ($head['avator'] != "") {
        	$head['avatorIsEmpty'] = 0;
        }

		$this->assign('user', $head);
		return $this->fetch('modify');
	}

	public function saveModify() {
		$user = $this->auto_login();
		$where['workNumber'] = $user['workNumber'];
		$request = Request::instance();

		//获取上传的头像的信息
		$avator = request()->file('avator');
		if ($avator != "") {
			$avatorInfo = $avator->move('../uploads/departmentHead');
			if ($avatorInfo) {
				$temp['ava'] = explode("..", $avatorInfo->getPathName());
				$data['avator'] = $temp['ava'][1];
			}
		}

		if ($request->isPost()) {
			$password = $request->post('newPasswordConfirm');
			if ($password == "") {
				$data['password'] = $user['password'];
			} else {
				$data['password'] = $request->post('newPasswordConfirm');
			}

			$data['telephone'] = $request->post('telephone');
			$data['email'] = $request->post('email');

			if (Db::table('user_department_head')->where($where)->update($data)) {
				$this->success("信息修改成功!",url('index'));
			} else {
				$this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
			}
		}

	}

	public function oldPasswordConfirm() {
		$user = $this->auto_login();
        $head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();

        $request = Request::instance();
        if ($request->isPost()) {
            $oldPassword = $request->post();
            if ($oldPassword['oldPW'] != $head['password']) {
                $data = false;
            }
            if ($oldPassword['oldPW'] == $head['password']) {
                $data = true;
            }
        return json($data);
        }
	}

	public function studentManager(){
        $user = $this->auto_login();

        $timeStatus = $this->getTimeStatus();
        $this->assign('timeStatus',$timeStatus);
        $this->assign('user',$user);
	    return $this->fetch('student_manager');
    }


    public function addStudent() {
    	$user = $this->auto_login();

    	$request = Request::instance();
    	if ($request->isPost()) {
    		$data = $request->post();

    		$student['serialNum'] = $data['serialNum'];
    		$student['password'] = $data['serialNum'];
    		$student['name'] = $data['name'];
    		$student['gender'] = $data['gender'];
    		$student['gpa'] = $data['gpa'];
    		$student['college'] = "数计学院";
    		$student['department'] = $data['department'];
    		$student['field'] = "暂无";
    		$student['rank'] = $data['rank'];
    		$student['grade'] = $data['grade'];
    		$student['telephone'] = $data['telephone'];
    		$student['avator'] = "/uploads/default/defaultAvator.png";

    		if ($user['department'] == $data['department']) {
	    		if ((Db::table('user_student_'.$student['grade'])->where('serialNum',$data['serialNum'])->find()) == "") {
	    			if (Db::table('user_student_'.$student['grade'])->insert($student)) {
	    				$add['msg'] = "学生添加成功";
	    				$add['status'] = true;
	    			}
	    		} else {
	    			$add['msg'] = "该学生已存在";
	    			$add['status'] = false;
	    		}
	    	} else {
	    		$add['msg'] = "您只能添加本系的学生";
    			$add['status'] = false;
	    	}
	    	return json($add);
    	}
    }

    public function deleteStudent() {
    	$request = Request::instance();
    	if ($request->isGet()) {
    		$data = $request->get();
    		$grade = $data['grade'];
    		$serialNum = $data['serialNum'];

    		if (Db::table('user_student_'.$grade)->where('serialNum','in',$serialNum)->delete()) {
    			return true;
    		} else {
    			return false;
    		}
    	}
    }

    public function studentList() {
	   	$user = $this->auto_login();

	   	$department = $user['department'];
    	$lastGrade = Db::table('tc_grade')->order('grade desc')->select();
    	$pageSize = 10;

    	$request = Request::instance();
    	if ($request->isGet()) {
    		$grade = $request->get('grade') != '' ? $request->get('grade') : $lastGrade[0]['grade'];
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		$totalPage = ceil(count(Db::table('user_student_'.$grade)->where('department',$department)->select())/$pageSize);
    		$studentList['amount'] = $totalPage;
    		$studentList['information'] = Db::table('user_student_'.$grade)->where('department',$department)->field('sid,serialNum,name,department,grade,gpa,rank')->order('serialNum asc')->page($curPage,$pageSize)->select();
    		return json($studentList);
    	}
    }


    //学生管理界面的搜索接口
    public function searchStudent() {
    	$user = $this->auto_login();
    	$request = Request::instance();
    	if ($request->isGet()) {
    		$data = $request->get();
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		$grade = $data['grade'];
    		$condition = $data['condition'];

    		$totalPage = ceil(count(Db::table('user_student_'.$grade)->where('department',$user['department'])->where('serialNum|name','like','%'.$condition.'%')->select())/10);
    		$student['amount'] = $totalPage;
    		$student['information'] = Db::table('user_student_'.$grade)->where('department',$user['department'])->where('serialNum|name','like','%'.$condition.'%')->field('sid,serialNum,name,department,grade,gpa,rank')->page($curPage,10)->select();
    		return json($student);
    	}
    }


    //导师管理界面的搜索接口
    public function searchTeacher() {
    	$user = $this->auto_login();
    	$request = Request::instance();
    	if ($request->isGet()) {
    		$data = $request->get();
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		$condition = $data['condition'];

    		$totalPage = ceil(count(Db::table('user_teacher')->where('department',$user['department'])->where('workNumber|name','like','%'.$condition.'%')->select())/10);
    		$teacher['amount'] = $totalPage;
    		$teacher['information'] = Db::table('user_teacher')->where('department',$user['department'])->where('workNumber|name','like','%'.$condition.'%')->field('workNumber,name,password')->page($curPage,10)->select();
    		return json($teacher);
    	}
    }

    public function teacherList() {
    	$user = $this->auto_login();
    	$department = $user['department'];
    	// $department = "计算机实验班";

    	$pageSize = 10;

    	$request = Request::instance();
    	if ($request->isGet()) {
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;

    		if ($department == "计算机实验班") {
    			$totalPage = ceil(count(Db::table('user_teacher')->where('isExperial',1)->whereOr('isExperial',3)->select())/$pageSize);
    			$teacherList['amount'] = $totalPage;
    			$teacherList['information'] = Db::table('user_teacher')->where('isExperial',1)->whereOr('isExperial',3)->field('workNumber,name,password')->order('workNumber asc')->page($curPage,$pageSize)->select();
    		} elseif ($department == "数学实验班") {
    			$totalPage = ceil(count(Db::table('user_teacher')->where('isExperial',2)->whereOr('isExperial',3)->select())/$pageSize);
    			$teacherList['amount'] = $totalPage;
    			$teacherList['information'] = Db::table('user_teacher')->where('isExperial',2)->whereOr('isExperial',3)->field('workNumber,name,password')->order('workNumber asc')->page($curPage,$pageSize)->select();
    		} else {
	    		$totalPage = ceil(count(Db::table('user_teacher')->where('department',$department)->select())/$pageSize);
	    		$teacherList['amount'] = $totalPage;
	    		$teacherList['information'] = Db::table('user_teacher')->where('department',$department)->field('workNumber,name,password')->order('workNumber asc')->page($curPage,$pageSize)->select();
	    	}
    		return json($teacherList);
    	}
    }

    public function addTeacher() {
    	$user = $this->auto_login();
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$data = $request->post();

    		$teacher['workNumber'] = $data['workNumber'];
    		$teacher['password'] = $data['workNumber'];
    		$teacher['name'] = $data['name'];
    		$teacher['sex'] = $data['gender'];
    		$teacher['birthday'] = "1970-01-01";
    		$teacher['department'] = $data['department'];
    		$teacher['telephone'] = $data['telephone'];
    		$teacher['email'] = "fzu@edu.cn";
    		$teacher['isExperial'] = $data['isExperial'];
    		$teacher['position'] = $data['position'];
    		$teacher['avator'] = "/uploads/default/defaultAvator.png";

    		if ($user['department'] == $data['department']) {
	    		if ((Db::table('user_teacher')->where('workNumber',$data['workNumber'])->find()) == "") {
	    			if (Db::table('user_teacher')->insert($teacher)) {
	    				$add['msg'] = "导师添加成功";
	    				$add['status'] = true;
	    			}
	    		} else {
	    			$add['msg'] = "该导师已存在";
	    			$add['status'] = false;
	    		}
	    	} else {
	    		$add['msg'] = "您只能添加本系的导师";
    			$add['status'] = false;
	    	}
	    	return json($add);
    	}
    }


    public function deleteTeacher() {
    	$request = Request::instance();
    	if ($request->isGet()) {
    		$data = $request->get();
    		$workNumber = $data['workNumber'];

    		if (Db::table('user_teacher')->where('workNumber','in',$workNumber)->delete()) {
    			return true;
    		} else {
    			return false;
    		}
    	}
    }


    public function student_result($dep="",$to="",$grade=0)//学生结果查看
    {
    	$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		$pageSize=8;
		$gg=DB::table('tc_grade')->field('grade')->select();
		if($grade==0)$grade=$gg[0]['grade'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$grade=$_POST['grade'];
		}
		$finddep=DB::table('user_department_head')->where('workNumber',$user['workNumber'])->field('department')->find();
		$dep=$finddep['department'];
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
	 	else 
	 		$tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
	
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
	    $this->assign('data',$data);
		$this->assign('user', $head);
		return $this->fetch('student_result');
    }

    public function tutor_result($dep="",$grade=0)//导师结果查看
    {
    	$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		
		$pageSize=8;
		$gg=DB::table('tc_grade')->field('grade')->select();
		if($grade==0)$grade=$gg[0]['grade'];
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$grade=$_POST['grade'];
		}
		$finddep=DB::table('user_department_head')->where('workNumber',$user['workNumber'])->field('department')->find();
		$dep=$finddep['department'];

		if ($user['department'] == "计算机实验班") 
		{
			$tea=Db::table('user_teacher t')->where('isExperial',1)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);
			//$total=count(Db::table('user_teacher t')->where('isExperial',1)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		} 
		elseif ($user['department'] == "数学实验班") 
		{
			$tea=Db::table('user_teacher t')->where('isExperial',2)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);
			//$total=count(Db::table('user_teacher t')->where('isExperial',2)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		} 
		else 
		{
			$tea=Db::table('user_teacher t')->where('department',$dep)
			->field('t.workNumber as tnum,t.name as tname')->distinct(true)->paginate($listRows = $pageSize, $simple = false, $config = [
				                                     	'query' => array('dep' => $dep, 'grade'=>$grade)
				                                     	]);
			// $total=count(Db::table('user_teacher t')->where('department',$dep)
			// ->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		}
		// $total=count(Db::table('user_teacher t')->where('department',$dep)
		// ->field('t.workNumber as tnum,t.name as tname')->distinct(true)->select());
		// $totalPage = ceil($total/$pageSize);
		 $i=0;
        $page = $tea->render();
		$tea = $tea->all();
   
		foreach($tea as $value)
		{
			$stu=Db::query("select s.serialNum snum,s.name sname from user_student_" .$grade." s,tc_result_".$grade. " r where  r.workNumber=?  and s.sid=r.sid and s.department=?",[$value['tnum'],$user['department']]);
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
		$this->assign('gg',$gg);
		$this->assign('dep',$dep);
		$this->assign('grade',$grade);
		// $this->assign($pageBar);
		$this->assign('data',$tea);
		$this->assign('page',$page);

		$this->assign('user', $head);
		return $this->fetch('tutor_result');

	}

    public function gradeList() {
    	$request = Request::instance();

    	if ($request->isGet()) {
    		$gradeList = Db::table('tc_grade')->limit(5)->select();

    		return json($gradeList);
    	}

    }


    public function teacherManager(){
    	$user = $this->auto_login();

    	$timeStatus = $this->getTimeStatus();
        $this->assign('timeStatus',$timeStatus);
    	$this->assign('user',$user);
    	return $this->fetch('teacher_manager');
    }

    //学生信息Excel表格导入
    public function student_excel_import() {
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$file = $request->file('excel_file');
    		$info = $file->move('../uploads/excel/student');
    		$type = explode('.', $info->getFilename())[1];

    		//判断excel的文件类型，接收.xls 拒绝.xlsx
    		if ($type == "xlsx") {
    			$uploadInfo['file_type'] = '.'.$type;
    			$uploadInfo['msg'] = "文件上传失败，无法上传.xlsx文件";
    			$uploadInfo['status'] = false;
    			return json($uploadInfo);
    		} elseif ($type == "xls") {
    			$uploadInfo['file_type'] = '.'.$type;
    			$uploadInfo['file_path'] = $info->getRealPath();
    			$uploadInfo['msg'] = "文件上传成功";
    			$uploadInfo['status'] = true;
    			return json($uploadInfo);
    		}
    	}
    }

    //导师信息Excel表格导入
    public function teacher_excel_import() {
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$file = $request->file('excel_file');
    		$info = $file->move('../uploads/excel/teacher');
    		$type = explode('.', $info->getFilename())[1];

    		//判断excel的文件类型，接收.xls 拒绝.xlsx
    		if ($type == "xlsx") {
    			$uploadInfo['file_type'] = '.'.$type;
    			$uploadInfo['msg'] = "文件上传失败，无法上传.xlsx文件";
    			$uploadInfo['status'] = false;
    			return json($uploadInfo);
    		} elseif ($type == "xls") {
    			$uploadInfo['file_type'] = '.'.$type;
    			$uploadInfo['file_path'] = $info->getRealPath();
    			$uploadInfo['msg'] = "文件上传成功";
    			$uploadInfo['status'] = true;
    			return json($uploadInfo);
    		}
    	}
    }

    //获取学生信息Excel表格，进行处理并添加入数据表中
    public function student_excel_add() {
    	$user = $this->auto_login();
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$feedback = $request->post();
    		$realPath = $feedback['file_path'];

    		require_once 'extend/reader.php';
            $data = new \Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('utf-8');  //设置在页面中输出的编码方式
            $data->read($realPath);             //读取上传到当前目录下名叫$filename的文件

            error_reporting(E_ALL ^ E_NOTICE);

            if ($user['department'] == $data->sheets[0]['cells'][3][5]) {
	            //循环处理Excel表格里的每一行数据，并插入数据库
	            for ($i=3; $i <=$data->sheets[0]['numRows'] ; $i++) { 
	            	$insert = [];
	            	$insert['grade'] = $data->sheets[0]['cells'][$i][1];
	            	$insert['serialNum'] = $data->sheets[0]['cells'][$i][2];
	            	$insert['password'] = $data->sheets[0]['cells'][$i][2];
	            	$insert['name'] = $data->sheets[0]['cells'][$i][3];
	            	$insert['gender'] = $data->sheets[0]['cells'][$i][4];
	            	$insert['college'] = "数计学院";
	            	$insert['department'] = $data->sheets[0]['cells'][$i][5];
	            	$insert['gpa'] = $data->sheets[0]['cells'][$i][6];
	            	$insert['rank'] = $data->sheets[0]['cells'][$i][7];
	            	$insert['telephone'] = $data->sheets[0]['cells'][$i][8];
	            	$insert['chosen'] = 0;
	            	$insert['avator'] = "/uploads/default/defaultAvator.png";
	            	//判断数据是否存在，并覆盖/插入数据库中
	            	if (Db::table('user_student_'.$insert['grade'])->where('serialNum',$insert['serialNum'])->find()) {
	            		Db::table('user_student_'.$insert['grade'])->where('serialNum',$insert['serialNum'])->update($insert);
	            	} else {
	            		Db::table('user_student_'.$insert['grade'])->insert($insert);
	            	}
	            }

	            $addInfo['totalNum'] = $data->sheets[0]['numRows']-3;
	            $addInfo['status'] = true;
	        } else {
	        	$addInfo['totalNum'] = 0;
	            $addInfo['status'] = false;
	        }
            return json($addInfo);
    	}
    }

    //获取导师信息Excel表格，进行处理并添加入数据表中
    public function teacher_excel_add() {
    	$user = $this->auto_login();
    	$request = Request::instance();
    	if ($request->isPost()) {
    		$feedback = $request->post();
    		$realPath = $feedback['file_path'];

    		require_once 'extend/reader.php';
            $data = new \Spreadsheet_Excel_Reader();
            $data->setOutputEncoding('utf-8');  //设置在页面中输出的编码方式
            $data->read($realPath);             //读取上传到当前目录下名叫$filename的文件

            error_reporting(E_ALL ^ E_NOTICE);

            if ($user['department'] == $data->sheets[0]['cells'][3][4]) {
	            //循环处理Excel表格里的每一行数据，并插入数据库
	            for ($i=3; $i <=$data->sheets[0]['numRows'] ; $i++) { 
	            	$insert = [];
	            	$insert['workNumber'] = $data->sheets[0]['cells'][$i][1];
	            	$insert['password'] = $data->sheets[0]['cells'][$i][1];
	            	$insert['name'] = $data->sheets[0]['cells'][$i][2];
	            	$insert['sex'] = $data->sheets[0]['cells'][$i][3];
	            	$insert['department'] = $data->sheets[0]['cells'][$i][4];
	            	$insert['isExperial'] = $data->sheets[0]['cells'][$i][5];
	            	$insert['position'] = $data->sheets[0]['cells'][$i][6];
	            	$insert['email'] = $data->sheets[0]['cells'][$i][7];
	            	$insert['avator'] = "/uploads/default/defaultAvator.png";
	            	//判断数据是否存在，并覆盖/插入数据库中
	            	if (Db::table('user_teacher')->where('workNumber',$insert['workNumber'])->find()) {
	            		Db::table('user_teacher')->update($insert);
	            	} else {
	            		Db::table('user_teacher')->insert($insert);
	            	}
	            }

	            $addInfo['totalNum'] = $data->sheets[0]['numRows']-3;
	            $addInfo['status'] = true;
	        } else {
	        	$addInfo['totalNum'] = 0;
	            $addInfo['status'] = false;
	        }
            return json($addInfo);	
    	}
    }


    //学生信息Excel导入模版接口
    public function student_excel_template() {
        require_once 'extend/PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
        $excel = new \PHPExcel();

        //设置宽度
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(114);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(12);

        $excel->getActiveSheet()->mergeCells('A1:H1');  //合并A1:I1单元格
        $excel->getActiveSheet()->setTitle('学生信息导入模版');
        $excel->getActiveSheet()->setCellValue('A1','数计学院20xx级学生名单');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        //设置文本格式
        $excel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_TEXT);

        //设置边框和水平垂直居中
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                ]
            ]
        ];

        //设置表头数组
        $letter = ['A','B','C','D','E','F','G','H'];
        $tableHeader = ['年级','学号','姓名','性别（男、女）','系别（应用数学系、信息与计算科学系、计算机系、信息安全与网络系、软件工程系、计算机实验班、数学实验班）','绩点（保留两位小数）','绩点排名（格式：1/78）','联系方式'];
        for ($i=0; $i <8 ; $i++) { 
            $excel->getActiveSheet()->setCellValue($letter[$i].'2',$tableHeader[$i]);
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->applyFromArray($styleArray);
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->getFont()->setBold(true);
        }

        //将excel导出自动下载至本地
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="数计学院20xx级学生名单导入模版.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }

    //导师信息Excel导入模版接口
    public function teacher_excel_template() {
        require_once 'extend/PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
        $excel = new \PHPExcel();

        //设置宽度
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(83);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
        

        $excel->getActiveSheet()->mergeCells('A1:G1');  //合并A1:I1单元格
        $excel->getActiveSheet()->setTitle('导师信息导入模版');
        $excel->getActiveSheet()->setCellValue('A1','数计学院导师名单');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);

        //设置文本格式
        $excel->getActiveSheet()->getStyle('A')->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_TEXT);

        //设置自动换行
        $excel->getActiveSheet()->getStyle('E2')->getAlignment()->setWrapText(true);

        //设置边框和水平垂直居中
        $styleArray = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                ]
            ]
        ];

        //设置表头数组
        $letter = ['A','B','C','D','E','F','G'];
        $tableHeader = ['工号','姓名','性别（男、女）','系别（应用数学系、信息与计算科学系、计算机系、信息安全与网络系、软件工程系）','导师身份（0、可作为自然班导师 1、可作为自然班或者计算机实验班导师 2、可作为自然班或者数学实验班导师 3、可作为自然班或计算机实验班或数学实验班导师）','职称','联系方式'];
        for ($i=0; $i <7 ; $i++) { 
            $excel->getActiveSheet()->setCellValue($letter[$i].'2',$tableHeader[$i]);
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->applyFromArray($styleArray);
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->getFont()->setBold(true);
        }

        //将excel导出自动下载至本地
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="数计学院导师名单导入模版.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }


    //获取导师对应学生的结果
    public function teacherToStudentResult() {
    	// $user = $this->auto_login();
    	$user['workNumber'] = "00001";
    	$user['department'] = "计算机实验班";

    	$request = Request::instance();
        $gg=DB::table('tc_grade')->field('grade')->select();
        $grade = $request->get('grade') != '' ? $request->get('grade') : $gg[0]['grade'];
        
        $finddep=DB::table('user_department_head')->where('workNumber',$user['workNumber'])->field('department')->find();
        $dep=$finddep['department'];
        if ($user['department'] == "计算机实验班") {
	        $tea=Db::table('user_teacher t')->where('isExperial',1)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname,t.department as dep,t.position as position')->distinct(true)->select();
        } elseif ($user['department'] == "数学实验班") {
        	$tea=Db::table('user_teacher t')->where('isExperial',2)->whereOr('isExperial',3)->field('t.workNumber as tnum,t.name as tname,t.department as dep,t.position as position')->distinct(true)->select();
        } else {
        	$tea=Db::table('user_teacher t')->where('department',$dep)->field('t.workNumber as tnum,t.name as tname,t.department as dep,t.position as position')->distinct(true)->select();
        }

        $count = count($tea);
        for ($i=0; $i <$count ; $i++) { 
            $title[$i] = Db::table('tc_issue_'.$grade)->where('workNumber',$tea[$i]['tnum'])->field('title')->find();
            $tea[$i]['title'] = $title[$i]['title'];
            $tea[$i]['grade'] = $grade;
        }
        
        $i=0;
        foreach($tea as $value)
        {
            $stu=Db::query("select s.serialNum snum,s.name sname,s.telephone stele from user_student_" .$grade." s,tc_result_".$grade. " r where  r.workNumber=?  and s.sid=r.sid ",[$value['tnum']]);
            $tea[$i]['tstudentL'] = $stu;
            $tea[$i]['stuNum'] = count($stu);
            $i++;   
        }
        return $tea;
    }

    //导师对应学生结果Excel导出
    public function teacherToStudentExcelExport($gradeForExport,$departmentForExport="") {
    	$user = $this->auto_login();
    	$grade = Db::table('tc_grade')->order('grade desc')->select();

    	if ($departmentForExport == "") {
    		$departmentForExport = $user['department'];
    	}

        //引入PHPExcel文件
        require_once 'extend/PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
        $excel = new \PHPExcel();

        //获得结果数组
        $insert = $this->getTeacherToStudentExportResult($gradeForExport,$departmentForExport);

        //手动设置单元格宽度
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);

        //设置学号栏为文本格式
        $excel->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode('000000000');
        $excel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);

        //设置表格标题，单独处理
        $excel->getActiveSheet()->mergeCells('A1:H1');  //合并A1:F1单元格
        $excel->getActiveSheet()->setCellValue('A1',$gradeForExport.'级'.$insert[0]['department'].'导师分配结果');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);  //加粗
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //设置水平居中
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);     //设置垂直居中
        
        //设置边框和水平垂直居中
        $styleArray = [ 
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                ]
            ]
        ];

        $letter = ['A','B','C','D','E','F','G','H'];
        $tableHeader = ['序号','系别','专业导师','职称','课题','学生姓名','学号','联系方式'];    //设置表头数组，单独处理
        for ($i=0; $i <8 ; $i++) { 
            $excel->getActiveSheet()->setCellValue($letter[$i].'2',$tableHeader[$i]);            //设置单元格的值
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->applyFromArray($styleArray);    //设置单元格格式：水平、垂直居中、加边框
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->getFont()->setBold(true);       //设置单元格字体加粗
        }

        $totalInsert = count($insert);   //计算总插入数

        $oldTemp = 3;           //临时变量，用于处理合并单元格的范围
        $newTemp = 0;           //临时变量，用于处理合并单元格的范围

        for ($i=0; $i <$totalInsert ; $i++) {                 //循环插入数据，并作格式处理
            if ($insert[$i]['stuNum'] == 0) {                 //判断导师是否有学生，如果没有学生，只需插入一行 
                $tempCount = $insert[$i]['stuNum'] + 1;
            } else {
                $tempCount = $insert[$i]['stuNum'];
            }
            for ($j=0; $j <$tempCount ; $j++) {               //开始插入
                if ($insert[$i]['stuNum'] != 0) {             //逐一插入导师的学生信息
                    $excel->getActiveSheet()->setCellValue('F'.($j+$oldTemp),$insert[$i]['students'][$j]['name']);
                    $excel->getActiveSheet()->setCellValue('G'.($j+$oldTemp),$insert[$i]['students'][$j]['serialNum']);
                    $excel->getActiveSheet()->setCellValue('H'.($j+$oldTemp),$insert[$i]['students'][$j]['telephone']);
                }

                $excel->getActiveSheet()->getStyle('F'.($j+$oldTemp))->applyFromArray($styleArray); //设置单元格格式：水平、垂直居中、加边框
                $excel->getActiveSheet()->getStyle('G'.($j+$oldTemp))->applyFromArray($styleArray); //设置单元格格式：水平、垂直居中、加边框
                $excel->getActiveSheet()->getStyle('H'.($j+$oldTemp))->applyFromArray($styleArray); //设置单元格格式：水平、垂直居中、加边框
            }

            $excel->getActiveSheet()->setCellValue('A'.$oldTemp,($i+1));                            //设置单元格的值
            $excel->getActiveSheet()->setCellValue('B'.$oldTemp,$insert[$i]['teacher']['department']);
            $excel->getActiveSheet()->setCellValue('C'.$oldTemp,$insert[$i]['teacher']['name']);
            $excel->getActiveSheet()->setCellValue('D'.$oldTemp,$insert[$i]['teacher']['position']);
            $excel->getActiveSheet()->setCellValue('E'.$oldTemp,$insert[$i]['teacher']['title']);

            $newTemp = $oldTemp + $tempCount;
            if ($insert[$i]['stuNum'] != 1 && $insert[$i]['stuNum'] != 0) {
                for ($k=0; $k <5 ; $k++) { 
                    $excel->getActiveSheet()->mergeCells($letter[$k].$oldTemp.':'.$letter[$k].($newTemp-1)); //根据导师的学生数合并A、B、C、D、E列的单元格
                }
            }

            for ($z=0; $z <5 ; $z++) { 
                $excel->getActiveSheet()->getStyle($letter[$z].$oldTemp.':'.$letter[$z].($newTemp-1))->applyFromArray($styleArray); //设置单元格格式：水平、垂直居中、加边框
            }

            $oldTemp = $newTemp;
        }

        //将excel导出自动下载至本地
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename='.'"'.$gradeForExport.'级导师互选结果.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');

    }


    //获取学生对应导师的结果
    public function studentToTeacherResult($gradeForExport,$departmentForExport)//学生结果查看
    {
        $user = $this->auto_login();

        $request = Request::instance();
        // $gg=DB::table('tc_grade')->field('grade')->select();
        // $grade=$gg[0]['grade'];
        $grade = $gradeForExport;

        // $finddep=DB::table('user_department_head')->where('workNumber',$user['workNumber'])->field('department')->find(); //workNumber记得改
        $dep=$departmentForExport;

        $data=Db::table('user_teacher t,user_student_'.$grade.' s,tc_result_'.$grade.' r')
        ->where('t.workNumber=r.workNumber and s.sid=r.sid')->where('s.department','=',$dep)->where('s.grade',$grade)
        ->field('t.workNumber as tnum,t.department as tdep,t.position as tposi,t.name as tname,t.email as ttele,s.serialNum as snum,s.name as sname,s.telephone as stele')
        ->order('s.serialNum')->select();

        $count = count($data);
        for ($i=0; $i <$count ; $i++) { 
            $title[$i] = Db::table('tc_issue_'.$grade)->where('workNumber',$data[$i]['tnum'])->field('title')->find();
            $data[$i]['title'] = $title[$i]['title'];
            $data[$i]['grade'] = $grade;
        }

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
        else 
            $tealist=Db::table('user_teacher')->where('user_teacher.department','=',$dep)->field('workNumber,name')->select();
    
        return $data;
        
    }

    //学生对应导师结果Excel导出
    public function studentToTeacherExcelExport($gradeForExport,$departmentForExport="") {
    	$user = $this->auto_login();
        //引入PHPExcel文件
        require_once 'extend/PHPExcel_1.8.0_doc/Classes/PHPExcel.php';
        $excel = new \PHPExcel();

        if ($departmentForExport == "") {
    		$departmentForExport = $user['department'];
    	}

        //获得结果数组
        $insert = $this->studentToTeacherResult($gradeForExport,$departmentForExport);

        //手动设置单元格宽度
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(26);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(40);

        //设置学号栏为文本格式
        $excel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode('000000000');
        $excel->getActiveSheet()->getStyle('H')->getAlignment()->setWrapText(true);

        //设置表格标题，单独处理
        $excel->getActiveSheet()->mergeCells('A1:I1');  //合并A1:I1单元格
        $excel->getActiveSheet()->setCellValue('A1',$gradeForExport.'级'.$departmentForExport.'导师分配结果');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);  //加粗
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //设置水平居中
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);     //设置垂直居中
        
        //设置边框和水平垂直居中
        $styleArray = [ 
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allborders' => [
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                ]
            ]
        ];

        $letter = ['A','B','C','D','E','F','G','H','I'];
        $tableHeader = ['序号','系别','学生姓名','学号','联系方式','导师姓名','职称','课题','联系方式'];    //设置表头数组，单独处理
        for ($i=0; $i <9 ; $i++) { 
            $excel->getActiveSheet()->setCellValue($letter[$i].'2',$tableHeader[$i]);            //设置单元格的值
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->applyFromArray($styleArray);    //设置单元格格式：水平、垂直居中、加边框
            $excel->getActiveSheet()->getStyle($letter[$i].'2')->getFont()->setBold(true);       //设置单元格字体加粗
        }

        $totalInsert = count($insert);   //计算总插入数
        for ($i=0; $i <$totalInsert ; $i++) { 
            $excel->getActiveSheet()->setCellValue('A'.($i+3),($i+1));
            $excel->getActiveSheet()->setCellValue('B'.($i+3),$insert[$i]['tdep']);
            $excel->getActiveSheet()->setCellValue('C'.($i+3),$insert[$i]['sname']);
            $excel->getActiveSheet()->setCellValue('D'.($i+3),$insert[$i]['snum']);
            $excel->getActiveSheet()->setCellValue('E'.($i+3),$insert[$i]['stele']);
            $excel->getActiveSheet()->setCellValue('F'.($i+3),$insert[$i]['tname']);
            $excel->getActiveSheet()->setCellValue('G'.($i+3),$insert[$i]['tposi']);
            $excel->getActiveSheet()->setCellValue('H'.($i+3),$insert[$i]['title']);
            $excel->getActiveSheet()->setCellValue('I'.($i+3),$insert[$i]['ttele']);
        }

        for ($j=0; $j <9 ; $j++) { 
                $excel->getActiveSheet()->getStyle($letter[$j].'3'.':'.$letter[$j].($totalInsert+2))->applyFromArray($styleArray); //设置单元格格式：水平、垂直居中、加边框
            }

        //将excel导出自动下载至本地
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename='.'"'.$insert[0]['grade'].'级导师互选结果.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');

    }


    //获取未分配学生列表
    public function unchosenStudentList() {
    	$user = $this->auto_login();
    	// $user['workNumber'] = "11061";
    	$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
    	$voluntaryNum = Db::table('tc_voluntaryinfosetting')->where('workNumber',$user['workNumber'])->find();
    	$wishList = ['wishFirst','wishSecond','wishThird','wishForth','wishFifth'];
    	// $head['department'] = "信息安全与网络工程系";

    	$request = Request::instance();
    	$lastGrade = Db::table('tc_grade')->order('grade desc')->select();
    	$pageSize = 10;
    	if ($request->isGet()) {
    		$curPage = $request->get('curPage') != '' ? $request->get('curPage') : 1;
    		$grade = $request->get('grade') != '' ? $request->get('grade') : $lastGrade[0]['grade'];

    		$unchosenStudent = Db::table('user_student_'.$grade)->where('department',$head['department'])->order('serialNum asc')->page($curPage,$pageSize)->where('chosen',0)->select();
    		$amount = ceil(count(Db::table('user_student_'.$grade)->where('department',$head['department'])->where('chosen',0)->select())/$pageSize);
    		$totalUnchosen = count($unchosenStudent);
    		$data['amount'] = $amount;

    		if ($amount != 0) {
	    		for ($i=0; $i <$totalUnchosen ; $i++) {
	    		 	if (Db::table('tc_voluntary_'.$grade)->where('sid',$unchosenStudent[$i]['sid'])->field('round,wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find()) {

	    		 		$roundList = Db::table('tc_voluntary_'.$grade)->where('sid',$unchosenStudent[$i]['sid'])->field('round')->select();
	    		 		if (count($roundList) == 1) {
	    		 			$nowRound = 1;
	    		 		} else {
	    		 			$nowRound = 2;
	    		 		}

		    			$voluntary[$i] = Db::table('tc_voluntary_'.$grade)->where('sid',$unchosenStudent[$i]['sid'])->where('round',$nowRound)->field('round,wishFirst,wishSecond,wishThird,wishForth,wishFifth')->find();
						$voluntary[$i]['information'] = Db::table('user_student_'.$grade)->where('sid',$unchosenStudent[$i]['sid'])->field('sid,serialNum,name')->find();
						
						for ($j=0; $j <$voluntaryNum['voluntaryNum'] ; $j++) { 
				            $temp[$i]['vol'.($j+1)] = Db::table('user_teacher')->where('workNumber',$voluntary[$i][$wishList[$j]])->field('name')->find();
				            $data['information'][$i]['vol'.($j+1)] = $temp[$i]['vol'.($j+1)]['name'];
				        }

						$data['information'][$i]['sid'] = $voluntary[$i]['information']['sid'];
						$data['information'][$i]['serialNum'] = $voluntary[$i]['information']['serialNum'];
						$data['information'][$i]['name'] = $voluntary[$i]['information']['name'];
						$data['information'][$i]['round'] = $voluntary[$i]['round'];
					} else {
						$voluntary[$i]['information'] = Db::table('user_student_'.$grade)->where('sid',$unchosenStudent[$i]['sid'])->field('sid,serialNum,name')->find();

						for ($j=0; $j <$voluntaryNum['voluntaryNum'] ; $j++) { 
				            $data['information'][$i]['vol'.($j+1)] = "无";
				        }

						$data['information'][$i]['sid'] = $voluntary[$i]['information']['sid'];
						$data['information'][$i]['serialNum'] = $voluntary[$i]['information']['serialNum'];
						$data['information'][$i]['name'] = $voluntary[$i]['information']['name'];
					}
	    		}
	    	} else {
	    		$data['information'] = "";
	    	}
    		return json($data);
    	}
    }


    //未分配导师列表接口
    public function teacherIssue() {
    	$user = $this->auto_login();
    	$department = $user['department'];
    	// $user['department'] = "数学实验班";
    	$grade = Db::table('tc_grade')->order('grade desc')->select();

    	if ($department == "计算机实验班") {
    		$issue['information'] = Db::table('user_teacher t,tc_issue_'.$grade[0]['grade'].' i')->where('t.workNumber=i.workNumber')->where('i.totalCompExper','>','i.compExperNow')->where('t.isExperial',1)->whereOr('t.isExperial',3)->field('t.name as name,i.workNumber as workNumber,t.isExperial as isExperial,i.totalCompExper as js_need,i.compExperNow as js_cur,i.totalMathExper as ss_need,i.mathExperNow as ss_cur,i.totalNatur as nature_need,i.naturNow as nature_cur')->select();
    	} elseif ($department == "数学实验班") {
    		$issue['information'] = Db::table('user_teacher t,tc_issue_'.$grade[0]['grade'].' i')->where('t.workNumber=i.workNumber')->where('i.totalMathExper','>','i.mathExperNow')->where('t.isExperial',2)->whereOr('t.isExperial',3)->field('t.name as name,i.workNumber as workNumber,t.isExperial as isExperial,i.totalCompExper as js_need,i.compExperNow as js_cur,i.totalMathExper as ss_need,i.mathExperNow as ss_cur,i.totalNatur as nature_need,i.naturNow as nature_cur')->select();
    	} else {
    		$issue['information'] = Db::table('user_teacher t,tc_issue_'.$grade[0]['grade'].' i')->where('t.workNumber=i.workNumber')->where('i.totalNatur','>','i.naturNow')->where('t.department',$user['department'])->field('t.name as name,i.workNumber as workNumber,t.isExperial as isExperial,i.totalCompExper as js_need,i.compExperNow as js_cur,i.totalMathExper as ss_need,i.mathExperNow as ss_cur,i.totalNatur as nature_need,i.naturNow as nature_cur')->select();
    	}
    	return json($issue);
    }


    //获取导师对应学生的结果
    public function getTeacherToStudentExportResult($gradeForExport,$departmentForExport) {
    	$user = $this->auto_login();
    	// $departmentForExport = "计算机实验班";
    	// $gradeForExport = "2015";
    	if ($departmentForExport == "计算机实验班") {
    		$teacherList = Db::table('user_teacher t,tc_issue_'.$gradeForExport.' i')->where('isExperial',1)->whereOr('isExperial',3)->where('t.workNumber=i.workNumber')->field('t.name,t.department,t.position,t.workNumber,i.title')->select();
    	} elseif ($departmentForExport == "数学实验班") {
    		$teacherList = Db::table('user_teacher t,tc_issue_'.$gradeForExport.' i')->where('isExperial',2)->whereOr('isExperial',3)->where('t.workNumber=i.workNumber')->field('t.name,t.department,t.position,t.workNumber,i.title')->select();
    	} else {
    		$teacherList = Db::table('user_teacher t,tc_issue_'.$gradeForExport.' i')->where('t.workNumber=i.workNumber')->where('t.department',$departmentForExport)->field('t.name,t.department,t.position,t.workNumber,i.title')->select();
    	}
    	$count = count($teacherList);

    	for ($i=0; $i <$count ; $i++) { 
    		$result[$i]['teacher'] = $teacherList[$i];

    		$student[$i] = Db::table('tc_result_'.$gradeForExport)->where('workNumber',$teacherList[$i]['workNumber'])->field('sid')->select();
    		$countStudent = count($student[$i]);

    		for ($j=0; $j <$countStudent ; $j++) { 
    			$result[$i]['students'][$j] = Db::table('user_student_'.$gradeForExport)->where('sid',$student[$i][$j]['sid'])->field('serialNum,name,telephone')->find();
    		}
    		$result[$i]['stuNum'] = $countStudent;
    		$result[$i]['grade'] = $gradeForExport;
    		$result[$i]['department'] = $departmentForExport;
    	}

    	return $result;
    }
    
}
