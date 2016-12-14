<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class Student extends BaseController {
	public $department_1 = "计算机实验班";
	public $department_2 = "数学实验班";
	public $voluntaryinfosetting;
	public $ontime;
	public $teachers ;
	public $time = "";
    public $pageSize = 5;
    public $user;
    public $grades;


    public function _initialize()
    {
    	/*
    	初始化函数

    	初始化一些 时间设置（第几轮志愿时间等等）年级
    	*/

    	$this->grades = Db::table('tc_grade')->order('grade desc')->limit(5)->select();
  
    	$this->user = $this->auto_login();
    	$data = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->user['department'])->find();
        $this->voluntaryinfosetting = $data;
        $nowtime = time();
        $data['message'] = '';
        $data['ontime']= -1;

        /*
        data['time'] 当前为什么时段
        data['time'] = 0,导师提交课题时间
        data['time'] = 1,第一轮学生填报志愿时间
        data['time'] = 2,第二轮学生填报志愿时间
        data['time'] = 11,第一轮导师选择学生时间
        data['time'] = 22,第二轮导师选择学生时间
        data['time'] = 3,志愿结果已出

        */
        if(isset($data['issueStart'])) {

	        if($this->user['chosen'] == 1) {
	        	$data['ontime'] = 3;
	        	$data['message'] = "<font color='#FF0000'>".$data['department']."</font>的志愿结果已出，请前往 最终结果 页面查看哦~~~";
	        }else if($nowtime >= $data['issueStart'] && $nowtime <= $data['issueEnd']) {
	        	//导师填报课题时段！
	        	$data['ontime'] = 0;
	        	$data['message'] = "当前为<font color='#FF0000'>".$data['department']."</font>的导师<font color='#FF0000'>填报课题</font>时间：<font color='#FF0000'>".date('Y-m-d',$data['issueStart'])."</font>至<font color='#FF0000'>".date('Y-m-d',$data['issueEnd'])."</font>！";
	        }else if($nowtime < $data['firstEnd'] && $nowtime > $data['firstStart']) {
	        	//第一轮志愿填报
	        	$data['ontime'] = 1;
	            $data['message'] = "当前为<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第一轮的志愿填报</font>时间：<font color='#FF0000'>".date('Y-m-d',$data['firstStart'])."</font>至<font color='#FF0000'>".date('Y-m-d',$data['firstEnd'])."</font>,请同学们按时填报、修改志愿！";
	         } else if($nowtime  < $data['secondEnd'] && $nowtime > $data['secondStart']) {
	         	//第二轮志愿填报时间
	         	$data['ontime'] = 2;
	         	$data['message'] = "当前为<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第二轮的志愿填报</font>时间：<font color='#FF0000'>".date('Y-m-d',$data['secondStart'])."</font>至<font color='#FF0000'>".date('Y-m-d',$data['secondEnd'])."</font>,请同学们按时填报、修改志愿！";
	         }else if($nowtime >= $data['confirmFirstStart'] && $nowtime <= $data['confirmFirstEnd']) {
	         	//第一轮导师选择学生时间
	         	$data['ontime'] = 11;
	         	$data['message'] = "当前为<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第一轮的导师选择学生</font>时间：<font color='#FF0000'>".date('Y-m-d',$data['confirmFirstStart'])."</font>至<font color='#FF0000'>".date('Y-m-d',$data['confirmFirstEnd'])."</font>,请同学们耐心等候！";
	         } else if($nowtime >= $data['confirmSecondStart'] && $nowtime <= $data['confirmSecondEnd']) {
	         	//第二轮导师选择学生时间
	         	$data['ontime'] = 22;
	         	$data['message'] = "当前为<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第二轮的导师选择学生</font>时间：<font color='#FF0000'>".date('Y-m-d',$data['confirmSecondStart'])."</font>至<font color='#FF0000'>".date('Y-m-d',$data['confirmSecondEnd'])."</font>,请同学们耐心等候！";
	         }else {
	            $data['message'] = "当前不在填报志愿时间段内！";      
	         }
        } else {
        	$data['ontime'] = -1;
        	$data['message'] = "当前不在填报志愿时间段内！";
        }
        
         $this->ontime = $data['ontime'];
         $this->assign('message',$data['message']);
         $this->assign('ontime',$data['ontime']);
         $this->assign('voluntaryinfosetting',$data);
  
    }
	public function index() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        if ($user['chosen'] == 0) {
        	$student['chosen'] = '否';
        } else {
        	$student['chosen'] = '是';
        }
        if ($student['avator'] == "") {
        	$student['avatorIsEmpty'] = 1;
        }
        if ($student['avator'] != "") {
        	$student['avatorIsEmpty'] = 0;
        }
        $this->assign('user', $student);
		return $this->fetch('index');
	}

	public function showNotice($str, $smartMode) {
        $str = str_replace("\n", "", $str);
        echo '<DOCTYPE HTML>';
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8" />';
        echo '<title>提示信息</title>';
        echo '</head>';
        echo '<body>';
        echo '<script language="javascript">';
        echo "alert('".addslashes($str)."');";
        echo 'window.location.href="'.$smartMode.'";';
        echo '</script>';
        echo '</body>';
        echo '</html>';
        exit;
    }

	public function modify() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
		$student = Db::table('user_student_'.$grade[0]['grade'])->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        
		if ($student['avator'] == "") {
        	$student['avatorIsEmpty'] = 1;
        }
        if ($student['avator'] != "") {
        	$student['avatorIsEmpty'] = 0;
        }
        $this->assign('user', $student);
		return $this->fetch('modify');
	}

	public function saveModify() {
		$user = $this->auto_login();
		$where['sid'] = $user['sid'];
		$request = Request::instance();
		$grade = Db::table('tc_grade')->order('grade desc')->select();

		//获取上传的头像的信息
		$avator = request()->file('avator');
		if ($avator != "") {
			$avatorInfo = $avator->move('../uploads/student');
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
			$data['skill'] = $request->post('skill');

			if (Db::table('user_student_'.$grade[0]['grade'])->where($where)->update($data)) {
				$this->success("信息修改成功!",url('index'));
			} else {
				$this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
			}
		}
	}

	public function tutor_list($page=1) {

		if($this->user['department'] == $this->department_1) {
			//计算机实验班
			$teachers = Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where(function ($query) {
			                                     	$query->where('isExperial',1)->whereor('isExperial',3)->where('compExperNow', '<','totalCompExper');
			                                     })
			                                     //->where('compExperNow', '<','totalCompExper')
			                                     ->order('t.name desc')
			                                     ->page($page,$this->pageSize)
			                                     ->select();

			$this->teachers = $teachers;
	
		    $total = count(Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where(function ($query) {
			                                     	$query->where('isExperial',1)->whereor('isExperial',3)->where('compExperNow', '<','totalCompExper');
			                                     })
			                                     //->where('compExperNow', '<','totalCompExper')
			                                     ->order('t.name desc')
			                                     ->select());
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];


		} else if($this->user['department'] == $this->department_2) {
			//数学实验板
			$teachers = Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where(function ($query) {
			                                     	$query->where('isExperial',2)->whereOr('isExperial',3)->where('mathExperNow','<','totalMathExper');
			                                     })
			                                     //->where('mathExperNow','<','totalMathExper')
			                                     ->order('t.name desc')
			                                     ->page($page,$this->pageSize)->select();
			$this->teachers = $teachers;

		    $total = count(Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where(function ($query) {
			                                     	$query->where('isExperial',2)->whereOr('isExperial',3)->where('mathExperNow','<','totalMathExper');
			                                     })
			                                   //  ->where('mathExperNow','<','totalMathExper')
			                                     ->order('t.name desc')
			                                     ->select());
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		} else {
			//自然班
			$teachers = Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where('department',$this->user['department'])
			                                     ->where('naturNow ','< ','totalNatur')
			                                     ->order('t.name desc')
			                                     ->page($page,$this->pageSize)
			                                     ->select();

		    $total = count(Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                     ->where('department',$this->user['department'])
			                                     ->where('naturNow ','< ','totalNatur')
			                                     ->order('t.name desc')
			                                     ->select());
		    $this->teachers = $teachers;
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		}
        $request = Request::instance();
		if ($request->isPost()) {
            $teacher = $request->post('teacher', '');
            $teachers = Db::table('user_teacher')->where('department|name|sex|department','like','%'.$teacher.'%')
			                                     ->order('name desc')
			                                     ->page($page,$this->pageSize)
			                                     ->select();

		    $total = count(Db::table('user_teacher')->where('department|name|sex|department','like','%'.$teacher.'%')
			                                     ->order('name desc')
			                                     ->select());
		    $this->teachers = $teachers;
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];           
        }

		$this->assign($pageBar);
		$this->assign('teachers',$teachers);
		$this->assign('user', $this->user);
		return $this->fetch('tutor_list');
	}

