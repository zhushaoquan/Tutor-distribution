<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"D:\wamp64\www\Tutor-distribution\tutorAssign\public/../app/index\view\department_head_tutor\time_setting.html";i:1479472168;}*/ ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>毕设导师智能分配系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo TUTOR_STATIC; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/backstage.css">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/student.css">
    <link href="<?php echo OLD; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo OLD; ?>/css/department_time.css">
    <style type="text/css">
        .sider-navbar-nav li {
            color: #fff;
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>

<body cz-shortcut-listen="true">


<div id="container-backstage" class="clearfix">
    <div id="siderbar">
        <nav class="sider-navbar">
            <div class="sider-navbar-header">
                <img src="<?php echo OLD; ?>/image/mainpage-logo.png" alt="" width="240">
            </div>
            <ul class="sider-navbar-nav">
                <a href="<?php echo url('DepartmentHeadTutor/index'); ?>"><li><i class="glyphicon glyphicon-user"></i> 个人信息</li></a>
                <li><i class="glyphicon glyphicon-th-list"></i> 学生管理</li>
                <li><i class="glyphicon glyphicon-pencil"></i> 导师管理</li>
                <a href="<?php echo url('DepartmentHeadTutor/timeSetting'); ?>"><li class="active"><i class="glyphicon glyphicon-time"></i> 时间设置</li></a>
                <a href="<?php echo url('DepartmentHeadTutor/matchSetting'); ?>"><li><i class="glyphicon glyphicon-ok"></i> 匹配结果</li></a>
                <li><i class="glyphicon glyphicon-download-alt"></i> 结果导出</li>
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
                <a href="<?php echo url('BaseController/logout'); ?>"><i class="glyphicon glyphicon-off"></i>退出</a>
            </div>
        </div>
        <div class="page-content" style="min-height: 595px;">
            <div class="main-content" style="border-radius: 10px; padding: 20px; min-height: 555px;">
                <div role="alert" class="alert alert-info" style="margin-bottom: 0">
                    <?php if($settingInfo['empty'] == 1): ?>
                        <p>提示：您还未设置毕设导师分配的时间</p>
                        <?php else: ?>
                        <p>提示：您已设置毕设导师分配的时间，可进行时间修改</p>
                    <?php endif; ?>
                </div>
                <form action="<?php echo url('DepartmentHeadTutor/infoSetting'); ?>" method="post" onsubmit="return validate()"
                      role="form">
                    <div class="separate form-horizontal">
                        <fieldset>
                            <legend>学生人数设置</legend>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12">最多人数</label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        <input class="form-control" value="<?php echo $settingInfo['totalMax']; ?>" type="number" id="student-num-max"
                                               name="totalMax" round="" style="border-radius: 3px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12">最少人数</label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        <input class="form-control" value="<?php echo $settingInfo['totalMin']; ?>" type="number" id="student-num-min"
                                               name="totalMin" round="" style="border-radius: 3px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12 ">默认人数</label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        <input class="form-control" value="<?php echo $settingInfo['defaultNum']; ?>" type="number" id="student-num-default"
                                               name="defaultNum" round="" style="border-radius: 3px">
                                    </div>
                                </div>
                                <div class="blank"></div>
                            </div>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12">&nbsp;&nbsp;志愿数</label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        <input class="form-control" value="<?php echo $settingInfo['voluntaryNum']; ?>" type="number" id="wish-num"
                                               name="voluntaryNum" round="" style="border-radius: 3px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12">最多人数<br/><span style="font-size: 12px;text-align: center;">(实验班)</span></label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        <input class="form-control" value="<?php echo $settingInfo['experialMax']; ?>" type="number" id="student-num-max-expri"
                                               name="experialMax" round="" style="border-radius: 3px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-12"><br/></label>
                                    <div class="input-group col-md-8 col-sm-12">
                                        
                                    </div>
                                </div>
                                <div class="blank"></div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="separate form-horizontal">
                        <fieldset>
                            <legend>选题时间</legend>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label for="research-start" class="col-md-3 control-label">起始时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="research-start" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['issueStart']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="issueStart" id="research-start" value="<?php echo $settingInfo['issueStart']; ?>"/><br/>
                                </div>
                                <div class="form-group">
                                    <label for="research-end" class="col-md-3 control-label">截止时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="research-end" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['issueEnd']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="issueEnd" id="research-end" value="<?php echo $settingInfo['issueEnd']; ?>"/><br/>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="separate form-horizontal">
                        <fieldset>
                            <legend>志愿填报时间</legend>
                            <p>第一轮</p>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label for="wish-start-first" class="col-md-3 control-label">起始时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="wish-start-first" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['firstStart']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="firstStart" id="wish-start-first" value="<?php echo $settingInfo['firstStart']; ?>"/><br/>
                                </div>
                                <div class="form-group">
                                    <label for="wish-end-first" class="col-md-3 control-label">截止时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="wish-end-first" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['firstEnd']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="firstEnd" id="wish-end-first" value="<?php echo $settingInfo['firstEnd']; ?>"/><br/>
                                </div>
                            </div>
                            <p>第二轮</p>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label for="wish-start-second" class="col-md-3 control-label">起始时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="wish-start-second" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['secondStart']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="secondStart" id="wish-start-second" value="<?php echo $settingInfo['secondStart']; ?>"/><br/>
                                </div>
                                <div class="form-group">
                                    <label for="wish-end-second" class="col-md-3 control-label">截止时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="wish-end-second" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['secondEnd']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="secondEnd" id="wish-end-second" value="<?php echo $settingInfo['secondEnd']; ?>"/><br/>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="separate form-horizontal">
                        <fieldset>
                            <legend>导师选择时间</legend>
                            <p>第一轮</p>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label for="teacher-start-first" class="col-md-3 control-label">起始时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="teacher-start-first" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['confirmFirstStart']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="confirmFirstStart" id="teacher-start-first"
                                           value="<?php echo $settingInfo['confirmFirstStart']; ?>"/><br/>
                                </div>
                                <div class="form-group">
                                    <label for="teacher-end-first" class="col-md-3 control-label">截止时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="teacher-end-first" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['confirmFirstEnd']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="confirmFirstEnd" id="teacher-end-first" value="<?php echo $settingInfo['confirmFirstEnd']; ?>"/><br/>
                                </div>
                            </div>
                            <p>第二轮</p>
                            <div class="div-flex">
                                <div class="form-group">
                                    <label for="teacher-start-second" class="col-md-3 control-label">起始时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="teacher-start-second" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['confirmSecondStart']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="confirmSecondStart" id="teacher-start-second"
                                           value="<?php echo $settingInfo['confirmSecondStart']; ?>"/><br/>
                                </div>
                                <div class="form-group">
                                    <label for="teacher-end-second" class="col-md-3 control-label">截止时间</label>
                                    <div class="input-group date form_datetime col-md-8" data-date=""
                                         data-date-format="yyyy-mm-dd hh:ii "
                                         data-link-field="teacher-end-second" data-link-format="yyyy-mm-dd hh:ii">
                                        <input class="form-control" size="16" type="text" value="<?php echo $settingInfo['confirmSecondEnd']; ?>" readonly>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" name="confirmSecondEnd" id="teacher-end-second"
                                           value="<?php echo $settingInfo['confirmSecondEnd']; ?>"/><br/>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-group form-group-search button">
                        <input id="btn-submit" class="btn btn-info size" type="submit">
                        </input>
                    </div>
                </form>
            </div>
            <div class="footer" style="border-radius: 10px;">
                Designed by Lin &amp; 我说的都队
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo OLD; ?>/js/index.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/jquery2.14.min.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo OLD; ?>/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
<script type="text/javascript">
    function validate() {
        var form2to4 = $("input:hidden");
        var form1 = $("input[type='number']");

        var form1_flag = validateForm(form1, 1)
        var form2to4_flag = validateForm(form2to4, 2);
        return form1_flag && form2to4_flag;
    }

    function validateForm(form, option) {
        var flag = false;
        console.log(form.length);
        for (var i = 0; i < form.length; ++i) {
            var item = form[i];
            if (item.value === "") {
                if (option === 2) {
                    $("#" + item.id).prev().addClass("has-error");
                } else if (option == 1) {
                    $("#" + item.id).parent().addClass("has-error");
                }
                console.log(item.id);
                flag = true;
            }
        }
        if (flag) {
            return false;
        }
        return true;
    }

</script>
<script type="text/javascript">
    $("input").click(function () {
        $(this).parent().removeClass("has-error");
        console.log($(this).parent().parent());
    });
    $("span.input-group-addon").click(function () {
        $(this).parent().removeClass("has-error");
        console.log($(this).parent().parent());
    });
</script>
</body>
</html>
