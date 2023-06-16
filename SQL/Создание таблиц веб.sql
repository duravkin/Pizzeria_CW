create table types (
	id int primary key auto_increment,
	type varchar(20) not null unique
);

create table items (
	id int primary key auto_increment,
	type_id int,
	title varchar(40) not null,
	price numeric(9,2) not null,
	description text,
	image varchar(40),
	foreign key (type_id) references types(id),
	constraint chk_price check(price > 0)
);

create table users (
	id int primary key auto_increment,
	surname varchar(40) not null,
	name varchar(40) not null,
	city varchar(40) not null,
	street varchar(40) not null,
	home varchar(40) not null
);

create table carts (
	id int primary key auto_increment,
	user_id int,
	date_order timestamp default now(),
	status bool default 0,
	foreign key (user_id) references users(id)
);

create table subcarts (
	id int primary key auto_increment,
	cart_id int,
	item_id int,
	quantity int default 1 check(quantity > 0),
	foreign key (cart_id) references carts(id),
	foreign key (item_id) references items(id),
	constraint chk_quantity check (quantity > 0)
);

