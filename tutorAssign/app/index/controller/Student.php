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

	public function tutorList() {
		$user = $this->auto_login();
        
        $this->assign('user', $user);
		return $this->fetch('tutorList');
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

	public function showResult() {
		$user = $this->auto_login();
		$result = Db::table('tc_result')->where('sid',$user['sid'])->find();
		if($result != NULL) {
			$teacher = Db::table('tc_teacher')->where('workNumber', $result['workNumber'])->find();
		    $sids = Db::table('tc_result')->where("sid!=".$user['sid']." and "."workNumber=".$teacher['workNumber'])->select();
		    if($sids != NULL) {
		    	 $students = array();
			     $i = 0;
			     foreach ($sids as $key => $value) {
			    	$stuinfo = Db::table('tc_student')->where('sid',$value['sid'])->find();    	
			    	$students[$i] = $stuinfo;
			    	$i++;
		    	 }
		    } else {
		    	$students = NULL;
		    }
		    //表示有志愿结果已出
		    $this->assign('voluntory_result',1);
			$this->assign('voluntory_teacher',$teacher);
			$this->assign('voluntory_students',$students);

		} else {
			//志愿结果未出
			$this->assign('voluntory_result',0);

		}
	}

	public function editVoluntary() {
		$user = $this->auto_login();

        //可选导师为自己department的导师
		$teachers = Db::table('tc_teacher')->where('department', $user['department'])->select();
		if($teachers!=NULL) {
			$this->assign('voluntory_teachers',$teachers);
			//加载填报志愿页面；
			}


	}

	public function addVoluntary() {
		//导师工号传进来
		$request = Request::instance();
		
        if ($request->isPost()) {
            $data['wishFirst'] = $request->post('wishFirst', '');
            $data['wishSecond'] = $request->post('wishSecond', '');
            $data['wishThird'] = $request->post('wishThird', '');
            $data['wishForth'] = $request->post('wishForth', '');
            $data['wishFifth'] = $request->post('wishFifth', '');        
        }
        
/*
        $data['wishFirst'] = '00022';
        $data['wishSecond'] = '00022';
        $data['wishThird'] = '00022';
        $data['wishForth'] = '00022';
        $data['wishFifth'] = '00022';
*/
        $user = $this->auto_login();
        $data['sid'] = $user['sid'];
        $result = Db::table('tc_voluntary')->where('sid', $user['sid'])->find();
        if($result==NULL) {
        	Db::table('tc_voluntary')->insert($data);
        } else {
        	$data['vid'] = $result['vid'];
        	DB::table('tc_voluntary')->update($data);
        }

	}









}