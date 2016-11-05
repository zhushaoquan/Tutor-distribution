<?php
//通用函数

defined('APP_WEB_ROOT') or define('APP_WEB_ROOT',dirname(__DIR__));
defined('LIB_PATH')     or define('LIB_PATH',APP_WEB_ROOT.'/lib');

if(file_exists(__DIR__.'/config.php')){
    C(include __DIR__.'/config.php');
}

/**
 * 获取和设置配置参数 支持批量定义
 * @param string|array $name 配置变量
 * @param mixed $value 配置值
 * @param mixed $default 默认值
 * @return mixed
 */
function C($name = null, $value = null, $default = null){
    static $_config = array();
    // 无参数时获取所有
    if (empty($name)) {
        return $_config;
    }
    // 优先执行设置获取或赋值
    if (is_string($name)) {
        if (!strpos($name, '.')) {
            $name = strtoupper($name);
            if (is_null($value)) {
                return isset($_config[$name]) ? $_config[$name] : $default;
            }

            $_config[$name] = $value;
            return null;
        }
        // 二维数组设置和获取支持
        $name    = explode('.', $name);
        $name[0] = strtoupper($name[0]);
        if ($value === null) {
            return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
        }

        $_config[$name[0]][$name[1]] = $value;
        return null;
    }
    // 批量设置
    if (is_array($name)) {
        $_config = array_merge($_config, array_change_key_case($name, CASE_UPPER));
        return null;
    }
    return null; // 避免非法参数
}
/**
* 获取数据库连接
* @return mysql_object
*/
function get_db(){
    static $db = null;

    if($db === null){
        $db = @mysql_connect(C('DB_HOST'),C('DB_USER'),C('DB_PWD'));
        if (!$db){
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db(C('DB_NAME'), $db);
        mysql_query("SET NAMES '".C('DB_CHARSET')."'");
    }

    return $db;
}

/**
* 跳转函数
* @param string $message 显示的信息
* @param string $jumpUrl 目的url地址
* @param int    $ajax   等待时间
* @return void
*/
function jump_success($message = '', $jumpUrl = '', $ajax = false) {
    dispatchJump($message, 1, $jumpUrl, $ajax);
}

function jump_error($message = '', $jumpUrl = '', $ajax = false) {
    dispatchJump($message, 0, $jumpUrl, $ajax);
}
function dispatchJump($message, $status = 1, $jumpUrl = '', $ajax = false) {
    if($status){
        //如果是显示成功的跳转
        $waitSecond = 1;
        // 默认操作成功自动返回操作前页面
        $jumpUrl = empty($jumpUrl) ? $_SERVER["HTTP_REFERER"] : $jumpUrl;

    }else{
        //如果是显示失败的跳转
        $waitSecond = 3;
        $error = $message;
        // 默认发生错误的话自动返回上页
        $jumpUrl = empty($jumpUrl) ? "javascript:history.back(-1);" : $jumpUrl;
    }

    include LIB_PATH.'/tpl/dispatch_jump.php';
    // 中止执行  避免出错后继续执行
    exit;
}
