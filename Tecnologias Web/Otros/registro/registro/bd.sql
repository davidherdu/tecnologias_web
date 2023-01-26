CREATE TABLE usuarios (
	id		int(5) not null auto_increment,
	fecha	int(10) not null,
	nick	varchar(20) not null,
	pass	varchar(32) not null,
	mail	varchar(40) not null,
	ip		varchar(15) not null,
	primary key (id),
	key (nick,pass)
)
