<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
    public $pageSize = 6;
    public $department1 = "计算机实验班";
    public $department2 = "数学实验班";
    public $round;
    public $user;
    public $grades;
    public $issue;
    public $voluntaryinfosetting;
    public $ontime;


	public function index() {
		$user = $this->auto_login();
        $teacher = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();
        if ($teacher['avator'] == "") {
            $teacher['avatorIsEmpty'] = 1;
        }
        if ($teacher['avator'] != "") {
            $teacher['avatorIsEmpty'] = 0;
        }
		$this->assign('user', $teacher);
		return $this->fetch('index');
	}

    public function _initialize() {
        /*
        初始化函数

        初始化一些 时间设置（第几轮志愿时间等等）年级
        */

        // $this->user = $this->auto_login();  
        $user = $this->auto_login();    
  



        $this->user = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();

        // var_dump($this->user['workNumber']);
        // exit;


        $this->grades = Db::table('tc_grade')->order('grade desc')->limit(5)->select();
        $this->issue = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $this->user['workNumber'])->find();
        
        if($this->user['isExperial']==0) {
            $data = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->user['department'])->find();
        }else if($this->user['isExperial']==1) {
            $time = time();
            $data1 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->department1)->find();
            $data2 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->user['department'])->find();
            if($data1['issueStart']<=$time && $data1['confirmSecondEnd']>=$time) $data = $data1;
            else $data = $data2;

        } else if($this->user['isExperial']==2) {
            $time = time();
            $data1 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->department2)->find();
            $data2 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->user['department'])->find();
            if($data1['issueStart']<=$time && $data1['confirmSecondEnd']>=$time) $data = $data1;
            else $data = $data2;

        } else {
            //计实+数实+自然班
            $time = time();
            $data1 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->department1)->find();
            $data2 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->department2)->find();
            $data3 = Db::table('tc_voluntaryinfosetting')->where('grade',$this->grades[0]['grade'])->where('department',$this->user['department'])->find();
            if($data1['issueStart']<=$time && $data1['confirmSecondEnd']>=$time) $data = $data1;
            else if($data2['issueStart']<=$time && $data2['confirmSecondEnd']>=$time) $data = $data2;
            else $data = $data3;


        }
        $this->voluntaryinfosetting = $data;
        //var_dump($data);
        //exit;
        $nowtime = time();
        $data['voluntaryinfosetting'] = $data;
        $data['message'] = '';
        $data['ontime']= -1;

        /*
        data['time'] 当前为什么时段
        data['time'] = 0,导师提交课题时间
        data['time'] = 1,第一轮学生填报志愿时间
        data['time'] = 2,第二轮学生填报志愿时间
        data['time'] = 11,第一轮导师选择学生时间
        data['time'] = 22,第二轮导师选择学生时间
        data['time'] = 3,志愿结果已出

        */
        if(isset($data['issueStart'])) {
            if($nowtime >= $data['issueStart'] && $nowtime <= $data['issueEnd']) {
                //导师填报课题时段！
                $data['ontime'] = 0;

                $data['message'] = "当前为".$this->grades[0]['grade']."级<font color='#FF0000'>".$data['department']."</font>的导师"."<font color='#FF0000'>填报课题</font>时间：<font color='#FF0000'>".date('Y-m-d H:i',$data['issueStart'])."</font>至<font color='#FF0000'>".date('Y-m-d H:i',$data['issueEnd'])."</font>！";
                $data['voluntaryinfosetting'] = $this->voluntaryinfosetting;
                $data['message1'] = "导师所带学生总数不得超过 <font color='#FF0000'>".$data['voluntaryinfosetting']['totalMax']." </font>名，不得少于 <font color='#FF0000'> ".$data['voluntaryinfosetting']['totalMin']."</font>";
                 if($this->user['isExperial']!=0) $data['message1'].="名，实验班总人数不超过<font color='#FF0000'>".$data['voluntaryinfosetting']['experialMax']."</font>";
                 $data['message1'].="名！";
                 $this->assign('message1',$data['message1']);


                 $data['message2'] = "当前已带自然班学生<font color='#FF0000'>".$this->issue['naturNow']."</font>名";
                 if($this->user['isExperial']==1) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名";
                 } else if($this->user['isExperial']==2) {
                  $data['message2'] .= ",已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
                 } else if($this->user['isExperial']==3) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名,已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
                 }
                 $data['message2'] .="!";
                 $this->assign('message2',$data['message2']);


            }else if($nowtime <= $data['firstEnd'] && $nowtime >= $data['firstStart']) {
                $this->round = 1;
                //第一轮志愿填报
                $data['ontime'] = 1;
                $data['message'] = "当前为".$this->grades[0]['grade']."级<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第一轮的志愿填报</font>时间：<font color='#FF0000'>".date('Y-m-d H:i',$data['firstStart'])."</font>至<font color='#FF0000'>".date('Y-m-d H:i',$data['firstEnd'])."</font>！";
             } else if($nowtime  <= $data['secondEnd'] && $nowtime >= $data['secondStart']) {
                $this->round = 2;
                //第二轮志愿填报时间
                $data['ontime'] = 2;
                $data['message'] = "当前为".$this->grades[0]['grade']."级<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第二轮的志愿填报</font>时间：<font color='#FF0000'>".date('Y-m-d H:i',$data['secondStart'])."</font>至<font color='#FF0000'>".date('Y-m-d H:i',$data['secondEnd'])."</font>！";

             }else if($nowtime >= $data['confirmFirstStart'] && $nowtime <= $data['confirmFirstEnd']) {
                $this->round = 1;
                //第一轮导师选择学生时间
                $data['ontime'] = 11;
                $data['message'] = "当前为".$this->grades[0]['grade']."级<font color='#FF0000'>".$data['department']."</font>的<font color='#FF0000'>第一轮的导师选择学生</font>时间：<font color='#FF0000'>".date('Y-m-d H:i',$data['confirmFirstStart'])."</font>至<font color='#FF0000'>".date('Y-m-d H:i',$data['confirmFirstEnd'])."</font>,请导师们尽快选择学生！";
                $data['message1'] = "导师所带学生总数不得超过 <font color='#FF0000'>".$this->issue['totalNatur']." </font>名，不得少于 <font color='#FF0000'> ".$data['voluntaryinfosetting']['totalMin']."</font>名";
               if($this->user['isExperial']!=0) $data['message1'].="，实验班总人数不超过<font color='#FF0000'>".($this->issue['totalCompExper']+$this->issue['totalMathExper'])."</font>名";
               $data['message1'] .="！"; 
                $this->assign('message1',$data['message1']);


               $data['message2'] = "当前已带自然班学生<font color='#FF0000'>".$this->issue['naturNow']."</font>名";
                if($this->user['isExperial']==1) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名";
                } else if($this->user['isExperial']==2) {
                  $data['message2'] .= ",已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
                } else if($this->user['isExperial']==3) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名,已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
               }
                 $data['message2'] .="!";
                 $this->assign('message2',$data['message2']);

               $data['message3'] = "若学生被其他导师抢走，则会在刷新页面后消失！";
               $this->assign('message3',$data['message3']);


             } else if($nowtime >= $data['confirmSecondStart'] && $nowtime <= $data['confirmSecondEnd']) {
                $this->round = 2;
                //第二轮导师选择学生时间
                $data['ontime'] = 22;
                $data['message'] = "当前为".$this->grades[0]['grade']."级<font color='#FF0000'>"."</font>的<font color='#FF0000'>第二轮的导师选择学生</font>时间：<font color='#FF0000'>".date('Y-m-d H:i',$data['confirmSecondStart'])."</font>至<font color='#FF0000'>".date('Y-m-d H:i',$data['confirmSecondEnd'])."</font>,请导师们尽快选择学生！";
                
                $data['message1'] = "导师所带学生总数不得超过 <font color='#FF0000'>".$this->issue['totalNatur']." </font>名，不得少于 <font color='#FF0000'> ".$data['voluntaryinfosetting']['totalMin']."</font>名";
               if($this->user['isExperial']!=0) $data['message1'].="，实验班总人数不超过<font color='#FF0000'>".$this->issue['totalCompExper']+$this->issue['totalMathExper']."</font>名";
                $data['message1'] .="！"; 
                $this->assign('message1',$data['message1']);

               $data['message2'] = "当前已带自然班学生<font color='#FF0000'>".$this->issue['naturNow']."</font>名";
                if($this->user['isExperial']==1) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名";
                } else if($this->user['isExperial']==2) {
                  $data['message2'] .= ",已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
                } else if($this->user['isExperial']==3) {
                  $data['message2'] .= ",已带计算机实验班学生<font color='#FF0000'>".$this->issue['compExperNow']."</font>名,已带数学实验班学生<font color='#FF0000'>".$this->issue['mathExperNow']."</font>名";
               }
                 $data['message2'] .="!";
                 $this->assign('message2',$data['message2']);

                 $data['message3'] = "若学生被其他导师抢走，则会在刷新页面后消失！";
                 $this->assign('message3',$data['message3']);

             }else {
                $data['message'] = "当前不在毕设互选时间段哟~~";
             }
             $this->ontime = $data['ontime'];
             $this->assign('message',$data['message']);
             $this->assign('ontime',$data['ontime']);
             $this->assign('voluntaryinfosetting',$data);


        } else {
             $ontime = -1;
             $data['message'] = "当前不在毕设互选时间段哟~~";
             $this->assign('message',$data['message']);
             $this->assign('ontime',$data['ontime']);
             $this->assign('voluntaryinfosetting',$data);

        }
         
  
}

    public function test() {
        $user = $this->auto_login();
        $this->assign('user',$user);
        return $this->fetch('test123');
      
    }

    public function test123($it,$jt) {
        var_dump($it) ;
        exit;
     
    }

  

  public function showNotice($str, $smartMode) {
        $str = str_replace("\n", "", $str);
        echo '<!DOCTYPE HTML>';
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8" />';
        echo '<title>提示信息</title>';
        echo     '<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">';
        echo     '<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>';
        echo     '<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
        echo '</head>';
        echo '<body style="background: #ddd">';
        echo '</body>';
        echo '<script language="javascript">

                    $(document).ready(function () {
                        var popUp =
                                \'<div style="width:100%;height:500px;text-align: center;position: absolute;top: 2%;">\' +
                                \'<div class ="popStyle">\' +
                                \'<div class="modal-dialog">\' +
                                \'<div class="modal-content">\' +
                                \'<div class="modal-header">\' + \'<h4 class="modal-title" id="myModalLabel">提示信息</h4>\' +
                                \'</div>\' +
                                \'<div class="modal-body">\' + \'<p>{{$str}}</p>\' +
                                \'</div>\' +
                                \'<div class="modal-footer">\' +
                                \'<a href = "'.$smartMode.'"><button type="button" class="btn btn-info "> 关闭</button></a>\' +
                                \'</div>\' +
                                \'</div>\' +
                                \'</div>\' +
                                \'</div>\' +
                                \'</div>\'
        
                        $(\'body\').append(popUp);
                        $(\'.modal-body\').find(\'p\').text("'.addslashes($str).'");
        
                    });
                </script>';
        echo '</html>';

       
    }

     public function issue_submit() {
         $user = $this->auto_login();

         $data['voluntaryinfosetting'] = $this->voluntaryinfosetting;
         $data['issue'] = $this->issue;
         $data['issue']['content'] = htmlspecialchars_decode($data['issue']['content']);
         $request = Request::instance();
         if ($request->isPost()) {

            $data1['workNumber'] = $user['workNumber'];
            $data1['title'] = $request->post('title', '');
            $data1['content'] = $request->post('content', '');
            $data1['time'] = time();
            $data1['totalCompExper'] = intval($request->post('totalCompExper', ''));
            $data1['totalMathExper'] = intval($request->post('totalMathExper', ''));
            $data1['totalNatur'] = intval($request->post('totalNatur', ''));
            $data1['naturNow'] = $data['issue']['naturNow'];
            $data1['compExperNow'] = $data['issue']['compExperNow'];
            $data1['mathExperNow'] = $data['issue']['mathExperNow'];

            $bool = '';
            /*
            if(($data1['totalMathExper']+$data1['totalCompExper'])>$data['voluntaryinfosetting']['experialMax']) {$this->showNotice('所带实验班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));}
            if($data1['totalNatur']>($data['voluntaryinfosetting']['totalMax']-$data1['totalMathExper']-$data1['totalCompExper'])) {$this->showNotice('所带自然班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));}
            if(($data1['totalCompExper']+$data1['totalMathExper']+$data1['totalNatur'])>$data['voluntaryinfosetting']['totalMax']) {$this->showNotice('所带学生总人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));}
            if(($data1['totalCompExper']+$data1['totalMathExper']+$data1['totalNatur'])<=$data['voluntaryinfosetting']['totalMin']) {$this->showNotice('所带学生总人数未达下限，请重新输入', url('TeacherTutor/issue_submit'));}
            */

            if($this->voluntaryinfosetting['department']=="计算机实验班" && ($data1['mathExperNow']+$data1['totalCompExper']>$data['voluntaryinfosetting']['experialMax']) ) {

             
              $this->showNotice('所带实验班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));

            } else if($this->voluntaryinfosetting['department']=="数学实验班" && ($data1['totalMathExper']+$data1['compExperNow']>$data['voluntaryinfosetting']['experialMax']) ) { 

             
              $this->showNotice('所带实验班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));

            } else if( $data1['totalNatur']>($data['voluntaryinfosetting']['totalMax']-$data1['mathExperNow']-$data1['compExperNow']) ) {
             
              $this->showNotice('所带自然班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));

            } else if( ($data1['totalCompExper']+$data1['totalMathExper']+$data1['totalNatur'])<$data['voluntaryinfosetting']['totalMin'] ) {
              $this->showNotice('所带学生总人数未达下限，请重新输入', url('TeacherTutor/issue_submit'));
            } else {   
                if($this->voluntaryinfosetting['department']=="计算机实验班") {
                  $data1['totalMathExper'] =  $data['issue']['totalMathExper'];
                  $data1['totalNatur'] = $data['issue']['totalNatur'];
                } else if($this->voluntaryinfosetting['department']=="数学实验班") {
                  $data1['totalCompExper'] = $data['issue']['totalCompExper'];
                  $data1['totalNatur'] = $data['issue']['totalNatur'];
                } else {
                  $data1['totalCompExper'] = $data['issue']['totalCompExper'];
                  $data1['totalMathExper'] =  $data['issue']['totalMathExper'];
                }

                 $data1['pid'] = $data['issue']['pid'];
                 $bool = Db::table('tc_issue_'.$this->grades[0]['grade'])->update($data1);
                 if($bool == 1) {
                    $this->showNotice('课题修改成功', url('TeacherTutor/issue_submit'));      
                 } 

            }
             
        }
        $this->assign('voluntaryinfosetting',$data['voluntaryinfosetting']);
        $this->assign('issue', $data['issue']);
        $this->assign('user', $user);
        return $this->fetch('issue_submit');

    }

   



    public function student_list() {
        $user = $this->auto_login();
        $teacher = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();

        $students = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->alias('v')->join('user_student_'.$this->grades[0]['grade'].' s','v.sid = s.sid')
                                            ->where(function ($query) {
                                                $query->where('v.wishFirst', $this->user['workNumber'])
                                                      ->where('v.firstReject', 0)
                                                      ->where('s.chosen' ,0)
                                                      ->where('v.round',$this->round);
                                             })
                                            ->whereOr(function ($query) {
                                                $query->where('v.wishSecond', $this->user['workNumber'])
                                                      ->where('v.secondReject', 0)
                                                      ->where('s.chosen' ,0)
                                                      ->where('v.round',$this->round);
                                             })
                                            ->whereOr(function ($query) {
                                                $query->where('v.wishThird', $this->user['workNumber'])
                                                      ->where('v.thirdReject', 0)
                                                      ->where('s.chosen' ,0)
                                                      ->where('v.round',$this->round);
                                             })
                                            ->whereOr(function ($query) {
                                                $query->where('v.wishForth', $this->user['workNumber'])
                                                      ->where('v.forthReject', 0)
                                                      ->where('s.chosen' ,0)
                                                      ->where('v.round',$this->round);
                                             })
                                            ->whereOr(function ($query) {
                                                $query->where('v.wishFifth', $this->user['workNumber'])
                                                      ->where('v.fifthReject', 0)
                                                      ->where('s.chosen' ,0)
                                                      ->where('v.round',$this->round);
                                             })
                                             ->paginate($this->pageSize);
        $this->assign('students',$students);
        $this->assign('user', $teacher);

        $request = Request::instance();
        if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['sid'] = $request->post('sid', '');
            if($data1['sid']) {
                $accept = $request->post('choise','');
                if($accept=="选择") {
                      $where['workNumber'] = $user['workNumber'];
                      $stu = Db::table('user_student_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->find();
                      $issue = $this->issue;
                      if($this->voluntaryinfosetting['department']==$this->department1 && $stu['department']==$this->department1 && $issue['compExperNow'] >= $issue['totalCompExper']) {
                          $this->showNotice('目前所带计算机实验班人数达到上限，选择失败！',url('TeacherTutor/student_list'));
                      } else if($this->voluntaryinfosetting['department']==$this->department2 && $stu['department']==$this->department2 && $issue['mathExperNow'] >= $issue['totalMathExper']) {
                          $this->showNotice('目前所带数学实验班人数达到上限，选择失败！',url('TeacherTutor/student_list'));
                      } else if($this->voluntaryinfosetting['department']!=$this->department1 && $this->voluntaryinfosetting['department']!=$this->department2 && $issue['naturNow'] >= $issue['totalNatur']) { 
                          $this->showNotice('目前所带自然班人数达到上限，选择失败！',url('TeacherTutor/student_list'));
                      } else {
                          if($stu['chosen']==0) {
                              Db::startTrans();
                              try{

                                  Db::table('user_student_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->setField('chosen',1);
                                  $bool = Db::table('tc_result_'.$this->grades[0]['grade'])->insert($data1);
                                  if($stu['department']==$this->department1) {
                                       Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('compExperNow',1);
                                  } else if($stu['department']==$this->department2) {
                                       Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('mathExperNow',1);
                                  } else { 
                                       Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('naturNow',1);
                                  }
                                  // 提交事务
                                  Db::commit();    
                              } catch (\Exception $e) {
                                  // 回滚事务
                                  Db::rollback();
                              }

                              if($bool) {
                                  $this->showNotice('选择成功',url('TeacherTutor/student_list'));
                              } else {
                                  $this->showNotice('对不起，您的手速太慢了，学生都被抢光啦！',url('TeacherTutor/student_list'));
                              }
                          } else {
                                  $this->showNotice('对不起，您的手速太慢了，学生都被抢光啦！',url('TeacherTutor/student_list'));
                              } 

                      }

              } else {
                  //拒绝
                  $tmp = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->find();
                  $bool = 1;
                  if($tmp['wishFirst']==$data1['workNumber']) {
                      $bool = $bool && Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->setField('firstReject',1);
                  } 
                  if($tmp['wishSecond']==$data1['workNumber']) {
                      $bool = $bool && Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->setField('secondReject',1);
                  } 
                  if($tmp['wishThird']==$data1['workNumber']) {
                      $bool = $bool && Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->setField('thirdReject',1);
                  } 
                  if($tmp['wishForth']==$data1['workNumber']) {
                      $bool = $bool && Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->setField('forthReject',1);
                  } 
                  if($tmp['wishFifth']==$data1['workNumber']) {
                      $bool = $bool && Db::table('tc_voluntary_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->where('round',$this->round)->setField('fifthReject',1);
                  } 
                  if($bool) {
                      $this->showNotice('拒绝成功',url('TeacherTutor/student_list'));
                  }
              } 

                 

        } else {

                $this->showNotice('你的网络粗错啦😝',url('TeacherTutor/student_list'));
              } 

       }
            
        
        return $this->fetch('student_list');
    }



    public function show_result() {
        $user = $this->auto_login();
        $grade_now = "";

        $request = Request::instance();
         if ($request->isPost()) {
          $grade_now = $request->post('grade_now');
         } else {
          $grade_now = $this->grades[0]['grade'];
         }
        

        $studentList = Db::table('tc_result_'.$grade_now)->alias('r')->join('user_student_'.$grade_now.' s', 'r.sid=s.sid')->where('workNumber',$user['workNumber'])->order('serialNum asc')->select();
        /*
        $studentList = Db::table('tc_result_'.$grade_now)->where('workNumber',$user['workNumber'])->select();
        $students = array();
        if($studentList!=NULL) {
            $i=1;
            foreach ($studentList as $key => $value) {
                $students[$i] = Db::table('user_student_'.$grade_now)->where('sid',$value['sid'])->order('serialNum desc')->find();
                $i++;
            }
        }*/
        $this->assign('grades', $this->grades);
        $this->assign('grade_now', $grade_now);
        $this->assign('user', $user);
        $this->assign('students',$studentList);
        return $this->fetch('show_result');

    }

    public function show_resultdetail($sid = null,$grade = null) {
        $user = $this->auto_login();
        if($grade == null) {
          $grade = $grades[0]['grade'];
        }
       
        $student = Db::table('user_student_'.$grade)->alias('s')->join('tc_voluntary_'.$grade.' v' ,'v.sid = s.sid')->where('s.sid', $sid)->find();
        if ($student['avator'] == "") {
          $student['avatorIsEmpty'] = 1;
        } else {
          $student['avatorIsEmpty'] = 0;
        }
        $this->assign('student', $student);
        $this->assign('user', $user);
        return $this->fetch('information_detail');
    }

     public function show_resultdetail_1($sid = null,$grade = null) {
        $user = $this->auto_login();
        if($grade == null) {
          $grade = $grades[0]['grade'];
        }
       
        $student = Db::table('user_student_'.$grade)->alias('s')->join('tc_voluntary_'.$grade.' v' ,'v.sid = s.sid')->where('s.sid', $sid)->find();
        if ($student['avator'] == "") {
          $student['avatorIsEmpty'] = 1;
        } else {
          $student['avatorIsEmpty'] = 0;
        }
        $this->assign('student', $student);
        $this->assign('user', $user);
        return $this->fetch('information_detail_1');
    }


    public function show_studentdetail($sid)
    {
      //接口
     if($sid!=NULL) {
      // $data['student']=DB::table('user_student_'.$this->grades[0]['grade'])->where('sid',$sid)
      //                                                           //->field('name,serialNum')
      //                                                           ->find();

      $data['student']=DB::table('user_student_'.$this->grades[0]['grade'])->alias('s')->join('tc_voluntary_'.$this->grades[0]['grade'].'  v','s.sid = v.sid')->where('s.sid',$sid)
                                                                ->find();

      if($data['student']['wishFirst'] == $this->user['workNumber'])$data['student']['voluntary'] = "第一志愿";
      else if($data['student']['wishSecond'] == $this->user['workNumber'])$data['student']['voluntary'] = "第二志愿";
      else if($data['student']['wishThird'] == $this->user['workNumber'])$data['student']['voluntary'] = "第三志愿";
      else if($data['student']['wishForth'] == $this->user['workNumber'])$data['student']['voluntary'] = "第四志愿";
      else $data['student']['voluntary'] = "第五志愿";

     } else {
      $data['student'] = "学号不得为空！";
     }
      return json($data);
    }


//meiyongde
    public function show_student11()
    {
      $sid = 1;
      $data['student']=DB::table('user_student_'.$this->grades[0]['grade'])->alias('s')->join('tc_voluntary_'.$this->grades[0]['grade'].'  v','s.sid = v.sid')->where('s.sid',$sid)
                                                                ->find();
      var_dump($data);
      
    }





    //  public function show_studentdetail($sid)
    // {
    //   //接口
    //  if($sid!=NULL) {
    //   $data['student']=DB::table('user_student_'.$this->grades[0]['grade'])->alias('s')->join('tc_voluntary_'.$this->grades[0]['grade'].' v','v.sid = s.sid')->where('sid',$sid)
    //                                                             //->field('name,serialNum')
    //                                                             ->find();
    //  } else {
    //   $data['student'] = "学号不得为空！";
    //  }
    //   return json($data);
    // }




    public function modify() {
        $user = $this->auto_login();
        $teacher = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();

        if ($teacher['avator'] == "") {
            $teacher['avatorIsEmpty'] = 1;
        }
        if ($teacher['avator'] != "") {
            $teacher['avatorIsEmpty'] = 0;
        }

        $this->assign('user',$teacher);
        return $this->fetch('modify');
    }



    public function oldPasswordConfirm() {
        $user = $this->auto_login();
        $teacher = Db::table('user_teacher')->where('workNumber',$user['workNumber'])->find();

        $request = Request::instance();
        if ($request->isPost()) {
            $oldPassword = $request->post();
            if ($oldPassword['oldPW'] != $teacher['password']) {
                $data = false;
            }
            if ($oldPassword['oldPW'] == $teacher['password']) {
                $data = true;
            }
        return json($data);
        }
    }

    public function saveModify() {
        $user = $this->auto_login();
        $where['workNumber'] = $user['workNumber'];
        $request = Request::instance();

        //获取上传的头像的信息
        $avator = request()->file('avator');
        if ($avator != "") {
            $avatorInfo = $avator->move('../uploads/teacher');
            if ($avatorInfo) {
                $temp['ava'] = explode("..", $avatorInfo->getPathName());
                $data['avator'] = $temp['ava'][1];
            }
        }

        if ($request->isPost()) {
            $password = $request->post('newPasswordConfirm');
            if ($password == "") {
                $data['password'] = $user['password'];
            } else {
                $data['password'] = $request->post('newPasswordConfirm');
            }

            $data['telephone'] = $request->post('telephone');
            $data['email'] = $request->post('email');
            $data['description'] = $request->post('description');

            if (Db::table('user_teacher')->where($where)->update($data)) {
                $this->success("信息修改成功!",url('index'));
            } else {
                $this->error("信息尚未修改，请修改信息后再次提交修改!",url('modify'));
            }
        }

    }


}