<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class TeacherTutor extends BaseController {
    public $pageSize = 5;
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
         $res['nowtime'] = time();
         $data['message'] = '';
         $data['issueStart'] = $res['issueStart'];
         $data['issueEnd'] = $res['issueEnd'];
         if($res['nowtime'] < $res['issueStart'] || $res['nowtime'] > $res['issueEnd']) {
            $data['message'] = "填报课题时间为".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."当前不在填报课题时间段,填报无效";
         } else {
            $data['message'] = "填报课题时间为".date('Y-m-d',$res['issueStart'])."至".date('Y-m-d',$res['issueEnd'])."，请尽快填报";
         }

         $request = Request::instance();
         if ($request->isPost()) {
            $data1['workNumber'] = $user['workNumber'];
            $data1['totalExper'] = $request->post('totalExper', '');
            $data1['totalNatur'] = $request->post('totalNatur', '');
            $data1['title'] = $request->post('title', '');
            $data1['content'] = $request->post('content', '');
            $data1['time'] = time();
            if($res['nowtime'] >= $res['issueStart'] && $res['nowtime'] <= $res['issueEnd']) {
                 $boolres = Db::table('tc_issue')->where('workNumber', $user['workNumber'])->find();
                 $res = '';
                 if($boolres) {
                    $data1['pid'] = $boolres['pid'];
                    $data1['totalNow'] = $boolres['totalNow'];
                    $res = Db::table('tc_issue')->update($data1);
                 } else {
                    $data1['totalNow'] = 0;
                    $res = Db::table('tc_issue')->insert($data1);
                 }
                 if($res == 1) {
                    $this->success("修改成功", url('issue_submit'));       
                 } 
             }
        }
        $this->assign('message', $data['message']);
        $this->assign('user', $user);
        return $this->fetch('issue_submit');

    }

    

    public function student_list($page=1) {
    	$user = $this->auto_login();
        $students = Db::table('tc_voluntary')->alias('v')->join('user_student s','v.sid = s.sid')
                                            ->where('wishFirst', $user['workNumber'])
                                            ->whereOr('wishSecond', $user['workNumber'])
                                            ->whereOr('wishThird', $user['workNumber'])
                                            ->whereOr('wishForth', $user['workNumber'])
                                            ->whereOr('wishFifth', $user['workNumber'])
                                            ->page($page,$this->pageSize)->select();
        $total = count(Db::table('tc_voluntary')->where('wishFirst', $user['workNumber'])
                                            ->whereOr('wishSecond', $user['workNumber'])
                                            ->whereOr('wishThird', $user['workNumber'])
                                            ->whereOr('wishForth', $user['workNumber'])
                                            ->whereOr('wishFifth', $user['workNumber'])
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