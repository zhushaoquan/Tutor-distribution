<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function user_type($type = null) {
    static $map = [
        "teacher"=>"教师",
        "department_head"=>"系负责人",
        "teaching_office"=>"教学办",
        "student"=>"学生"
    ];
    if ($type == null) {
        $type = \think\Session::get('user_type');
    }
    return $map[$type];
}