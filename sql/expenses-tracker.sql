CREATE DATABASE exptracker;

USE exptracker;


CREATE TABLE categories(
	id int primary key auto_increment,
    label text not null,
    created_at timestamp default current_timestamp not null,
    update_at timestamp default current_timestamp not null
);

INSERT INTO categories (label) values ('Food & Groceries') , ('Transportation') , ('Housing & Utilities') , ('Entertainment & Leisure') , ('Education') , ('Health & Wellness');

CREATE TABLE expenses(
 id int primary key auto_increment,
 title varchar(150) not null,
 amount double not null,
 description_date text,
 expenses_date timestamp,
 created_at timestamp default current_timestamp not null,
 update_at timestamp default current_timestamp not null,
 foreign key (id) references categories(id)
);
