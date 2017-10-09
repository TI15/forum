create database forum;
use forum;

create table user (
	id int auto_increment primary key,
	uname varchar(50) not null,
	password varchar(255) not null,
	name varchar(50) not null
);

create table thread (
	tid int auto_increment primary key,
	heading varchar(255) not null,
	content text not null,
	uid int not null,
	foreign key (uid) references user(id) on delete cascade on update cascade
);

create table category (
	cid int auto_increment primary key,
	name varchar(100)
);

create table answer (
	aid int auto_increment primary key,
	content text not null,
	tid int,
	foreign key (tid) references thread(tid) on delete cascade on update cascade
);

create table belong (
	tid int ,
	cid int ,
	primary key(tid,cid),
	foreign key (tid) references thread(tid) on delete cascade on update cascade,
	foreign key (cid) references category(cid) on delete cascade on update cascade
);
