drop table if exists customer;
drop table if exists employee;
drop table if exists department;
drop table if exists company;
drop table if exists transaction;
drop table if exists product;
drop table if exists game;
drop table if exists console;
drop table if exists accessory;
create table customer(
  id int primary key,
  name varchar(30),
  phone int,
  email varchar(50),
  points int,
  username varchar(30),
  hpasswd varchar(20),
  privilege int
);

create table employee(
  id int primary key,
  name varchar(30),
  salary decimal(10,2),
  dept int,
  phone int,
  SID int,
  foreign key(SID) references emplyee(id)
  on update cascade on delete set null,
  foreign key(dept) references department(id)
  on update cascade on delete set null
);

create table department(
  id int primary key,
  name varchar(20),
  phone int
);

create table company(
  id int primay key,
  name varchar(30),
  country varchar(20)
);

create table transaction(
  id int primary key,
  cusID int,
  proID int,
  rating int,
  date dateTime,
  foreign key(cusID) references customer(id)
  on update cascade on delete cascade,
  foreign key(cusID) references customer(id)
  on update set null on delete set null
);

create table product(
  id int primary key,
  name varchar(30),
  companyID int default 0,
  price decimal(10,2),
  stock int,
  sales int,
  rating float,
  DID int default 1,
  foreign key(companyID) references company(id)
  on update cascade on delete set default,
  foreign key(DID) references department(id)
  on update cascade on delete set default
);

create table game(
  id int primary key,
  name varchar(30),
  platform varchar(30),
  genre varchar(30),
  foreign key(id) references product(id)
  on update cascade on delete cascade
);

create table console(
  id int primary key,
  name varchar(30),
  platform varchar(30),
  color varchar(20),
  memory varchar(10),
  foreign key(id) references product(id)
  on update cascade on delete cascade
);

create table accessory(
  id int primary key,
  name varchar(30),
  category varchar(30),
  foreign key(id) references product(id)
  on update cascade on delete cascade
);