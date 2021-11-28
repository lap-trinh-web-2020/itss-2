-- CREATE DATABASE php_project;
USE php_project;

drop table if exists post_tag;
drop table if exists comments;
drop table if exists user_post_like;
drop table if exists posts;
drop table if exists tags;
drop table if exists users;


create table if not exists users
(
	user_id 	int		 		not null 	auto_increment primary key,
    username	varchar(100)	not null	unique,
    password	varchar(100)	not null,
    admin		int				not null	default 0,
    email		varchar(30)		not null	unique,
    phone		varchar(30)		not null	unique,
    address		varchar(100)	not null,  
    avatar_url	varchar(1000)	not null,
    des         text
);

create table if not exists posts
(
	post_id		int		not null 	auto_increment primary key,
    author_id 	int		not null ,
    title		varchar(1000)		not null,
    content		text,
    date_create	date,
    foreign key (author_id) references users (user_id)
);

create table if not exists tags
(
	tag_id		int			not null	auto_increment primary key,
    tag_title	varchar(100) not null	unique
);

create table if not exists post_tag
(
	post_id 	int 	not null,
    tag_id		int		not null,
    primary key (post_id, tag_id),
    foreign key (post_id) references posts(post_id),
    foreign key (tag_id) references tags(tag_id)
);

create table if not exists comments
(
	comment_id	int 	not null	auto_increment	primary key,
    user_id		int		not null,
    post_id		int		not null,
    content		text,
    foreign key (user_id) references users (user_id),
    foreign key (post_id) references posts (post_id)
);

create table if not exists user_post_like
(
	user_id		int		not null,
    post_id		int		not null,
    like_state	int		default 1,
    primary key (user_id, post_id),
    foreign key (user_id) references users (user_id),
    foreign key (post_id) references posts (post_id)
)