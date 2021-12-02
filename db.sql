drop database if exists ci_blog;
create database if not exists ci_blog;
use ci_blog;

create table if not exists logs(
    userid int primary key auto_increment,
    username varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    firstname varchar(255) not null,
    lastname varchar(255) not null,
    user_tags text not null,
    created_at timestamp default current_timestamp
);

create table if not exists articles(
    article_id int primary key auto_increment,
    article_title varchar(255) not null,
    article_poster_id int not null,
    article_tags text not null,
    article_likes int not null default 0,
    article_body text not null,
    article_time datetime default current_timestamp
);

create table if not exists aval_tags(
    tag_name varchar(255)
);

create table if not exists likes(
    like_article_id int not null,
    like_userid int not null
);