<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;

class Student extends BaseController {
	public $department_1 = "计算机实验班";
	public $department_2 = "数学实验班";
    public $pageSize = 5;
	public function index() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        if ($user['chosen'] == 0) {
        	$student['chosen'] = '否';
        } else {
        	$student['chosen'] = '是';
        }
        $this->assign('user', $student);
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

	public function modify() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //如果直接使用session里的用户信息，修改的信息必须重新登录才能更新显示
        if ($user['chosen'] == 0) {
        	$student['chosen'] = '否';
        } else {
        	$student['chosen'] = '是';
        }
        $this->assign('user', $student);
		return $this->fetch('modify');
	}

	public function tutor_list($page=1) {

		$user = $this->auto_login();
		if($user['department'] == $this->department_1) {
			$teachers = Db::table('user_teacher')->where('isExperial',1)->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('isExperial',1)->select());
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];

		} else if($user['department'] == $this->department_2) {
			$teachers = Db::table('user_teacher')->where('isExperial',2)->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('isExperial',2)->select());
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		} else {
			$teachers = Db::table('user_teacher')->where('department',$user['department'])->page($page,$this->pageSize)->select();
		    $total = count(Db::table('user_teacher')->where('department',$user['department'])->select());
			$page = $totalPage = ceil($total/$this->pageSize);
			$pageBar = [
				'total'     => $total,
				'totalPage' => $totalPage+1,
				'pageSize'  => $this->pageSize,
				'curPage'   => $page
				];
		}
		$this->assign($pageBar);
		$this->assign('teachers',$teachers);
		$this->assign('user', $user);
		return $this->fetch('tutor_list');
	}

	public function tutor_detail() {
		$user = $this->auto_login();
		$student = Db::table('user_student')->where('serialNum',$user['serialNum'])->find(); //
        $tutors = Db::table('user_teacher')->where('department',$student['department'])->select();

        $this->assign('tutors', $tutors);
        $this->assign('user', $user);
		return $this->fetch('tutor_list');

	}

	public function edit_voluntary() {
		$user = $this->auto_login();
		if($user['department'] == $this->department_1) {
			$tutors = Db::table('user_teacher')->where('isExperial',1)->select();
		} else if($user['department'] == $this->department_2) {
			$tutors = Db::table('user_teacher')->where('isExperial',2)->select();
		} else {
			$tutors = Db::table('user_teacher')->where('department',$user['department'])->select();
		}
        $res = Db::table('tc_voluntaryinfoSetting')->find();
        $res['nowtime'] = time();
        $data['message'] = '';
        $data['ontime']=1;
        $data['firstStart'] = $res['firstStart'];
        $data['secondStart'] = $res['secondStart'];
        $data['firstEnd'] = $res['firstEnd'];
        $data['secondEnd'] = $res['secondEnd'];
        if($res['nowtime'] < $res['firstEnd'] && $res['nowtime'] > $res['firstStart']) {
            $data['message'] = "当前为第一轮的志愿填报时间：".date('Y-m-d',$res['firstStart'])."至".date('Y-m-d',$res['firstEnd']).",请同学们按时填报、修改志愿！";
         } else if($res['nowtime'] < $res['secondEnd'] && $res['nowtime'] > $res['secondStart']) {
         	$data['message'] = "当前为第二轮的志愿填报时间：".date('Y-m-d',$res['secondStart'])."至".date('Y-m-d',$res['secondEnd']).",请同学们按时填报、修改志愿！";

         } else {
            $data['message'] = "当前不在填报志愿时间段内！";
            $data['ontime'] = 0;
         }
         if($user['chosen']==1) $data['message'] = "导师志愿互选结果已出！";
        $this->assign('tutors', $tutors);
        $this->assign('user', $user);
		$request = Request::instance();
        if ($request->isPost()) {
        	$data1['sid'] = $user['sid'];
            $data1['wishFirst'] = $request->post('wishFirst', '');
            $data1['wishSecond'] = $request->post('wishSecond', '');
            $data1['wishThird'] = $request->post('wishThird', '');
            $data1['wishForth'] = $request->post('wishForth', '');
            $data1['wishFifth'] = $request->post('wishFifth', '');  
            $result = Db::table('tc_voluntary')->where('sid', $user['sid'])->find();
            $bool;
	        if($result==NULL) {
	        	$bool = Db::table('tc_voluntary')->insert($data1);
	        } else {
	        	$data1['vid'] = $result['vid'];
	        	$bool = DB::table('tc_voluntary')->update($data1);
	        }

	        if($bool) $this->showNotice("志愿填报成功，静候佳音吧！",url('Student/edit_voluntary'));


        }
        $voluntary = Db::table('tc_voluntary')->where('sid',$user['sid'])->find();
        $this->assign('voluntary',$voluntary);
		return $this->fetch('edit_voluntary',$data);
        
	}


	public function show_result() {
		$user = $this->auto_login();
		$result = Db::table('tc_result')->where('sid',$user['sid'])->find();
		$this->assign('user',$user);

		if($result != NULL) {
			$teacher = Db::table('user_teacher')->where('workNumber', $result['workNumber'])->find();
		    $sids = Db::table('tc_result')->where("sid!=".$user['sid']." and "."workNumber=".$teacher['workNumber'])->select();
		    if($sids != NULL) {
		    	 $students = array();
			     $i = 0;
			     foreach ($sids as $key => $value) {
			    	$stuinfo = Db::table('user_student')->where('sid',$value['sid'])->find();    	
			    	$students[$i] = $stuinfo;
			    	$i++;
		    	 }
		    } else {
		    	$students = NULL;
		    }
			$this->assign('voluntory_teacher',$teacher);
			$this->assign('voluntory_students',$students);
			$this->assign('message',"志愿结果已出，请及时查看");

		} else {
			$this->assign('message',"志愿结果未出，请耐心等待!");

		}
		return $this->fetch('show_result');
	}

	
}