create database Medicine;
use medicine;
create table Empresa(
idEmpresa int primary key auto_increment,
dominio char(10) not null,
nomeEmpresa varchar(80) not null,
cnpjEmpresa char(18) not null
)engine=InnoDB;

create table Funcionario(
idFuncionario int primary key auto_increment,
nomeFuncionario varchar(200) not null,
cpfFuncionario char(14) not null,
senhaFuncionario varchar(20) not null,
emailFuncionario varchar(150) not null
)engine=InnoDB;

create table Gerente(
idGerente int primary key auto_increment,
nomeGerente varchar(200) not null,
senhaGerente varchar(20) not null,
emailGerente varchar(150) not null
)engine=InnoDB;


insert into Funcionario(idFuncionario, nomeFuncionario, cpfFuncionario, senhaFuncionario, emailFuncionario)
values(1, "samuel silva", "063.513.480-21", "samuelsilva", "sanduicheiche@gmail.com");
