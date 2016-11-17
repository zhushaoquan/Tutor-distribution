<?php
/**
 * Created by PhpStorm.
 * User: weapon
 * Date: 2016/9/15
 * Time: 12:10
 */
// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');
define('APP_DEBUG', false);

$_path = explode("/public",$_SERVER['SCRIPT_NAME']);
define('TUTOR_STATIC',"http://".$_SERVER['HTTP_HOST'].$_path[0].'/static');
define('OLD',"http://".$_SERVER['HTTP_HOST'].$_path[0].'/old');
define('STATIC',"http://".$_SERVER['HTTP_HOST'].$_path[0].'/static');

$_prefix = explode('index/',$_SERVER['SCRIPT_NAME']);
define('PREFIX', "http://".$_SERVER['HTTP_HOST'].$_prefix[0]."index");

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';