#include <iostream>
#include <fstream>
#include <algorithm>
#include <iomanip>
#include <cstdlib>
#include <string>
#include <ctime>
#include <queue>
#include <map>

using namespace std;

struct Student {
    int student_id; // 学生编号
    int teacher_id; // 中选的导师编号
    int cur;        // 当前分配进程正在考虑第cur个志愿
    int want[5];    // 五个志愿
    float point;    // 绩点
};

struct Teacher {
    int teacher_id; // 导师编号
    int want_num;   // 期望的学生数
    int chose_num;  // 已中选的学生数
    int student_id[10]; // 中选的学生编号
};

class DistributeSystem {

private:
    int student_number; // 学生总人数
    int teacher_number; // 导师总人数
    Student* stu;
    Teacher* tch;

public:
    DistributeSystem() {
        stu = NULL;
        tch = NULL;
        student_number = 0;
        teacher_number = 0;
    }

    DistributeSystem(int stu_num, int tch_num, Student* student, Teacher* teacher) {
        student_number = stu_num;
        teacher_number = tch_num;
        stu = student;
        tch = teacher;
    }

    ~DistributeSystem() {
        delete[] stu;
        delete[] tch;
    }

    // 根据导师编号返回他在数组中的下标
    int get_teacher_index(int teacher_id) {
        int index;
        for (index = 0; index < teacher_number; ++index) {
            if (tch[index].teacher_id == teacher_id) {
                break;
            }
        }
        return index;
    }

    // 根据学生编号返回他在数组中的下标
    int get_student_index(int student_id) {
        int index;
        for (index = 0; index < student_number; ++index) {
            if (stu[index].student_id == student_id) {
                break;
            }
        }
        return index;
    }

    // 使用Gale–Shapley算法进行分配
    void distribute() {
        queue<Student> Que; //未分配到导师的学生队列
        for (int i = 0; i < student_number; ++i) {
            Que.push(stu[i]); // 初始都是未分配状态，都加进队列
        }
        while (!Que.empty()) {
            Student& s = stu[get_student_index(Que.front().student_id)];
            Que.pop();
            // 考虑学生s的第cur个志愿（导师为t）
            Teacher& t = tch[get_teacher_index(s.want[s.cur++])];
            if (t.want_num > t.chose_num) { // 如果导师t还有剩余名额，直接中选
                t.student_id[t.chose_num++] = s.student_id;
                s.teacher_id = t.teacher_id;
            }
            else {
                int min_stu_id = -1; // 导师t中绩点最低的学生编号
                int pos = -1; // 以及他在导师的中选列表中的下标
                float min_point = 5.0;
                for (int i = 0; i < t.chose_num; ++i) { // 在导师t中查找绩点最低的学生编号
                    Student tmp = stu[get_student_index(t.student_id[i])];
                    if (min_point > tmp.point) {
                        min_point = tmp.point;
                        min_stu_id = tmp.student_id;
                        pos = i;
                    }
                }
                // 如果导师t不带学生 或者 学生s的绩点比导师t所有已经中选学生的最低绩点还低，那么学生t只好再等下轮
                if (t.want_num == 0 || s.point < min_point) {
                    if (s.cur < 5) { // 如果五个志愿还没考虑完毕的话，放入队列中继续参与分配
                        Que.push(s);
                    }
                }
                else { // 不然学生t就直接替换掉绩点最低的那个学生
                    Student& min_stu = stu[get_student_index(min_stu_id)];
                    min_stu.teacher_id = -1;
                    if (min_stu.cur < 5) { // 被替换掉的学生再放入未分配的队列中去
                        Que.push(min_stu);
                    }
                    t.student_id[pos] = s.student_id;
                    s.teacher_id = t.teacher_id;
                }
            }
        }
    }
};


int main(int argc, char* argv[]) {

    ifstream fin;
    ofstream fout;
    
    int student_number = atoi(argv[1]);
    int teacher_number = atoi(argv[2]);

    Student* student = new Student[student_number];
    Teacher* teacher = new Teacher[teacher_number];

    /***********打开学生信息*************/
    fin.open("student.txt");
    if (!fin) {
        cout << "打开文件失败！" << endl;
    } else {
        for (int i = 0; i < student_number; ++i) {
            fin >> student[i].student_id;
            student[i].teacher_id = -1;
            student[i].cur = 0; // 初始都从志愿1（下标为0）开始考虑
            fin >> student[i].point; // 绩点[1.0, 5.0]
            for (int j = 0; j < 5; ++j) { // 生成5个志愿
                fin >> student[i].want[j];
            }       
        }
        fin.close();
    }
    /************************************/

    /***********打开导师信息*************/
    fin.open("teacher.txt");
    if (!fin) {
        cout << "打开文件失败！" << endl;
    } else {
        for (int i = 0; i < teacher_number; ++i) {
            fin >> teacher[i].teacher_id;
            fin >> teacher[i].want_num;
            teacher[i].chose_num = 0;
        }
        fin.close();
    }
    /************************************/

    /***********进行算法分配*************/
    DistributeSystem ds(student_number, teacher_number, student, teacher);
    ds.distribute();
    int chose_num = 0;
    int index = 0;
    for (int i = 0; i < student_number; ++i) {
        if (student[i].teacher_id != -1) {
            chose_num++;
            index = i;
        }
    }
    /************************************/

    /***********写入中选学生信息*********/
    fout.open("student_elected.txt");
    // fout << "中选学生人数：" << chose_num << endl;
    for (int i = 0; i < student_number; ++i) {
        if (student[i].teacher_id != -1) {
            fout << setfill('0') << setw(9) << student[i].student_id << " ";
            fout << setfill('0') << setw(5) << student[i].teacher_id;
            if (i != index) fout << ",";
            fout << endl;
        }
    }
    fout.close();
    /************************************/

    /***********写入未中选学生信息*******/
    fout.open("student_unelected.txt");
    // fout << "未中选学生人数：" << student_number - chose_num << endl;
    for (int i = 0; i < student_number; ++i) {
        if (student[i].teacher_id == -1) {
            fout << setfill('0') << setw(9) << student[i].student_id << endl;
        }
    }
    fout.close();
    /************************************/

    /***********写入导师分配情况*********/
    fout.open("tutor_assign.txt");
    // fout << "导师人数：" << teacher_number << endl;
    for (int i = 0; i < teacher_number; ++i) {
        fout << setfill('0') << setw(5) << teacher[i].teacher_id;
        fout << " " << teacher[i].chose_num;
        fout << " " << teacher[i].want_num;
        for (int j = 0; j < teacher[i].chose_num; ++j) {
            if (j == 0) fout << " ";
            else fout << "-";
            fout << setfill('0') << setw(9) << teacher[i].student_id[j];
        }
        if (teacher[i].chose_num == 0) fout << " null";
        if (i != teacher_number - 1) fout << ",";
        fout << endl;
    }
    fout.close();
    /************************************/
    
    return 0;
}
