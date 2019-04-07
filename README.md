
# payManage 经费管理系统/记账系统
A simple web app created by php and aui as well as bootstrap,you can deploy it in your server to manage your payment. Hope you to enjoy this project!
You can visit this demo in http://whrhost.tk/cost_items
你可以在这里查看演示 http://whrhost.tk/cost_items

数据库表明:cost_project cost_usr
cost_usr:
id	int(10)   用户id
realname	varchar(50)  真实姓名
pwd	varchar(50)   用户密码
answer	text   安全问题答案
phone	varchar(50)   电话号码
company	int(11)     单位
lasttime	timestamp    最后一次登录时间
sessionid	varchar(20)   sessionid用于保存登陆状态


cost_project:
id	int(5)   项目id
title	varchar(20)    项目标题
Mdescribe	text    项目描述
create_time	timestamp   项目开始时间
over_time	timestamp   项目结题时间
costType	text    项目的详细开支
/*
开支example：  {"0":{"title":"会议/差旅交流费","premoney":"500","costlists":[{"money":"400","time":"2019-04-06 00:00:00","summary":"不超过"}],"hadcost":400},"1":{"title":"刚好","premoney":"250","hadcost":0,"costlists":[]}}
*/
phone	text    项目创建者电话
money	float   项目经费
type	varchar(10)   项目类型




