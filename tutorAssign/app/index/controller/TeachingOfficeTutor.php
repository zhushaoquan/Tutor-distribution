<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeachingOfficeTutor extends BaseController {
	
	public function index() {
		$user = $this->auto_login();
		$officer = Db::table('user_teaching_office')->where('workNumber',$user['workNumber'])->find();
		
		$this->assign('user', $officer);
		return $this->fetch('index');
	}
}