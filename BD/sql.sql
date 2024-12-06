create database academia;

use academia;

select * from usuario;

create table  usuario(
Id_usu varchar(255) primary key not null,
nome varchar(255),
dataNasc date,
genero varchar(255),
nomeMaterno varchar(255),
email varchar(255),
telefone varchar(255),
telefoneFixo varchar(255),
CEP varchar(255),
cidade varchar(255),
bairro varchar(255),
estado varchar(255),
endereco varchar(255),
senha varchar(255),
logado char(1),
img varchar(255),
horaAtual time,
Fk_Id_ped int,
Fk_Id_pla int

);

create table professor(
Id_pro varchar(255) primary key not null,
nome varchar(255),
dataNasc date,
genero varchar(255),
email varchar(255),
telefone varchar(255),
telefoneFixo varchar(255),
senha varchar(255),
Fk_Id_pla int

);

create table vendedor(
Id_ven int primary key not null,
nome varchar(255),
dataNasc date,
genero char(3),
email varchar(255),
telefone varchar(255),
telefoneFixo varchar(255),
CEP varchar(255),
cidade varchar(255),
bairo varchar(255),
estado varchar(255),
endereço varchar(255),
senha varchar(255),
Fk_Id_pro int,
Fk_Id_ped int

);

create table pedido(
Id_ped int primary key not null auto_increment,
qntd varchar(255),
dataPed date,
horaPed time,
Fk_Id_pro int,
Fk_Id_ent int

);

create table produto(
Id_pro int primary key not null auto_increment,
qntd varchar(255),
valorUnit varchar(255),
marca varchar(255),
descricao varchar(255)

);

create table entrega(
Id_ent int primary key not null auto_increment,
dataEnt date,
horaEnt time,
endereco varchar(255),
frete varchar(255)

);

create table planos (
Id_pla int primary key not null,
valor varchar(255),
tipo char(2)

);


alter table usuario add constraint Fk_usu_ped foreign key (Fk_Id_ped)
references pedido(Id_ped);
alter table usuario add constraint Fk_usu_pla foreign key (Fk_Id_pla)
references planos(Id_pla);

alter table pedido add constraint Fk_ped_pro foreign key (Fk_Id_pro)
references produto(Id_pro);
alter table pedido add constraint Fk_ped_ent foreign key (Fk_Id_ent)
references entrega(Id_ent);

alter table vendedor add constraint Fk_ven_pro foreign key (Fk_Id_pro)
references produto(Id_pro);
alter table vendedor add constraint Fk_ven_ped foreign key (Fk_Id_ped)
references pedido(Id_ped);

alter table professor add constraint Fk_pro_pla foreign key (Fk_Id_pla)
references planos(Id_pla);