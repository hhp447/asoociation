/***
**用户表
**/
create table as_user(
	id bigint unsigned not null primary key auto_increment,
	avatar varchar(64) not null default 'avatar.png',
	username varchar(32) not null default '',
	passwd varchar(32) not null default '',
	grade varchar(10) not null default '',
	class varchar(64) not null default '',
	phone varchar(12) not null default '',
	createtime int unsigned not null default 0,
	unique as_user_username_passwd(username,passwd)
)engine = myisam default charset = utf8;
/***
**
**管理员表
**
***/
create table as_admin(
	id bigint unsigned not null primary key auto_increment,
	adminname varchar(32) not null default '',
	passwd varchar(32) not null default '',
	createtime int unsigned not null default 0,
	unique as_admin_adminname_passwd(adminname,passwd)
)engine = myisam default charset = utf8;
/***
**
**新闻表
**
***/
create table as_news(
	id bigint unsigned not null primary key auto_increment comment '新闻ID',
	title varchar(250) not null default '' comment '新闻标题',
	content text comment '新闻内容',
	source varchar(100) not null default '' comment '来源',
	pics varchar(200) not null default '' comment '新闻配图',
	assoid bigint unsigned not null default 0 comment '社团ID',
	createtime int unsigned not null default 0 comment '发布时间'
)engine = myisam default charset = utf8;
/***
**
**机构表
**
***/
create table as_ins(
	id bigint unsigned not null primary key auto_increment,
	name varchar(64) not null default '',
	createtime int unsigned not null default 0
)engine = myisam default charset = utf8;

insert into as_ins values(4,'宣传中心',1505782109);
insert into as_ins values(5,'青年志愿者中心',1505782109);
insert into as_ins values(6,'艺术中心',1505782109);
insert into as_ins values(7,'创新创业中心',1505782109);
insert into as_ins values(8,'团干培训中心',1505782109);
insert into as_ins values(9,'文化中心',1505782109);
/***
**
**社团表
**
***/
create table as_asso(
	id bigint unsigned not null primary key auto_increment,
	asname varchar(32) not null default '' comment '社团名字',
	introduction varchar(200) not null default '' comment '社团介绍',
	covpic varchar(200) not null default 'school.png' comment '社团封面照片',
	intpic varchar(200) not null default '' comment '社团介绍页面图片',
	insid bigint unsigned not null default 0 comment '所属机构',
	createtime int unsigned not null default 0 comment '创建时间'
)engine = myisam default charset = utf8;


insert into as_asso(asname,introduction,insid,createtime) values ('实践部','我们的工作

1、熟悉掌握全院团组织的基本情况，了解基层团组织的活动、组织生活、团总支委员情况。
2、根据团章要求加强各团支部的的基层组织建设。负责收集审核档案材料，团员组织关系转接，管理、补办团员证，定期收缴团费。
3、向党组织推荐优秀团员及入党积极分子，并协助做好具体考查工作。
4、“五四”奖状工作和团总支平时考核工作。

组织部的工作并不难，但需要你们的用心。在这里，我们将一起成长一起收获！

丰富多彩的动之包饺子与做蛋糕(´⊙ω⊙`)等等 ',1,1505782109);


/***
**
**角色表
**
***/
create table as_role(
	id bigint unsigned not null primary key auto_increment,
	rolename varchar(200) not null default '',
	createtime int unsigned not null default 0
)engine = myisam default charset = utf8;

insert into as_role values(1,'部长',1505782109);
insert into as_role values(2,'副部',1505782109);
insert into as_role values(3,'干事',1505782109);
insert into as_role values(4,'会员',1505782109);
/***
**
**申请表
**
***/
create table as_appli(
	id bigint unsigned not null primary key auto_increment,
	userid bigint unsigned not null default 0 comment '用户id',
	assoid bigint unsigned not null default 0 comment '社团id',
	roleid bigint unsigned not null default 0 comment '角色id',
	introduction text comment '自我介绍',
	result smallint unsigned not null default 0 comment '结果',
	createtime int unsigned not null default 0
)engine = myisam default charset = utf8; 
insert into as_appli values(1,1,1,1,"大家好，我是XXX，做事认真负责",1,1505782109);
insert into as_appli values(2,2,1,2,"大家好，我是XXX，想当副部",1,1505782109);
insert into as_appli values(3,3,1,3,"大家好，我是XXX，想当干事",0,1505782109);
insert into as_appli values(4,1,2,3,"大家好，我是XXX，想当干事",0,1505782109);
insert into as_appli values(5,1,2,3,"大家好，我是XXX，想当干事",1,1505782109);


create table as_indexpic(
	id int unsigned primary key auto_increment,
	pic text,
	createtime int unsigned not null default 0
)engine = myisam default charset = utf8; 


create table as_pub(
	id bigint unsigned not null primary key auto_increment,
	name varchar(200) not null default '',
	belong varchar(200) not null default '',
	createtime int unsigned not null default 0
)engine = myisam default charset = utf8; 