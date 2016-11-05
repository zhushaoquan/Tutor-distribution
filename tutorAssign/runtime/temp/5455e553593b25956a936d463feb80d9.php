<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:69:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\test\index.html";i:1474252292;s:72:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\common\layout.html";i:1474258918;s:74:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\common\siderbar.html";i:1474217583;s:69:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\common\nav.html";i:1474217583;s:72:"D:\wamp3\wamp64\www\baoke2.0\public/../app/index\view\common\footer.html";i:1474217583;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教师报课管理系统</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/backstage.css" />
    
<!-- css -->

</head>
<body>
<div id="container-backstage" class="clearfix">
    <div id="siderbar">
    <nav class="sider-navbar">
        <div class="sider-navbar-header">
            <img src="__STATIC__/image/mainpage-logo.png" alt="" width="240">
        </div>
        <ul class="sider-navbar-nav">
            <?php if(is_array($menus) || $menus instanceof \think\Collection): if( count($menus)==0 ) : echo "" ;else: foreach($menus as $key=>$item): ?>
            <li <?php if($item['is_now']): ?> class="active"<?php endif; ?>>
                <a href="<?php echo $item['url']; ?>"><i class="glyphicon glyphicon-<?php echo $item['icon']; ?>"></i><?php echo $item['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </nav>
</div>

    <div id="mainpage">
        <div class="top-nav">
    <div class="user-area">
        <div class="hello-user">
            <span><i class="glyphicon glyphicon-user"></i>欢迎您,</span>
            <span class="user-name"><?php echo (isset($user['name']) && ($user['name'] !== '')?$user['name']:"xxx"); ?></span>
        </div>
    </div>
    <div class="login-out-area">
        <a href="#"><i class = "glyphicon glyphicon-off"></i>退出</a>
    </div>
    <!-- <div class="path-box"></div> -->
</div>
        <div class="page-content">
            <div class="main-content">
                


            </div>
        </div>
    </div>
    


<div class="footer">
    Designed by Lin
</div>




</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>



</body>
</html>