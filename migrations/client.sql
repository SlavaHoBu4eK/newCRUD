create database if not exists gym;
use gym;
create table if not exists client
(
    id            int(20) auto_increment,
    name          varchar(30),
    last_name     varchar(255),
    middle_name   varchar(255),
    date_of_birth date,
    gender        bool,
    phone_number  varchar(40),
    primary key (id)
);
create table if not exists comments
(
    id        int(20) auto_increment,
    client_id int(20),
    body      text,
    PRIMARY KEY (id),
    foreign key (`client_id`) references `client` (`id`) on delete cascade on update cascade
);
