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


	public function matchSetting() {
		$user = $this->auto_login();
		$head = Db::table('user_department_head')->where('workNumber',$user['workNumber'])->find();
		

		$this->assign('user', $head);
		return $this->fetch('match_setting');

	}

    public function timeSetting(){
        $user = $this->auto_login();
        return $this->fetch('time_setting');
    }

    /*=================================
     * 用于接口测试                    *
     *================================*/
    public function hello($name = '某某你'){
        $result = "";
        foreach ($_SERVER as $k => $v){
            $result.= $k."=>".$v."<br/><br/>";
        }


        return $result;
    }
}