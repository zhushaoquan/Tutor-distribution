<?php
namespace app\index\controller;

class Test extends Teacher {

    public function _empty($name) {
        $this->_initialize();
        $user = $this->auto_login();
        $this->assign('user', $user);
        return $this->fetch($name);
    }

    public function index() {
        $this->_initialize();
        $user = $this->auto_login();
        $this->assign('user', $user);
        return $this->fetch();
    }




}