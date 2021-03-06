
drop table if exists productos;
drop table if exists clientes;
drop table if exists compras;


create table productos (
	cod_producto	int(3) primary key auto_increment,
	nombre_producto varchar(50) not null unique,
	categoria 	varchar(50) not null,
	precio 		int(5) not null,
	proveedor	varchar(5) not null unique,
	nom_prov	varchar(50) not null unique
);

create table clientes (
	usu 	varchar(10) primary key,
	pass 	varchar(32) not null,
	nombre 	varchar(25) not null,
	email 	varchar(30) not null
);

create table compras(
	cod_producto 	int(3),
	usu		varchar(10),
	fecha 		date,
	cantidad 	int(5),
 primary key (cod_producto,usu,fecha));


alter table compras 
	add foreign key (cod_producto) references productos (cod_producto) 
		on delete  restrict 
		on update  restrict;
alter table compras 
	add foreign key (usu) references clientes (usu) 
		on delete  restrict 
		on update  restrict;

insert into clientes values('juan','juan','juan','juan@gmail.com');
insert into clientes values('ana','ana123','ana','ana@gmail.com');
insert into clientes values('javi','javi123','javi','ja@gmail.com');
insert into clientes values('diego','d','diego','d@gmail.com');
insert into clientes values('jm','jm','josemarioa','jm@gmail.com');

insert into productos values(1,'telefono','electronica',100,'P1','Sams');
insert into productos values(2,'cascos','electronica',20,'P2','kryus');
insert into productos values(3,'peine','peluqueria',5,'P3','Bluens');
insert into productos values(4,'televisor','electronica',300,'P4','Potrat');
insert into productos values(5,'zapatillas','moda',35,'P5','Oiko');
insert into productos values(6,'cable de red','informatica',12,'P6','James');

insert into compras values(1,'juan','2016/3/22',1);
insert into compras values(2,'juan','2016/3/22',2);
insert into compras values(4,'diego','2016/10/23',3);
insert into compras values(3,'jm','2016/5/12',1);
insert into compras values(1,'ana','2016/6/20',3);
insert into compras values(4,'javi','2016/8/5',2);
insert into compras values(5,'ana','2016/3/4',1);
insert into compras values(2,'javi','2016/1/1',2);
insert into compras values(6,'jm','2016/9/30',1);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           