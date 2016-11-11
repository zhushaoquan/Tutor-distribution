<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
	
	public function index() {
		$user = $this->auto_login();
		$teacher = Db::table('tc_teacher')->where('workNumber',$user['workNumber'])->find();
		$user = $teacher;
/*		

//wtt修改

		if ($user['isExperial'] == 0) {
			$teacher['isExperial'] = '否';
		} else {
			$teacher['isExperial'] = '是';
		}
*/
		$this->assign('user', $teacher);
		return $this->fetch('index');
	}
    
    public function issueSubmit() {
    	 $user = $this->auto_login();
		 $teacher = Db::table('tc_teacher')->where('workNumber',$user['workNumber'])->find();
		 $user = $teacher;



         return $this->fetch('issueSubmit');

    }


    public function studentList() {
    	$user = $this->auto_login();
		$teacher = Db::table('tc_teacher')->where('workNumber',$user['workNumber'])->find();
		$user = $teacher;


    	return $this->fetch('studentList');


    }

    
	public function showResult() {
		$user = $this->auto_login();
		$teacher = Db::table('tc_teacher')->where('workNumber',$user['workNumber'])->find();
		$user = $teacher;


		return $this->fetch('showResult');

	}
}