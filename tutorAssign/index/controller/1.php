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



                          // Db::table('user_student_'.$this->grades[0]['grade'])->where('sid',$data1['sid'])->setField('chosen',1);
                          // $bool = Db::table('tc_result_'.$this->grades[0]['grade'])->insert($data1);
                          // if($stu['department']==$this->department1) {
                          //      Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('compExperNow',1);
                          // } else if($stu['department']==$this->department2) {
                          //      Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('mathExperNow',1);
                          // } else { 
                          //      Db::table('tc_issue_'.$this->grades[0]['grade'])->where('workNumber',$data1['workNumber'])->setInc('naturNow',1);
                          // }



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