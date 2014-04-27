create database igniter_blog;
grant all on igniter_blog.* to `test`@`localhost`;
use igniter_blog;

create table `article` (
    id int(11) not null primary key auto_increment,
    title varchar(255) not null,
    content varchar(255) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `comment` (
    id int(11) not null primary key auto_increment,
    article_id int(11) not null,
    content varchar(255) not null;
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create database igniter_blog_test;
grant all on igniter_blog_test.* to `test`@`localhost`;
use igniter_blog_test;

create table `article` (
    id int(11) not null primary key auto_increment,
    title varchar(255) not null,
    content varchar(255) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `comment` (
    id int(11) not null primary key auto_increment,
    article_id int(11) not null,
    content varchar(255) not null;
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
