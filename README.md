# 毕设导师智能分配系统

  毕设导师智能分配系统是一个用来简化传统手工匹配繁琐操作的系统。本系统将学生报志愿、系负责人收集整理数据、相关人员进行手工分配、反馈选择结果等繁琐的操作转移到线上。把毕设导师互选的所有流程，传化对本系统的操作。减少了相关人员的工作量，降低了流程中由于手工操作而出现错误的可能。学生的志愿选择、导师分配、数据统计、结果查看及导出等操作均可在上系统完成，提高了毕设导师选择的效率。

​	本系统有以下四种类型的用户：

|  角色  |                   主要功能                   |
| :--: | :--------------------------------------: |
|  学生  | 修改个人信息、填报志愿、查看导师列表、查看导师详细信息、查看导师的待选学生、查看中选导师信息、查看中选导师的学生列表、	查看中选导师的学生信息 |
|  导师  | 修改个人信息、填报研究的课题方向、设置学生数、选择学生、查看选择自己的学生列表、查看选择自己的学生信息、查看中选学生列表、查看中选学生信息 |
| 系负责人 | 修改个人信息、批量导入学生信息、手动添加学生信息、修改学生信息、设置志愿个数、批量导入导师信息、手动添加导师信息、修改导师信息、设置导师学生数、设定当前年级、设定各个期限、选择算法自动分配、选择强制分配、导出分配结果 |
| 院负责人 |       修改个人信息、修改分配结果、导出分配结果、设置系负责人        |

​	本系统的主要流程为：

- 院负责人设置各个系的负责人 -> 系负责人进行匹配设置 -> 
- 导师填报学生人数和选题 -> 学生填报志愿（第一轮） -> 
- 导师选择学生（第一轮） -> 学生填报志愿（第二轮） -> 
- 导师选择学生（第二轮） -> 系负责人为未分配到导师的学生进行手动分配 -> 
- 院负责人对结果进行微调 -> 系和院负责人导出分配结果 -> 导师和学生查看各自结果
