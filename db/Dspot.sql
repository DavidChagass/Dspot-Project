create database dspot;

use dspot;

create table Empresa(
idEmpresa int primary key auto_increment,
dominio char(10) not null,
nomeEmpresa varchar(80) not null,
cnpjEmpresa char(18) not null
)engine=InnoDB;

create table Funcionario(
idFuncionario int primary key auto_increment not null,
fk_idEmpresa int not null,
nomeFuncionario varchar(200) not null,
cpfFuncionario char(14) not null,
senhaFuncionario varchar(20) not null,
emailFuncionario varchar(150) not null,
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;

create table Gerente(
idGerente int primary key auto_increment,
fk_idEmpresa int not null,
nomeGerente varchar(200) not null,
senhaGerente varchar(20) not null,
emailGerente varchar(150) not null,
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;

insert into Empresa(dominio, nomeEmpresa, cnpjEmpresa)
values('12345-1*23', 'empresa', "123456789123456789");

insert into Funcionario(fk_idEmpresa ,nomeFuncionario, cpfFuncionario, senhaFuncionario, emailFuncionario)
values(1, "samuel silva", "063.513.480-21", "samuelsilva", "sanduicheiche@gmail.com");
