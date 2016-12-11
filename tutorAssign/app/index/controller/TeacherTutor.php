<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
    public $pageSize = 5;
    public $department1 = "计算机实验班";
    public $department2 = "数学实验班";

    public $user;
    public $grades;
    public $issue;
    public $voluntaryinfosetting;
    public $ontime;
    //public $teachers ;
   // public $time = "";
   
    //public $voluntaryinfoSetting = Db::table('tc_voluntaryinfoSetting_'.$this->grades[0]['grade'])->find();
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

        $this->user = $this->auto_login();    
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
        $nowtime = time();
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
                $data['message'] = "当前为导师"."<font color='#FF0000'>填报课题</font>时间：".date('Y-m-d',$data['issueStart'])."至".date('Y-m-d',$data['issueEnd'])."！"."<font color='#FF0000'>第一轮志愿填报</font>时间为".date('Y-m-d',$data['firstStart'])."至".date('Y-m-d',$data['firstEnd'])."! <font color='#FF0000'>第二轮志愿填报</font>时间为".date('Y-m-d',$data['secondStart'])."至".date('Y-m-d',$data['secondEnd'])."!";


                     $data['voluntaryinfosetting'] = $this->voluntaryinfosetting;

                     $data['message1'] = "导师所带学生总数不得超过 <font color='#FF0000'>".$data['voluntaryinfosetting']['totalMax']." </font>名，不得少于 <font color='#FF0000'> ".$data['voluntaryinfosetting']['totalMin']."</font>名";
                     if($user['isExperial']!=0) $data['message1'].="，实验班总人数不超过<font color='#FF0000'>".$data['voluntaryinfosetting']['experialMax']."</font>名！";

            }else if($nowtime < $data['firstEnd'] && $nowtime > $data['firstStart']) {
                //第一轮志愿填报
                $data['ontime'] = 1;
                $data['message'] = "当前为<font color='#FF0000'>第一轮的志愿填报</font>时间：".date('Y-m-d',$data['firstStart'])."至".date('Y-m-d',$data['firstEnd'])."！";
             } else if($nowtime  < $data['secondEnd'] && $nowtime > $data['secondStart']) {
                //第二轮志愿填报时间
                $data['ontime'] = 2;
                $data['message'] = "当前为<font color='#FF0000'>第二轮的志愿填报</font>时间：".date('Y-m-d',$data['secondStart'])."至".date('Y-m-d',$data['secondEnd'])."！";

             }else if($nowtime >= $data['confirmFirstStart'] && $nowtime <= $data['confirmFirstEnd']) {
                //第一轮导师选择学生时间
                $data['ontime'] = 11;
                $data['message'] = "当前为<font color='#FF0000'>第一轮的导师选择学生</font>时间：".date('Y-m-d',$data['confirmFirstStart'])."至".date('Y-m-d',$data['confirmFirstEnd']).",请导师们尽快选择学生！";

             } else if($nowtime >= $data['confirmSecondStart'] && $nowtime <= $data['confirmSecondEnd']) {
                //第二轮导师选择学生时间
                $data['ontime'] = 22;
                $data['message'] = "当前为<font color='#FF0000'>第二轮的导师选择学生</font>时间：".date('Y-m-d',$data['confirmSecondStart'])."至".date('Y-m-d',$data['confirmSecondEnd']).",请导师们尽快选择学生！";

             }else {
                $data['message'] = "当前不在填报志愿时间段内！";
                
             }

             $this->ontime = $data['ontime'];
             $this->assign('message',$data['message']);
             $this->assign('ontime',$data['ontime']);
             $this->assign('voluntaryinfosetting',$data);


        } else {
             $ontime = -1;
             $data['message'] = "当前不在填报志愿时间段内！";
             $this->assign('message',$data['message']);
             $this->assign('ontime',$data['ontime']);
             $this->assign('voluntaryinfosetting',$data);

        }
         
  
}

    public function test() {
        $user = $this->auto_login();
        $this->assign('user',$user);
        return $this->fetch('test123');
       //  exit;
       //  $user = $this->auto_login();
       //  $where['department'] = $this->department1;
       //  $where['wishFirst'] = $user['workNumber'];
       //  $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')->where($where)->select();
       // var_dump( $students );
       // exit;

    }

    public function test123($it,$jt) {
        var_dump($it) ;
        exit;
     
    }
    public function showNotice($str, $smartMode) {
        $str = str_replace("\n", "", $str);
        echo '<DOCTYPE HTML>';
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8" />';
        echo '<title>提示信息</title>';
        echo '</head>';
        echo '<body>';
        echo '<script language="javascript">';
        echo "alert('".addslashes($str)."');";
        echo 'window.location.href="'.$smartMode.'";';
        echo '</script>';
        echo '</body>';
        echo '</html>';
        exit;
    }

     public function issue_submit() {
         $user = $this->auto_login();
     /*    
         $data = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $user['workNumber'])->find();
         $res = Db::table('tc_voluntaryinfosetting_'.$this->grades[0]['grade'])->find();
         $data['nowtime'] = time();
         $data['message'] = '';
         $data['issueStart'] = $res['issueStart'];
         $data['issueEnd'] = $res['issueEnd'];
         $data['voluntaryinfosetting'] = $this->voluntaryinfosetting;

         $data['message1'] = "导师所带学生总数不得超过 <font color='#FF0000'>".$data['voluntaryinfosetting']['totalMax']." </font>名，不得少于 <font color='#FF0000'> ".$data['voluntaryinfosetting']['totalMin']."</font>名";
         if($user['isExperial']==1) $data['message1'].="，实验班总人数不超过<font color='#FF0000'>".$data['voluntaryinfosetting']['experialMax']."</font>名！";

         if($data['nowtime'] < $data['issueStart'] || $data['nowtime'] > $data['issueEnd']) {
            $data['message'] = "填报课题时间为<font color='#FF0000'>".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."</font>当前不在填报课题时间段";
            $data['ontime'] = 0;
         } else {
            $data['message'] = "填报课题时间为<font color='#FF0000'>".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."</font>，请尽快填报";
            $data['ontime'] = 1;
         }*/

         $data['voluntaryinfosetting'] = $this->voluntaryinfosetting;
         $data['issue'] = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $user['workNumber'])->find();
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
            if(($data1['totalMathExper']+$data1['totalCompExper'])>$data['voluntaryinfosetting']['experialMax']) {$this->showNotice('所带实验班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if($data1['totalNatur']>($data['voluntaryinfosetting']['totalMax']-$data1['totalMathExper']-$data1['totalCompExper'])) {$this->showNotice('所带自然班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if(($data1['totalCompExper']+$data1['totalMathExper']+$data1['totalNatur'])>$data['voluntaryinfosetting']['totalMax']) {$this->showNotice('所带学生总人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if(($data1['totalCompExper']+$data1['totalMathExper']+$data1['totalNatur'])<=$data['voluntaryinfosetting']['totalMin']) {$this->showNotice('所带学生总人数未达下限，请重新输入', url('TeacherTutor/issue_submit'));exit;}

             if(isset($data['issue']['pid'])) {
                $data1['pid'] = $data['issue']['pid'];
                $data1['totalNow'] = $data['issue']['totalNow'];
                $bool = Db::table('tc_issue_'.$this->grades[0]['grade'])->update($data1);
             } else {
                $data1['totalNow'] = 0;
                $bool = Db::table('tc_issue_'.$this->grades[0]['grade'])->insert($data1);
             }
             if($bool == 1) {
                $this->showNotice('课题修改成功', url('TeacherTutor/issue_submit'));      
             } 
             
        }
        $this->assign('voluntaryinfosetting',$data['voluntaryinfosetting']);
        $this->assign('issue', $data['issue']);
        $this->assign('user', $user);
        return $this->fetch('issue_submit');

    }

    

    public function student_list($page=1) {
        $user = $this->auto_login();
/*
        $data = Db::table('tc_voluntaryinfosetting')->find();
        $data['nowtime'] = time();
        $data['message'] = '';
        $data['ontime']=1;
        if($data['nowtime'] < $data['firstEnd'] && $data['nowtime'] > $data['firstStart']) {
            $data['message'] = "当前为第一轮的导师确认学生时间：".date('Y-m-d',$data['firstStart'])."至".date('Y-m-d',$data['firstEnd']).",请导师们按时确认学生！";

         } else if($data['nowtime'] < $data['secondEnd'] && $data['nowtime'] > $data['secondStart']) {
            $data['message'] = "当前为第二轮的导师确认学生时间：".date('Y-m-d',$data['secondStart'])."至".date('Y-m-d',$data['secondEnd']).",请导师们按时确认学生！";

         } else {
            $data['message'] = "当前不在导师确认学生时间段内！";
            $data['ontime'] = 0;
         }

         $this->assign('message', $data['message']);
         $this->assign('ontime', $data['ontime']);
        */

        $where['wishFirst|wishSecond|wishThird|wishForth|wishFifth'] = $user['workNumber'];
        $students = Db::table('tc_voluntary_'.$this->grades[0]['grade'])->alias('v')->join('user_student s','v.sid = s.sid')
                                            ->where($where)
                                            ->page($page,$this->pageSize)->select();
        $total = count(Db::table('tc_voluntary')->where($where)
                                            ->select()
                      );
        $totalPage = ceil($total/$this->pageSize);
        $pageBar = [
            'total'     => $total,
            'totalPage' => $totalPage+1,
            'pageSize'  => $this->pageSize,
            'curPage'   => $page
            ];

        $this->assign($pageBar);
        $this->assign('students',$students);
        $this->assign('user', $user);

        $request = Request::instance();
        if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['sid'] = $request->post('sid', '');
            $accept = $request->post('choise','');
            if($accept=="选择") {

                $issue = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $user['workNumber'])->find();
                $where['workNumber'] = $user['workNumber'];
                //$where['department'] = $department;
                $issue = $this->issue;
                if($issue['totalExprNow'] >= ($issue['totalExper']+$issue['totalNatur'])) {
                    $this->showNotice('目前所带实验班人数达到上限，选择失败！','TeacherTutor/student_list');
                    /*
                    $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                    if($tmp['wishFirst']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                    } 
                    if($tmp['wishSecond']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                    } 
                    if($tmp['wishThird']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                    } 
                    if($tmp['wishForth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                    } 
                    if($tmp['wishFifth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                    } 
                    */
                }
                $bool = Db::table('tc_result')->insert($data1);
                Db::table('tc_voluntary')->where('sid',$data1['sid'])->delete();
                Db::table('user_student')->where('sid',$data1['sid'])->setField('chosen',1);
                Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
                if($bool) {
                    $this->showNotice('选择成功',url('TeacherTutor/student_list'));
                }

            } else {
                $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                $bool = 1;
                if($tmp['wishFirst']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                } 
                if($tmp['wishSecond']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                } 
                if($tmp['wishThird']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                } 
                if($tmp['wishForth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                } 
                if($tmp['wishFifth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                } 
                if($bool) {
                    $this->showNotice('拒绝成功',url('TeacherTutor/student_list'));
                }
            }
        }
        return $this->fetch('student_list');
    }

    public function student_list1($page=1) {
        $user = $this->auto_login();

        $data = Db::table('tc_voluntaryinfosetting_'.$this->grades[0]['grade'])->find();
        $data['nowtime'] = time();
        $data['message'] = '';
        $data['ontime']=1;
        if($data['nowtime'] < $data['firstEnd'] && $data['nowtime'] > $data['firstStart']) {
            $data['message'] = "当前为第一轮的导师确认学生时间：".date('Y-m-d',$data['firstStart'])."至".date('Y-m-d',$data['firstEnd']).",请导师们按时确认学生！";
         } else if($data['nowtime'] < $data['secondEnd'] && $data['nowtime'] > $data['secondStart']) {
            $data['message'] = "当前为第二轮的导师确认学生时间：".date('Y-m-d',$data['secondStart'])."至".date('Y-m-d',$data['secondEnd']).",请导师们按时确认学生！";

         } else {
            $data['message'] = "当前不在导师确认学生时间段内！";
            $data['ontime'] = 0;
         }

         $this->assign('message', $data['message']);
         $this->assign('ontime', $data['ontime']);


        $department = "";
        if($user['isExperial'] ==1) { 
            $department = $this->department1;} else {
            $department = $this->department2;    
        }
        $where['wishFirst|wishSecond|wishThird|wishForth|wishFifth'] = $user['workNumber'];
        $where['department'] = $department;
        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                            ->where($where)
                                            ->page($page,$this->pageSize)->select();

       
        $total = count(Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                            ->where($where)
                                            ->select());
                      
        $totalPage = ceil($total/$this->pageSize);
        $pageBar = [
            'total'     => $total,
            'totalPage' => $totalPage+1,
            'pageSize'  => $this->pageSize,
            'curPage'   => $page
            ];

        $this->assign($pageBar);
        $this->assign('students',$students);
        $this->assign('user', $user);

        $request = Request::instance();
        if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['sid'] = $request->post('sid', '');
            $accept = $request->post('choise','');
            if($accept=="选择") {
                $issue = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $user['workNumber'])->find();
                $where['workNumber'] = $user['workNumber'];
                $where['department'] = $department;
                $issue['totalExprNow'] = count(Db::table('tc_result')->alias('r')->join('user_student s', 'r.sid = s.sid')->where($where)->select());
                if($issue['totalExprNow'] >= $issue['totalExper']) {
                    $this->showNotice('目前所带实验班人数达到上限，选择失败！','TeacherTutor/student_list2');
                    /*
                    $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                    if($tmp['wishFirst']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                    } 
                    if($tmp['wishSecond']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                    } 
                    if($tmp['wishThird']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                    } 
                    if($tmp['wishForth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                    } 
                    if($tmp['wishFifth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                    } 
                    */
                }
                $bool = Db::table('tc_result')->insert($data1);
                Db::table('tc_voluntary')->where('sid',$data1['sid'])->delete();
                Db::table('user_student')->where('sid',$data1['sid'])->setField('chosen',1);
                Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
                if($bool) {
                    $this->showNotice('选择成功',url('TeacherTutor/student_list'));
                }
            } else {
                $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                $bool = 1;
                if($tmp['wishFirst']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                } 
                if($tmp['wishSecond']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                } 
                if($tmp['wishThird']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                } 
                if($tmp['wishForth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                } 
                if($tmp['wishFifth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                } 
                if($bool) {
                    $this->showNotice('拒绝成功',url('TeacherTutor/student_list'));
                }
            }
        }
        return $this->fetch('student_list');
    }

    public function student_list2($page=1) {
        $user = $this->auto_login();

        $data = Db::table('tc_voluntaryinfosetting_'.$this->grades[0]['grade'])->find();
        $data['nowtime'] = time();
        $data['message'] = '';
        $data['ontime']=1;
        if($data['nowtime'] < $data['firstEnd'] && $data['nowtime'] > $data['firstStart']) {
            $data['message'] = "当前为第一轮的导师确认学生时间：".date('Y-m-d',$data['firstStart'])."至".date('Y-m-d',$data['firstEnd']).",请导师们按时确认学生！";
         } else if($data['nowtime'] < $data['secondEnd'] && $data['nowtime'] > $data['secondStart']) {
            $data['message'] = "当前为第二轮的导师确认学生时间：".date('Y-m-d',$data['secondStart'])."至".date('Y-m-d',$data['secondEnd']).",请导师们按时确认学生！";

         } else {
            $data['message'] = "当前不在导师确认学生时间段内！";
            $data['ontime'] = 0;
         }

         $this->assign('message', $data['message']);
         $this->assign('ontime', $data['ontime']);



        $where['wishFirst|wishSecond|wishThird|wishForth|wishFifth'] = $user['workNumber'];
        $where['department'] = $user['department'];

        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                             ->where($where)
                                             ->page($page,$this->pageSize)->select();
        $total = count(Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                                ->where($where)
                                                ->select()
                      );
        $totalPage = ceil($total/$this->pageSize);
        $pageBar = [
            'total'     => $total,
            'totalPage' => $totalPage+1,
            'pageSize'  => $this->pageSize,
            'curPage'   => $page
            ];
        
        
        $this->assign($pageBar);
        $this->assign('students',$students);
        $this->assign('user', $user);

        $request = Request::instance();
        if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['sid'] = $request->post('sid', '');
            $accept = $request->post('choise','');
            if($accept=="选择") {
                $issue = Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber', $user['workNumber'])->find();
                $where['workNumber'] = $user['workNumber'];
                $where['department'] = $user['department'];
                $issue['totalNaturNow'] = count(Db::table('tc_result')->alias('r')->join('user_student s', 'r.sid = s.sid')->where($where)->select());
                if($issue['totalNaturNow'] >= $issue['totalNatur']) {
                    $this->showNotice('目前所带自然班人数达到上限，选择失败！','TeacherTutor/student_list2');
                    /*
                    $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                    if($tmp['wishFirst']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                    } 
                    if($tmp['wishSecond']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                    } 
                    if($tmp['wishThird']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                    } 
                    if($tmp['wishForth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                    } 
                    if($tmp['wishFifth']==$data1['workNumber']) {
                         Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                    } 
                    */
                }
                $bool = Db::table('tc_result')->insert($data1);
                Db::table('tc_voluntary')->where('sid',$data1['sid'])->delete();
                Db::table('user_student')->where('sid',$data1['sid'])->setField('chosen',1);
                Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
                if($bool) {
                    $this->showNotice('选择成功',url('TeacherTutor/student_list'));
                }

            } else {
                $tmp = Db::table('tc_voluntary')->where('sid',$data1['sid'])->find();
                $bool = 1;
                if($tmp['wishFirst']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFirst',NULL);
                } 
                if($tmp['wishSecond']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishSecond',NULL);
                } 
                if($tmp['wishThird']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishThird',NULL);
                } 
                if($tmp['wishForth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishForth',NULL);
                } 
                if($tmp['wishFifth']==$data1['workNumber']) {
                    $bool = $bool && Db::table('tc_voluntary')->where('sid',$data1['sid'])->setField('wishFifth',NULL);
                } 
                if($bool) {
                    $this->showNotice('拒绝成功',url('TeacherTutor/student_list'));
                }
            }
        }
        return $this->fetch('student_list');
    }

    
    public function show_result($grade_now = null) {
        if($grade_now == null) $grade_now = $this->grades[0]['grade'];
        $user = $this->auto_login();
        $studentList = Db::table('tc_result_'.$grade_now)->where('workNumber',$user['workNumber'])->select();
        $students = array();
        if($studentList!=NULL) {
            $i=1;
            foreach ($studentList as $key => $value) {
                $students[$i] = Db::table('user_student_'.$this->grade_now)->where('sid',$value['sid'])->find();
                $i++;
            }
        }
/*
        $res = Db::table('tc_voluntaryinfosetting')->find();
        $res['nowtime'] = time();
        $data['message'] = '';
        $data['firstStart'] = $res['firstStart'];
        $data['secondStart'] = $res['secondStart'];
        $data['firstEnd'] = $res['firstEnd'];
        $data['secondEnd'] = $res['secondEnd'];
        if($res['nowtime'] < $res['firstEnd'] && $res['nowtime'] > $res['firstStart']) {
            $data['message'] = "当前为第一轮的志愿互选时间：".date('Y-m-d',$res['firstStart'])."至".date('Y-m-d',$res['firstEnd']);
         } else if($res['nowtime'] < $res['secondEnd'] && $res['nowtime'] > $res['secondStart']) {
            $data['message'] = "当前为第二轮的志愿互选时间：".date('Y-m-d',$res['secondStart'])."至".date('Y-m-d',$res['secondEnd']);

         } else {
            $data['message'] = "当前不在志愿互选时间段内！";
         }

        $this->assign('message',$data['message']);
        */
        $this->assign('user', $user);
        $this->assign('students',$students);
        return $this->fetch('show_result');

    }

    public function show_resultdetail($sid = null) {
        $user = $this->auto_login();
        
        
        $student = Db::table('user_student')->where('sid', $sid)->find();

        $this->assign('student', $student);
        var_dump($student);
        exit;
        $this->assign('user', $user);
        return $this->fetch('show_resultdetail');

    }



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
                $data['password'] = $request->post('oldPassword');
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