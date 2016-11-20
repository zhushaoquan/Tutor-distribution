<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use think\Db;

class BaseController extends Controller {

    /*
     *  若已登录返回登录信息，若未登录，重定向到登录页面
     */
    public function auto_login($type = null) {
        if (!$this->hasLogin($type)) {
            $this->redirect(url('BaseController/login'));
        }
        return Session::get('user');
    }

    public function login() {
        $request = Request::instance();
        if ($request->isPost()) {
            $login_name = $request->post('login-user', '');
            $login_pass = $request->post('login-password', '');
            $login_type = $request->post('login-type', '');
            if ($login_type == 'student') {
                $user = Db::table('user_student')->where('serialNum',$login_name)->find();
            } else {
                $table = Db::table('user_' . $login_type);
                $user = $table->where('workNumber',$login_name)->find();
            }
            if(empty($user) || $user["password"] != $login_pass) {
                //错误
                //return json(array("success"=>false, "msg"=> "账号或密码错误"));
                $this->error("帐号或密码错误，请重新登录",url('login'));
            }
            Session::set('user', $user);
            Session::set('user_type', $login_type);
            if ($request->isAjax()) {
                return json(array("success" => true, "data" => array('url' => url($login_type.'/index'))));
            }else {
                $this->success("登录成功",url($login_type.'/index'));
            }
            // dump($user);
            // return url($login_type.'/index');
        }

        //如果到达teacherDeadline  状态要从0变成1
        //如果到达departmentDeadline  要从1变2
        $now = date('Ymd');
        Db::table('task_info')->where([
            'teacherDeadline'=>['<', $now],
            'taskState'=>0,
        ])->update(['taskState'=>1]);

        Db::table('task_info')->where([
            'departmentDeadline'=>['<', $now],
            'taskState'=>1,
        ])->update(['taskState'=>2]);


        return $this->fetch('common/login');
    }

    public function hasLogin($type = null) {
        if ($type == null) {
            return Session::has('user');
        }
        return Session::has('user') && (Session::get('user_type') != $type);
    }

    public function logout() {
        Session::delete('user');
        if(Request::instance()->isAjax()) {
            return json(array("success"=>true,"data"=>url('BaseController/login')));
        }
        $this->redirect(url('BaseController/login'));
        return '';
    }

    public function refresh_user() {
        $user = Session::get('user');
        $table = Db::table('user_' . Session::get('user_type'));
        $user = $table->find($user["workNumber"]);
        Session::set('user', $user);
        $this->assign('user', $user);
    }

    public function make_menu($menus) {
        $request = Request::instance();
        $menu = array();
        foreach ($menus as $item) {
            $menu[$item[0]] = array(
                "url"  => url($item[0]),
                "name" => $item[1],
                "icon" => $item[2],
                "is_now" => $request->action() == $item[0] || in_array($request->action(), $item[3]),
            );
        }
        return $menu;
    }

    public function translate($name) {
        static $template = [
            "tc_com_exc"    =>"计算机科学与技术（卓越班）",
            "tc_com_nor"    =>"计算机科学与技术",
            "tc_com_ope"    =>"计算机（实验班）",
            "tc_math_nor"   =>"数学专业",
            "tc_math_ope"   =>"数学类（实验班）",
            "tc_inf_sec"    =>"信息安全",
            "tc_net_pro"    =>"网络工程",
            "tc_soft_pro"   =>"软件工程",
            "tc_mathsub_ope" =>"数学与应用数学（实验班）",
            "tc_infcom_ope" =>"信息与计算科学（实验班） ",
        ];
        $name = preg_replace('/[0-9]/','', $name);
        return isset($template[$name]) ? $template[$name] : "未命名";
    }

    public function successJson($data = '') {
        return json(array('success'=>true, 'data'=>$data));
    }

    public function errorJson($data = '') {
        return json(array('success'=>false, 'data'=>$data));
    }

}