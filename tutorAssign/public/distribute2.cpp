#include <iostream>
#include <fstream>
#include <algorithm>
#include <iomanip>
#include <cstdlib>
#include <string>
#include <ctime>
#include <vector>
using namespace std;

struct Teacher {
	int teacher_id;
	int num;
	vector<int> studentList;
	Teacher(){ studentList.clear(); }
	Teacher(int id, int n):teacher_id(id), num(n) { studentList.clear(); }
};

struct Student {
	int student_id;
	int teacher_id;
	Student(){ teacher_id = -1; }
	Student(int sid, int tid):student_id(sid), teacher_id(tid) {}
};

int main(int argc, char* argv[]) {

	srand(time(NULL));

	ifstream fin;
    ofstream fout;

    int student_number = atoi(argv[1]);
    int teacher_number = atoi(argv[2]);

    vector<Student> studentSet;
    vector<Teacher> teacherSet;

    int student_id, teacher_id, num;

    fin.open("student_unelected.txt");
    if (!fin) {
        cout << "OPEN FAILED!" << endl;
        exit(0);
    } else {
        for (int i = 0; i < student_number; ++i) {
            fin >> student_id;
            studentSet.push_back(Student(student_id, -1));
        }
        fin.close();
    }

    fin.open("teacher2.txt");
    if (!fin) {
        cout << "OPEN FAILED!" << endl;
        exit(0);
    } else {
        int cnt = 0;
        for (int i = 0; i < teacher_number; ++i) {
            fin >> teacher_id >> num;
            cnt += num;
            teacherSet.push_back(Teacher(teacher_id, num));
        }   
        fin.close();

        if (cnt < student_number) {
            cout << "Not sufficient tuotrs!" << endl;
            exit(0);
        } else {
            for (int i = 0; i < student_number; ++i) {
                while (1) {
                    int index = rand() % teacher_number;
                    if (teacherSet[index].num > 0) {
                        teacherSet[index].num--;
                        teacherSet[index].studentList.push_back(studentSet[i].student_id);
                        studentSet[i].teacher_id = teacherSet[index].teacher_id;
                        break;
                    }
                }
            }
            
            /***********写入中选学生信息*********/
            fout.open("student_elected2.txt");
            for (int i = 0; i < student_number; ++i) {
                if (studentSet[i].teacher_id != -1) {
                    fout << setfill('0') << setw(9) << studentSet[i].student_id << " ";
                    fout << setfill('0') << setw(5) << studentSet[i].teacher_id;
                    if (i != student_number - 1) fout << ",";
                    fout << endl;
                }
            }
            fout.close();
            /************************************/

            /***********写入导师分配情况*********/
            fout.open("tutor_assign2.txt");
            for (int i = 0; i < teacher_number; ++i) {
                fout << setfill('0') << setw(5) << teacherSet[i].teacher_id;
                fout << " " << teacherSet[i].num;
                int size = teacherSet[i].studentList.size();
                for (int j = 0; j < size; ++j) {
                    if (j == 0) fout << " ";
                    else fout << "-";
                    fout << setfill('0') << setw(9) << teacherSet[i].studentList[j];
                }
                if (size == 0) fout << " null";
                if (i != teacher_number - 1) fout << ",";
                fout << endl;
            }
            fout.close();
            /************************************/    
        }
    }
    return 0;
}
