<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
	
	public function index() {
		$user = $this->auto_login();
		$teacher = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();
		if ($user['isExperial'] == 0) {
			$teacher['isExperial'] = '否';
		} else {
			$teacher['isExperial'] = '是';
		}
		$this->assign('user', $teacher);
		return $this->fetch('index');
	}
}