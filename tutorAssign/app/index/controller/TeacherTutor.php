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

        
        $studentList = Db::table('tc_result')->where('workNumber',$user['workNumber'])->select();
        if($studentList!=NULL) {
        	$students = array();
        	$i=0;
        	foreach ($studentList as $key => $value) {
        		$students[$i] = Db::table('tc_student')->where('sid',$value['sid'])->find();
        		$i++;
        	}

        	echo "<br />students:.<br />";
        	var_dump($students);
        	
        }

		return $this->fetch('showResult');

	}

	public function showResultdetail($sid = null) {
		$user = $this->auto_login();
		$teacher = Db::table('tc_teacher')->where('workNumber',$user['workNumber'])->find();
		$user = $teacher;
        
        $student = Db::table('tc_student')->where('sid', $sid)->find();
        var_dump($student);
        exit;

		return $this->fetch('showResultdetail');

	}
}