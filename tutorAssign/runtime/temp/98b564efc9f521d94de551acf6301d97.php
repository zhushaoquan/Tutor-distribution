<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\common\login.html";i:1475249831;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教师报课系统-登录</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/login.css" />
    <script type="text/javascript" src="__STATIC__/js/index.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
</head>
<body>

<!-- 弹出框 -->
<div class="login-alert" id="login-alert">
    <div class="alert alert-info" role="alert">
        <p>账号或密码不正确,登录失败！</p>
    </div>
</div>

<div class="container">


    <div id="login-box">
        <form action="<?php echo url('baseController/login'); ?>" class="form-signin" id="login-form" role="form" method="post">
            <div id="login-head">
                <img src="__STATIC__/image/form-logo1.png"></div>
            <div class="form-group">
                <input type="text" placeholder="工号:"  class="form-control"  name="login-user" required ></div>
            <div class="form-group">
                <input placeholder="密码:"  type="password"  class="form-control"  name="login-password" required />
            </div>
            <div id="iden" class="checkbox">
                <label>
                    <input type="radio" name="login-type" value="teacher"  checked="checked" />
                    教师
                </label>
                <label>
                    <input type="radio" name="login-type" value="department_head" />
                    系负责人
                </label>
                <label>
                    <input type="radio" name="login-type" value="teaching_office" />
                    教学办
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" id="sub-login">登录</button>
            </div>
        </form>
    </div>
</div>
<div id="footer">
    <p>Designed by Lin</p>
</div>
</body>
<script>
    api = {
        "login":"<?php echo url('baseController/login'); ?>"
    };
    /*表单提交按钮点击事件*/
    $("#sub-login").click(function(){
        var data = $("#login-form").serializeArray();
        data = jsonData(data);
        // console.log(data);
        $.post(api.login,data,function(result){
            if(result.success==true){
                /*跳转到系统首页*/
                location.href = result.data.url;
            }
            else{
                console.log(result);
                /*弹窗提示密码错误*/
                $("#login-alert").slideDown(600);
                setTimeout(function(){
                    $("#login-alert").slideUp(600);
                },3000);
            }
        });
        return false;
    });

    //将serializeArray()结果转化成一个json对象
    function jsonData(arr){
        var jsonStr={};
        $(arr).each(function(i,ele){
            $(jsonStr).attr(ele.name,ele.value);
        });
        return jsonStr;
    }
</script>
</html>