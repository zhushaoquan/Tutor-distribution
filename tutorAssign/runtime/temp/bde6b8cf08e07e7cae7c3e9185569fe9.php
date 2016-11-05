<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:79:"C:\wamp64\www\baoke2.0\public/../app/index\view\teacher\information_change.html";i:1475334442;s:66:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\layout.html";i:1474258918;s:68:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\siderbar.html";i:1474217583;s:63:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\nav.html";i:1475337835;s:66:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\footer.html";i:1476947265;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__STATIC__/css/teacher.css" />

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
            <span class="user-name"><?php echo user_type(); ?>: <?php echo (isset($user['name']) && ($user['name'] !== '')?$user['name']:"xxx"); ?></span>
        </div>
    </div>
    <div class="login-out-area">
        <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
    </div>
    <!-- <div class="path-box"></div> -->
</div>
        <div class="page-content">
            <div class="main-content">
                
<div class="table-area">
    <form class="form-horizontal form-response" role="form" action="" id="form-information" method="post">
        <div class="form-group">
            <label class="col-sm-3 control-label">姓名：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-3 control-label">选择性别：</label>
            <div class="col-sm-9">
                <select class="form-control" name="sex">
                    <option value="男" <?php if($user['sex'] == '男'): ?> selected="selected"  <?php endif; ?>>男</option>
                    <option value="女" <?php if($user['sex'] == '女'): ?> selected="selected"  <?php endif; ?>>女</option>
                </select>
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-3 control-label">选择系别：</label>
            <div class="col-sm-9">
                <div id="dep" class="hidden"><?php echo $user["department"]; ?></div>
                <select id="depselect" class="form-control" name="department">
                    <option value="">请选择专业</option>
                    <option value="计算机科学与技术">计算机科学与技术</option>
                    <option value="信息安全与网络工程">信息安全与网络工程</option>
                    <option value="软件工程">软件工程</option>
                    <option value="数学类">数学类</option>
                </select>
            </div>
        </div> -->

        <div class="form-group">
            <label class="col-sm-3 control-label">联系电话：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="telephone" value="<?php echo $user['telephone']; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">邮箱：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" />
            </div>
        </div>
       <!--  <div class="form-group">
            <label class="col-sm-3 control-label">密码：</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" placeholder="置空不修改" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">确认密码：</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="re_password" />
            </div>
        </div> -->
        <div class="submit-area">
            <button type="submit" class="btn btn-primary" id="sub-information-change">确认修改</button>
        </div>
    </form>
</div>

            </div>
        </div>
    </div>
    


<div class="footer">
    Designed by Lin & 我说的都队
</div>




</div>
<script type="text/javascript" src="__STATIC__/js/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap.js"></script>
<script type="text/javascript" src="__STATIC__/js/backstage.js"></script>

<script type="text/javascript" src="__STATIC__/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrapValidator.js"></script>
<script>
    (function ($) {
        //下拉框选中
        $("#depselect").find("option[value='"+$("#dep").html()+"']").attr("selected",true);
    })(jQuery)


</script>

</body>
</html>