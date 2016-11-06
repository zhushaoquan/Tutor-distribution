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
}