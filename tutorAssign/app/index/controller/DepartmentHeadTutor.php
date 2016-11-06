<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class DepartmentHeadTutor extends BaseController {
	
	public function index() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		

		$this->assign('user', $head);
		return $this->fetch('index');
	}
}