<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:71:"C:\wamp64\www\baoke2.0\public/../app/index\view\teacher\table_list.html";i:1474301799;s:66:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\layout.html";i:1474258918;s:68:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\siderbar.html";i:1474217583;s:63:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\nav.html";i:1475337835;s:66:"C:\wamp64\www\baoke2.0\public/../app/index\view\common\footer.html";i:1476947265;}*/ ?>
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
                
<div class="alert-area">
    <div role="alert" class="alert alert-info">
        <p>提示一:想查看填写完的报课情况 请在左侧导航选择“查看报课”进行查看</p>
        <p>提示二:填写报课时请务必小心核对，一旦提交无法更改</p>
    </div>
</div>
<div class="table-area">
    <table class="table table-bordered table-hover table-search-result">
        <tbody><tr>
            <th>课表名称</th>
            <th>所属专业</th>
            <th>报课截止日期</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($data) || $data instanceof \think\Collection): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
        <tr>
            <td><?php echo $row['courseName']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            <td>
                <a href="<?php echo url('table_fill',['table'=>'cb_'.$row['relativeTable']]); ?>">填写</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody></table>
    <?php if(empty($data) || ($data instanceof \think\Collection && $data->isEmpty())): ?>
    <div role="alert" class="alert alert-success">
        <p>当前暂无可填写的报课表</p>

    </div>
    <?php endif; ?>
    <?php echo $page; ?>
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



</body>
</html>