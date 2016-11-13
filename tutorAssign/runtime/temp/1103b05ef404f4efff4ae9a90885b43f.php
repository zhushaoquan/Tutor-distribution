<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:100:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\teaching_office\add_baoke.html";i:1478959888;s:88:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\common\layout.html";i:1478959888;s:90:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\common\siderbar.html";i:1478959888;s:85:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\common\nav.html";i:1478959888;s:88:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\common\footer.html";i:1478959888;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__STATIC__/css/teaching-office.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrapValidator.css" />

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
                
<div class="form-area">
    <div class="alert alert-info" role="alert">
        <p>提示一:“同一年份、同一学期、同专业“的报课表只能有一份，重复上传会覆盖原课表！若原报课表已有教师报课，将丢失数据</p>
        <p>提示二:若上传时，使用Excel2003及以上版本或WPS的表格，请把文件另存为.xls后缀的文件再上传！</p>
    </div>


    <form class="form-horizontal form-response" role="form" action="" id="form-new-class" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-3 control-label">选择学年：</label>
            <div class="col-sm-9">
                <select class="form-control" name="year" id="select-year">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-3 control-label">选择学期：</label>
            <div class="col-sm-9">
                <select class="form-control" name="semester">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                </select>
            </div>
        </div>
        <div class="form-group  has-feedback" data-date-format="yyyy-mm-dd">
            <label  class="col-sm-3 control-label">报课截止日期：</label>
            <div class="col-sm-9 ">
                <input type="text"  name="teacherDeadline" class="datepick form-control" id="input-teacherDeadline" required />
                <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
            </div>
        </div>
        <div class="form-group has-feedback">
            <label  class="col-sm-3 control-label" >审核截止日期：</label>
            <div class="col-sm-9">
                <input type="text" name="departmentDeadline"  class="datepick form-control" id="input-departmentDeadline" required>
                <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-3 control-label">选择表格文件：</label>
            <div class="col-sm-9">
                <input type="file" name="tableFile" required>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-3 control-label">选择对应专业：</label>
            <div class="col-sm-9">
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_soft_pro"  checked>
                        软件工程
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_com_nor" >
                        计算机专业
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_com_ope">
                        计算机（实验班）
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_com_exc" />计算机（卓越班）
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_net_pro" />网络工程专业
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_math_nor" />数学专业
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_math_ope" />数学类（实验班）
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="major" value="tc_inf_sec" />信息安全专业
                    </label>
                </div>
            </div>
        </div>
        <div class="submit-area">
            <button type="submit" class="btn btn-info" id="sub-new-class">确认创建</button>
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
    /*api*/
    api = {
        new_class:''
    };
    $('.datepick').datepicker({
        "dates":"cn",
        "format": 'yyyy/mm/dd',
        "autoclose": true
    });

    /*生成学年下拉框选项*/
    var nowDate = new Date();
    var year = nowDate.getFullYear();
    for(var i=0;i<3;i++)
    {
        $("#select-year").append('<option value="'+year+'">'+year+'</option>');
        year++;
    }

    /*表单异步提交*/
    // $("#sub-new-class").click(function(e){
    // 	e.preventDefault();
    // 	var bootstrapValidator = $("#form-new-class").data('bootstrapValidator');
    // 	    bootstrapValidator.validate();
    // 	var data = $("#form-new-class").serializeArray();
    // 	data = JSON.stringify(data);
    // 	console.log(data);
    // 	// $.post(api.new_class,data,function(result){
    // 	// 	if(result.success==true){
    // 	// 		alert(添加成功);

    // 	// 	}
    // 	// 	else{
    // 	// 		alert(result);
    // 	// 	}
    // 	// });
    // 	 // var bootstrapValidator = $("#form-new-class").data('bootstrapValidator');
    // 	 //   bootstrapValidator.validate();
    // 	 //  if(bootstrapValidator.isValid()){

    // 	 //      data = jsonData(data);
    // 	 //      console.log(data);

    // 	 //  }


    //     	});

    /*表单序列化函数*/
    function jsonData(arr){
        var jsonStr={};
        $(arr).each(function(i,ele){
            $(jsonStr).attr(ele.name,ele.value);
        });
        return jsonStr;
    }
    /*表单验证*/
    // 	$(function(){
    // 		$('#form-new-class').bootstrapValidator({
    //       message: '表单无法提交',
    //       feedbackIcons: {
    //           valid: 'glyphicon glyphicon-ok',
    //           invalid: 'glyphicon glyphicon-remove',
    //           validating: 'glyphicon glyphicon-refresh'
    //       },
    //       fields: {
    //           teacherDeadline: {
    //               message: 'The username is not valid',
    //               validators: {
    //                   notEmpty: {
    //                       message: '不能为空'
    //                   },
    //                   regexp: {
    //                       message: '报课截止日期不能大于审核截止日期',
    //                       callback:function(value, validator,$field,options){
    // 		            var departmentDeadline = $("input-departmentDeadline").val();
    // 		            return parseInt(value)<=parseInt(departmentDeadline);
    // 				}
    // 			}
    //               }
    //           },
    //           departmentDeadline: {
    //               validators: {
    //                   notEmpty: {
    //                       message: '不能为空'
    //                   }/*,
    //                   regexp: {
    //                       message: '审核截止日期不能小于报课截止日期',
    //                       callback:function(value, validator,$field,options){
    // 		            var teacherDeadline = $("input-teacherDeadline").val();
    // 		            return parseInt(value)>=parseInt(teacherDeadline);
    // 				}
    // 			}*/
    //               }
    //           }
    //      	}
    // });
    // 	});
</script>

</body>
</html>