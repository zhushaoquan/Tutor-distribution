<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class Student extends BaseController {

	public function index() {
		$user = $this->auto_login();
        
        $this->assign('user', $user);
		return $this->fetch('index');
	}

	public function tutorList() {
		$user = $this->auto_login();
        
        $this->assign('user', $user);
		return $this->fetch('tutorList');
	}
}