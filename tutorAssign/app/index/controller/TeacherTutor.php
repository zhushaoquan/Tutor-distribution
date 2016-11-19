<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
    public $pageSize = 5;
    public $department1 = "计算机实验班";
    public $department2 = "数学实验班";
    //public $voluntaryinfoSetting = Db::table('tc_voluntaryinfoSetting')->find();
	public function index() {
		$user = $this->auto_login();

/*		

//wtt修改

		if ($user['isExperial'] == 0) {
			$teacher['isExperial'] = '否';
		} else {
			$teacher['isExperial'] = '是';
		}
*/
		$this->assign('user', $user);
		return $this->fetch('index');
	}
    public function test() {
        $user = $this->auto_login();
        $where['department'] = $this->department1;
        $where['wishFirst'] = $user['workNumber'];
        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')->where($where)->select();
       var_dump( $students );
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
         
         $data = Db::table('tc_issue')->where('workNumber', $user['workNumber'])->find();
         $res = Db::table('tc_voluntaryinfoSetting')->find();
         $data['nowtime'] = time();
         $data['message'] = '';
         $data['issueStart'] = $res['issueStart'];
         $data['issueEnd'] = $res['issueEnd'];
         $data['voluntaryinfoSetting'] = Db::table('tc_voluntaryinfoSetting')->find();
         $data['message1'] = "导师所带学生总数不得超过".$data['voluntaryinfoSetting']['totalMax']."名，不得少于".$data['voluntaryinfoSetting']['totalMin']."名";
         if($user['isExperial']==1) $data['message1'].="，实验班总人数不超过".$data['voluntaryinfoSetting']['experialMax']."名！";
         if($data['nowtime'] < $data['issueStart'] || $data['nowtime'] > $data['issueEnd']) {
            $data['message'] = "填报课题时间为".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."当前不在填报课题时间段";
            $data['ontime'] = 0;
         } else {
            $data['message'] = "填报课题时间为".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."，请尽快填报";
            $data['ontime'] = 1;
         }
         $data['issue'] = Db::table('tc_issue')->where('workNumber', $user['workNumber'])->find();

         $request = Request::instance();
         if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['totalExper'] = intval($request->post('totalExper', ''));
            $data1['totalNatur'] = intval($request->post('totalNatur', ''));
            $data1['title'] = $request->post('title', '');
            $data1['content'] = $request->post('content', '');
            $data1['time'] = time();
            $bool = '';
            if($data1['totalExper']>$data['voluntaryinfoSetting']['experialMax']) {$this->showNotice('所带实验班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if($data1['totalNatur']>($data['voluntaryinfoSetting']['totalMax']-$data1['totalExper'])) {$this->showNotice('所带自然班人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if(($data1['totalExper']+$data1['totalNatur'])>$data['voluntaryinfoSetting']['totalMax']) {$this->showNotice('所带学生总人数超出上限，请重新输入', url('TeacherTutor/issue_submit'));exit;}
            if(($data1['totalExper']+$data1['totalNatur'])<=$data['voluntaryinfoSetting']['totalMin']) {$this->showNotice('所带学生总人数未达下限，请重新输入', url('TeacherTutor/issue_submit'));exit;}

             if($data['issue']) {
                $data1['pid'] = $data['issue']['pid'];
                $data1['totalNow'] = $data['issue']['totalNow'];
                $bool = Db::table('tc_issue')->update($data1);
             } else {
                $data1['totalNow'] = 0;
                $bool = Db::table('tc_issue')->insert($data1);
             }
             if($bool == 1) {
                $this->showNotice('课题修改成功', url('TeacherTutor/issue_submit'));      
             } 
             
        }
        $this->assign('voluntaryinfoSetting',$data['voluntaryinfoSetting']);
        $this->assign('issue', $data['issue']);
        $this->assign('ontime', $data['ontime']);
        $this->assign('message', $data['message']);
        $this->assign('message1', $data['message1']);
        $this->assign('user', $user);
        return $this->fetch('issue_submit');

    }

    

    public function student_list($page=1) {
    	$user = $this->auto_login();
        $where['wishFirst|wishSecond|wishThird|wishForth|wishFifth'] = $user['workNumber'];
        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
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
                $bool = Db::table('tc_result')->insert($data1);
                Db::table('tc_voluntary')->where('sid',$data1['sid'])->delete();
                Db::table('user_student')->where('sid',$data1['sid'])->setField('chosen',1);
                Db::table('tc_issue')->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
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
                      
        $page = $totalPage = ceil($total/$this->pageSize);
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
                $issue = Db::table('tc_issue')->where('workNumber', $user['workNumber'])->find();
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
                Db::table('tc_issue')->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
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
        $where['wishFirst|wishSecond|wishThird|wishForth|wishFifth'] = $user['workNumber'];
        $where['department'] = $user['department'];

        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                             ->where($where)
                                             ->page($page,$this->pageSize)->select();
        $total = count(Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                                ->where($where)
                                                ->select()
                      );
        $page = $totalPage = ceil($total/$this->pageSize);
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
                $issue = Db::table('tc_issue')->where('workNumber', $user['workNumber'])->find();
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
                Db::table('tc_issue')->where('workNumber',$data1['workNumber'])->setInc('totalNow',1);
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

    
	public function show_result() {
		$user = $this->auto_login();
		 
               
        $studentList = Db::table('tc_result')->where('workNumber',$user['workNumber'])->select();
        $students = array();
        if($studentList!=NULL) {
        	$i=0;
        	foreach ($studentList as $key => $value) {
        		$students[$i] = Db::table('user_student')->where('sid',$value['sid'])->find();
        		$i++;
        	}
        }

        $res = Db::table('tc_voluntaryinfoSetting')->find();
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
}