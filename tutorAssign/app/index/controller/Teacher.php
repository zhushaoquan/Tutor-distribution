<?php
namespace app\index\controller;
use think\Config;
use think\Db;
use think\Request;
use think\Validate;

class Teacher extends BaseController {
    public $menu = array();
    public function _initialize() {
        $user = $this->auto_login();
        $_temp = array(
            array("table_overview", "查看表格", "list", []),
            array("table_list", "填写表格", "plus", ["table_fill"]),
            array("information", "个人信息", "user", ["information_change"]),
        );
        $this->menu = $this->make_menu($_temp);
        $this->assign('user', $user);
        $this->assign('menus', $this->menu);
    }
    public function index() {
        $this->redirect(url('table_overview'));
    }
    public function indexHome() {
        return $this->fetch('index_1');
    }
    //ajax 联动
    public function select() {
        $request = Request::instance();
        $table = Db::table('task_info');
        $level = $request->post("select_level");
        $result = [];
        if ($level == 'first') {
            //第一联动
            $years = $table->distinct(true)->field('year')->select();
            $result[] = ["name"=>"请选择学年","value"=>""];
            foreach($years as $row) {
                $result[] = ["name"=>$row['year'],"value"=>$row['year']];
            }
            return $this->successJson($result);
        }else if ($level == 'second') {
            //第一联动
            $first_key = $request->post('first_key');
            $semesters = $table->distinct(true)->field('semester')->where('year', $first_key)->select();
            $result[] = ["name"=>"请选择学期","value"=>""];
            foreach($semesters as $row) {
                $result[] = array("name"=>$row['semester'],"value"=>$row['semester']);
            }
            return $this->successJson($result);
        }else if ($level == 'third') {
            $first_key = $request->post('first_key');
            $second_key = $request->post('second_key');
            $tbs = $table->distinct(true)->field('relativeTable')->where(["year"=>$first_key,"semester"=>$second_key])->select();
            $result[] = ["name"=>"请选择学期","value"=>""];
            foreach($tbs as $row) {
                $result[] = array("name"=>$this->translate($row['relativeTable']),"value"=>$row['relativeTable']);
            }
            return $this->successJson($result);
        }
        return $this->errorJson("类型错误");
    }
    public function table_overview() {
        $request = Request::instance();
        $year = $request->get("year");
        $table = Db::table('task_info');
        $task = $table->distinct(true)->field('year')->select();
        $this->assign('task', $task);
        return $this->fetch('index');
    }
    public function table_page($table_name = '') {
        $request = Request::instance();
        $user = $this->auto_login();
        if ($request->isAjax()) {
            $table_name = $table_name == '' ? $request->get('major'): $table_name;
            $off_set = $request->get('offset');
            $page_size = $request->get('limit', 'all');
            $search = $request->get('search', '');
            $task_info = Db::table('task_info')->where(["relativeTable"=> $table_name])->find();
            $table_name = $task_info["taskState"] == '2' ?  'cb_'.$table_name: $table_name;
            $table = Db::table($table_name);
            $condition = 'major != "" AND major != "专业"';
            if ($task_info["taskState"] != '2') {
                $condition .= " AND workNumber = '{$user['workNumber']}'";
            }
            $search_condition = [];
            if ($search) {
                $filed_arr = Db::getTableInfo($table_name, 'fields');;
                $search_condition[implode('|',$filed_arr)] = ['like', '%'.$search.'%'];
            }
            //$condition = ['*'=>['like'=>'15']];
            if ($page_size === 'all') {
                $list = $table->where($condition)->where($search_condition)->select();
                $data = [
                    "total"=>count($list),
                    "rows"=>$list,
                ];
            }else {
                $list = $table->where($condition)->where($search_condition)->paginate($page_size, false, ['page' => $off_set / $page_size + 1]);
                $data = [
                    "total"=>$list->total(),
                    "rows"=>$list->all(),
                ];
            }

            return json($data);
        }
        return '';
    }

    public function table_list() {
        $user = $this->auto_login();
        $table = Db::table('task_info');
        $page_size = 3;
        $list = $table->where(['taskState'=>0])->paginate($page_size);
        $data = [];
        foreach ($list->all() as $item) {
            //过滤未填的表格
            if(Db::table($item['relativeTable'])->where(["workNumber"=>$user["workNumber"]])->find()) {
                continue;
            }
            $first = Db::table($item['relativeTable'])->where(['insertTime'=>1])->find();
            $data[] = [
                "courseName"=> $first["grade"],
                "major"=>$this->translate($item['relativeTable']),
                "deadline"=>$item['teacherDeadline'],
                "relativeTable"=>$item['relativeTable']
            ];
        }
        $this->assign('page', $list->render());
        $this->assign('data', $data);
        $this->assign("list", $list);
        return $this->fetch('table_list');
    }
    //ajax请求
    public function table_fill() {
        $user = $this->auto_login();
        $request = request();
        $table_name = $request->get('table');
        if($request->isAjax()) {
            $table = Db::table($table_name);
            $condition = 'major != "" AND major != "专业"';
            $total = $table->where($condition)->count();
            $table = Db::table($table_name);
            return json(["total"=>$total, "data"=>$table->where($condition)->select()]);
        }
        $this->assign('table_name', $table_name);
        return $this->fetch();
    }

    //教师个人信息
    public function information() {
        $this->auto_login();
        return $this->fetch();
    }

    public function information_change() {
        $user = $this->auto_login();
        if (request()->isPost()) {
            $save = $this->request->post();
            //验证数据
            $validate = new Validate([
                'email'=>'email'
            ]);


            if (empty($save["password"])) {
                unset($save["password"]);
                unset($save["re_password"]);
            } else {
                if($save["password"] != $save["re_password"]) {
                    $this->error("两次密码不一致");
                }
                unset($save["re_password"]);
            }
            Db::table('user_teacher')->where('workNumber', $user['workNumber'])->update($save);
            $this->refresh_user();
            $this->success("修改成功", url('information'));

        }
        return $this->fetch();
    }

    public function save_table_fill() {
        $user = $this->auto_login();
        $request = $this->request;
        if ($request->isPost()) {
            $data = $request->post('data');
            $data = json_decode($data, true);
            $table_name = $request->get('table_name');
            foreach ($data as $item) {
                $tc = Db::table(str_replace('cb_', '', $table_name));
                $item["teacherName"] = $user["name"];
                $item["workNumber"] = $user["workNumber"];
                $tc->insert($item);
                $cb = Db::table($table_name);
                $cb->where("insertTime = ".$item["insertTime"])->update([
                    "timePeriod"    => ['exp', "concat(timePeriod,'；{$item['timePeriod']}')"],
                    "teacherName"   => ['exp', "concat(teacherName,'；{$item['teacherName']}')"],
                    "remark"        => ['exp', "concat(remark,'；{$item['remark']}')"],
                ]);
            }
            return $this->successJson(url('table_list'));
        }
        return $this->errorJson("method error");
    }

}