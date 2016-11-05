<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class Index extends BaseController
{
    public function index()
    {
        $userinfo = self::auto_login();
        $this->redirect(url(Session::get('user_type').'/index'));
    }


    public function test() {
        $a = "hello world 中秋快乐";
        $this->assign('a', $a);

        return $this->fetch();
    }
}
