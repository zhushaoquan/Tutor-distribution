<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class Student extends BaseController {
	public $department_1 = "计算机实验班";
	public $department_2 = "数学实验班";
    public $pageSize = 5;
	public function index() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
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
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        
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

			if (Db::table('user_student')->where($where)->update($data)) {
				$this->success("信息修改成功!",url('index'));
			} else {
				$this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
			}
		}
	}

	public function tutor_list($page=1) {

		$user = $this->auto_login();
		if($user['department'] == $this->department_1) {
			$teachers = Db::table('user_teacher')->where('isExperial',1)->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('isExperial',1)->select());
			$totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];

		} else if($user['department'] == $this->department_2) {
			$teachers = Db::table('user_teacher')->where('isExperial',2)->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('isExperial',2)->select());
			$totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		} else {
			$teachers = Db::table('user_teacher')->where('department',$user['department'])->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('department',$user['department'])->select());
			$totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		}

	// dump($pageBar);
		$this->assign($pageBar);
		$this->assign('teachers',$teachers);
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
		if($user['department'] == $this->department_1) {
			$tutors = Db::table('user_teacher')->where('isExperial',1)->select();
		} else if($user['department'] == $this->department_2) {
			$tutors = Db::table('user_teacher')->where('isExperial',2)->select();
		} else {
			$tutors = Db::table('user_teacher')->where('department',$user['department'])->select();
		}
        $res = Db::table('tc_voluntaryinfosetting')->find();
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
         if($user['chosen']==1) $data['message'] = "导师志愿互选结果已出！";
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
            $bool;
	        if($result==NULL) {
	        	$bool = Db::table('tc_voluntary')->insert($data1);
	        } else {
	        	$data1['vid'] = $result['vid'];
	        	$bool = DB::table('tc_voluntary')->update($data1);
	        }

	        if($bool) $this->showNotice("志愿填报成功，静候佳音吧！",url('Student/edit_voluntary'));


        }
        $voluntary = Db::table('tc_voluntary')->where('sid',$user['sid'])->find();
        $this->assign('voluntary',$voluntary);
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


	//以下部分为测试数据随机生成，与项目无关


	public function hahaha() {
		for ($i=0; $i <0 ; $i++) { 
			$student[$i] = $this->datadata();
		}
		dump($student);
		Db::table('user_student')->insertAll($student);
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
        $student = Db::table('user_student')->where('sid',$user['sid'])->find();

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