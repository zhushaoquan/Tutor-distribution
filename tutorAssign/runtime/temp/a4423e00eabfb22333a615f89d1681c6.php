<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"C:\wamp64\www\tutorAssign\public/../app/index\view\department_head\information.html";i:1475335548;s:69:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\layout.html";i:1474258918;s:71:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\siderbar.html";i:1474217583;s:66:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\nav.html";i:1478312500;s:69:"C:\wamp64\www\tutorAssign\public/../app/index\view\common\footer.html";i:1476947265;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__STATIC__/css/department_head.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap-table.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap-editable.css" />

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
        <!-- <a href="<?php echo url('BaseController/back'); ?>"><i class = "glyphicon glyphicon-arrow-left"></i>返回</a> -->
        <a href="<?php echo url('BaseController/logout'); ?>"><i class = "glyphicon glyphicon-off"></i>退出</a>
    </div>
    <!-- <div class="path-box"></div> -->
</div>
        <div class="page-content">
            <div class="main-content">
                
<div class="alert-area">
    <!-- 这里加载目前的个人信息 -->
    
    <table class="table table-bordered table-hover table-search-result" id="deparment_head_info">
        <tr>
            <th>工号</th>
            <th>姓名</th>
            <th>性别</th>
          <!--   <th>所属系别</th> -->
            <th>电话</th>
            <th>邮箱</th>
        </tr>
        <tr>
            <td><?php echo $user['workNumber']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['sex']; ?></td>
         <!--    <td><?php echo $user['department']; ?></td> -->
            <td><?php echo $user['telephone']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
    </table>
    
    <table class="table table-bordered table-hover table-search-result" id="deparment_head_major">
        <tr>
            <th>所负责的专业</th>
            <?php if(is_array($majors) || $majors instanceof \think\Collection): if( count($majors)==0 ) : echo "" ;else: foreach($majors as $key=>$row): ?>
            <td><?php echo $row['major_name']; ?></td>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tr>
    </table>

</div>
<div class="table-area">

    <form class="form-horizontal form-response" role="form" action="<?php echo url('information'); ?>" id="form-information" method="post">
        <div class="form-group">
            <label class="col-sm-3 control-label">姓名：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-3 control-label" name="sex">选择性别：</label>
            <div class="col-sm-9">
                <select class="form-control">
                    <option value="男" <?php if($user['sex'] == '男'): ?> selected="selected"  <?php endif; ?>>男</option>
                    <option value="女" <?php if($user['sex'] == '女'): ?> selected="selected"  <?php endif; ?>>女</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">选择系别：</label>
            <div id="dep" class="hidden"><?php echo $user["department"]; ?></div>
            <div class="col-sm-9">
                <select class="form-control" name="department" id="depselect">
                    <option value="计算机科学与技术">计算机科学与技术</option>
                    <option value="信息安全与网络工程">信息安全与网络工程</option>
                    <option value="信息安全与网络工程">软件工程</option>
                    <option value="软件工程">软件工程</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">联系电话：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="telephone" value="<?php echo $user['telephone']; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">邮箱：</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">密码：</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">确认密码：</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="re_password" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">所负责的专业：</label>
            <div class="col-sm-9">
                <input type="checkbox"   name="major[]" value="tc_soft_pro"/>软件工程
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_com_nor" />计算机类、计算机科学与技术
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_com_ope" />计算机科学与技术（实验班）
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_com_exc" />计算机科学与技术（卓越班）
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_net_pro" />网络工程
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_inf_sec" />信息安全专业
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_mathsub_ope" />数学与应用数学（实验班）
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_math_nor" />数学类、数学与应用数学、信息与计算科学
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_math_ope" />数学类（实验班）
                </br> </br>
                <input type="checkbox" name="major[]" value="tc_infcom_ope" />信息与计算科学（实验班）
                </br> </br>

            </div>
        </div>
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

<script type="text/javascript" src="__STATIC__/js/bootstrap-table.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap-table-zh-CN.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap-editable.js"></script>
<script type="text/javascript" src="__STATIC__/js/bootstrap-table-editable.js"></script>
<script>
    (function ($) {
        //下拉框选中
        $("#depselect").find("option[value='"+$("#dep").html()+"']").attr("selected",true);
    })(jQuery)


</script>
<script>
    var data ="";
    var user = '{name:"sss",age:1,area:"hexi",hobby:["movie","music"]}';
    $.post('<?php echo url("information_json"); ?>',data,function(result){
        loadData($("#form-information"),result);
    });
    function loadData(form,jsonStr){
        var obj = jsonStr;
        var key,value,tagName,type,arr;
        for(x in obj){
            key = x;
            value = obj[x];

            form.find($("[name='"+key+"'],[name='"+key+"[]']")).each(function(){
                tagName = $(this)[0].tagName;
                type = $(this).attr('type');
                if(tagName=='INPUT'){
                    if(type=='radio'){
                        $(this).attr('checked',$(this).val()==value);
                    }else if(type=='checkbox'){

                        arr = value.toString().split(',');
                        for(var i =0;i<arr.length;i++){
                            if($(this).val()==arr[i]){
                                $(this).attr('checked',true);
                                break;
                            }
                        }
                    }else{
                        $(this).val(value);
                    }
                }else if(tagName=='SELECT' || tagName=='TEXTAREA'){
                    $(this).val(value);
                }

            });
        }
    }
</script>

</body>
</html>