//导师详细信息
	public function tutor_detail($workNumber) {
		$user = $this->auto_login();
		//$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //
        $tutor = Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i','t.workNumber = i.workNumber')->where('t.workNumber',$workNumber)->find();
        $this->assign('tutor', $tutor);
        $this->assign('user', $user);
		return $this->fetch('information_detail');

	}


	public function edit_voluntary() {

		if($this->user['department'] == $this->department_1) {
			//计算机实验吧
			$tutors = Db::table('user_teacher') ->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                    ->where(function ($query) {
			                                     	$query->where('isExperial',1)->whereOr('isExperial',3)->where('compExperNow', '<','totalCompExper');
			                                     })
			                                    //->where('compExperNow ','< ','totalCompExper')
			                                    ->order('t.name desc')
			                                    ->select();

		} else if($this->user['department'] == $this->department_2) {
			//数学实验板
			$tutors = Db::table('user_teacher') ->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                    ->where(function ($query) {
			                                     	$query->where('isExperial',2)->whereOr('isExperial',3)->where('mathExperNow ','< ','totalMathExper');
			                                     })
			                                    //->where('mathExperNow ','< ','totalMathExper')
			                                    ->order('t.name desc')
			                                    ->select();
		} else {
			//自然班
			$tutors = Db::table('user_teacher')->alias('t')->join('tc_issue_'.$this->grades[0]['grade'].' i', 't.workNumber = i.workNumber')
			                                   ->where('department',$this->user['department'])
			                                   ->where('naturNow ','<','totalNatur')
			                                   ->order('t.name desc')
			                                   ->select();
		}
	
        $this->assign('tutors', $tutors);
        $this->assign('user', $this->user);
		$request = Request::instance();
        if ($request->isPost()) {
        	if($this->ontime == 1)$data1['round'] = 1;
        	else if($this->ontime == 2)$data1['round'] = 2;
        	else $this->showNotice("当前不在填报志愿时间内！",url('Student/edit_voluntary'));

        	$data1['sid'] = $this->user['sid'];
            $data1['wishFirst'] = $request->post('wishFirst', '');
            $data1['wishSecond'] = $request->post('wishSecond', '');
            $data1['wishThird'] = $request->post('wishThird', '');
            $data1['wishForth'] = $request->post('wishForth', '');
            $data1['wishFifth'] = $request->post('wishFifth', '');  
            $data1['round'] = intval($this->ontime);

            $volunNum = $this->voluntaryinfosetting['voluntaryNum'];
            if($data1['wishFirst'] == '') {
            	$this->showNotice("第一志愿不得为空",url('Student/edit_voluntary'));
            } else if($data1['wishSecond'] == '' && $volunNum >=2) {
            	$this->showNotice("第二志愿不得为空",url('Student/edit_voluntary'));
            } else if($data1['wishThird'] == '' && $volunNum >=3) {
            	$this->showNotice("第三志愿不得为空",url('Student/edit_voluntary'));
            } else if($data1['wishForth'] == '' && $volunNum >=4) {
            	$this->showNotice("第四志愿不得为空",url('Student/edit_voluntary'));
            } else if($data1['wishFifth'] == '' && $volunNum >=5) {
            	$this->showNotice("第五志愿不得为空",url('Student/edit_voluntary'));
            }

            $result = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid', $this->user['sid'])->where('round', $data1['round'])->find();

            $bool;
	        if($result==NULL) {
	        	$bool = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->insert($data1);
	        } else {
	        	$data1['vid'] = $result['vid'];
	        	$bool = DB::table('tc_voluntary_'.$this->grades[0]['grade'])->update($data1);
	        }

	        if($bool) $this->showNotice("志愿填报成功，静候佳音吧！",url('Student/edit_voluntary'));


        }
        if($this->ontime == 1|| $this->ontime == 2)$voluntary = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$this->user['sid'])->where('round', $this->ontime)->find();
        else $voluntary = array();
        
        $this->assign('voluntary',$voluntary);
        return $this->fetch('edit_voluntary');
	}

    //最终结果页面
	public function show_result() {

		//$user = $this->auto_login();
		
		$this->assign('user',$this->user);

		if($this->user['chosen'] == '1') {

			$result = Db::table('tc_result_'.$this->grades[0]['grade'])->where('sid',$this->user['sid'])->find();
			$teacher = Db::table('user_teacher')->where('workNumber', $result['workNumber'])->find();
		    $sids = Db::table('tc_result_'.$this->grades[0]['grade'])->where("sid!=".$this->user['sid']." and "."workNumber=".$teacher['workNumber'])->select();
		    if($sids != NULL) {
		    	 $students = array();
			     $students[1] = $this->user;
			     $i=2;
			     foreach ($sids as $key => $value) {
			    	$stuinfo = Db::table('user_student_'.$this->grades[0]['grade'])->where('sid',$value['sid'])->find();    	
			    	$students[$i] = $stuinfo;
			    	$i++;
		    	 }
		    } else {
		    	$students[1] = $this->user;
		    }
			$this->assign('voluntory_teacher',$teacher);
			$this->assign('voluntory_students',$students);
			
		} else {
			//$this->assign('message',"志愿结果未出，请耐心等待!");

		}
		return $this->fetch('show_result');
	}



	//以下部分为测试数据随机生成，与项目无关


	public function hahaha() {
		for ($i=0; $i <0 ; $i++) { 
			$student[$i] = $this->datadata();
		}
		dump($student);
		Db::table('user_student_'.$grade[0]['grade'])->insertAll($student);
	}

	public function heiheihei() {
		for ($i=0; $i <70 ; $i++) { 
			$voluntary[$i]['sid'] = $i + 1;
			$voluntary[$i]['wishFirst'] = $this->wishRand()['workNumber'];
			$voluntary[$i]['wishSecond'] = $this->wishRand()['workNumber'];
			$voluntary[$i]['wishThird'] = $this->wishRand()['workNumber'];
			$voluntary[$i]['wishForth'] = $this->wishRand()['workNumber'];
			$voluntary[$i]['wishFifth'] = $this->wishRand()['workNumber'];

		}
		// dump($voluntary);
		Db::table('tc_voluntary')->insertAll($voluntary);
	}


	public function datadata() {
		$data['serialNum'] = '031402'.$this->serialNumRand();
		$data['password'] = $data['serialNum'];
		$data['name'] = $this->getRandName();

		$data['gender'] = '男';
		$data['gpa'] = $this->getRandFloat();
		$data['college'] = "数学与计算机科学学院";
		$data['department'] = "信息安全与网络工程系";
		$data['rank'] = $this->getRandRank();

		return $data;
	}


	public function wishRand() {
		$where['department'] = "信息安全与网络工程系";
		$teacher = Db::table('user_teacher')->where($where)->field('workNumber')->select();
		return $teacher[rand(0,54)];
		// dump($teacher);
	}


	public function issueRand() {
		$where['department'] = "信息安全与网络工程系";
		$teacher = Db::table('user_teacher')->where($where)->field('workNumber')->select();
		$count = count($teacher);
		for ($i=0; $i <$count ; $i++) { 
			$issue[$i]['workNumber'] = $teacher[$i]['workNumber'];
			$issue[$i]['title'] = '111';
			$issue[$i]['content'] = '111111';
			$issue[$i]['time'] = time();
			$issue[$i]['totalExper'] = rand(3,5);
			$issue[$i]['totalNatur'] = rand(4,8);
			$issue[$i]['nowExper'] = rand(0,2);
			$issue[$i]['nowNatur'] = rand(0,2);
			$issue[$i]['totalNow'] = 0;
		}
		Db::table('tc_issue')->insertAll($issue);
	}

	public function serialNumRand() {
		return mt_rand(101,601);
	}

	public function getRandName() {
		$arr = array(
		'才','放','去','个','给','齐','民','陈','燊','黄','胡','伟','炜','心','王','婷','许','颖','玲','郑','杨','羊','涛','阳','直','通','蔡','菜','辣','鸡','国','林','展','富','云','家','瑞','奇','豪','昊'
		);
		$rand1 = rand(0,39);
		$rand2 = rand(0,39);
		$rand3 = rand(0,39);
		return $arr[$rand1].$arr[$rand2].$arr[$rand3];
	}
	

	public function getRandFloat() {
		return rand(300,450)/100;
	}

	public function getRandRank() {
		return rand(1,30).'/'.rand(40,80);
	}
	

	public function oldPasswordConfirm() {
		$user = $this->auto_login();
		$grade = Db::table('tc_grade')->order('grade desc')->select();
        $student = Db::table('user_student_'.$grade[0]['grade'])->where('sid',$user['sid'])->find();

        $request = Request::instance();
        if ($request->isPost()) {
            $oldPassword = $request->post();
            if ($oldPassword['oldPW'] != $student['password']) {
                $data = false;
            }
            if ($oldPassword['oldPW'] == $student['password']) {
                $data = true;
            }
        return json($data);
        }
	}

}