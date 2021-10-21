create database php_crud_structured;

use php_crud_structured;

create table cliente(
	id int not null auto_increment primary key,
    nome_cliente varchar (250) not null,
    cpf char (14) not null,
    email varchar (100)
);

create table produto(
	id int not null auto_increment primary key,
    nome_produto varchar (250) not null,
    valor_unitario decimal (8,2) not null,
    cod_barras varchar (11) not null unique key
);

create table pedido (
	numero_pedido int not null auto_increment primary key,
    data_pedido datetime not null,
    id_cliente int not null,
    id_produto int not null,
    id_valor decimal (8,2) unique key,
    quantidade int not null,
    total decimal (8,2) not null,
    foreign key (id_cliente) references cliente (id),
    foreign key (id_produto) references produto (id),
    foreign key (id_valor) references produto (valor_unitario)
)
