<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\response\Redirect;

class Test extends BaseController
{
    public function index()
    {
        return $this->fetch("test_head_manager");
    }

    public function auto_assign2(){
        return $this->fetch("auto_assign2");
    }

    public function redirectToPage() {
    	return $this->fetch('redirectPage');
    }

    public function maintain() {
        return $this->fetch('maintain');
    }
}