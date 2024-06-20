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

-- criar tabela estoque
create table Estoque(
idEstoque int primary key auto_increment,
fk_idEstoque int not null,
fk_idEmpresa int not null,
nomeProduto varchar(200) not null,
detalhes varchar(255) ,
quantidadeAtual int(200) not null,
dataEntrada datetime not null,
dataUltimaModificacao datetime not null,
perecivel boolean,
dataValidade date not null,
precoCompra float(5,2) not null,
fornecedor varchar(255) not null,
quantidadeTotal int(255) not null,
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;


-- colunas: id, nomeProduto, detalhes, quantidadeAtual, dataEntrada, dataUltimaModificacao, perecivel = bool, dataValidade, precoCompra
-- precoVenda, fornecedor, quantidadeTotal, idEmpresa=fk

insert into Empresa(dominio, nomeEmpresa, cnpjEmpresa)
values('12345-1*23', 'empresa', "123456789123456789");

insert into Gerente(fk_idEmpresa, nomeGerente, senhaGerente, emailGerente) 
	values(1, "Ronaldo", "ronaldo123","ronaldo@gmail.com");

insert into Funcionario(fk_idEmpresa ,nomeFuncionario, cpfFuncionario, senhaFuncionario, emailFuncionario)
values(1, "samuel silva", "063.513.480-21", "samuelsilva", "sanduicheiche@gmail.com");

SELECT COUNT(*) AS numFuncionarios FROM Funcionario 
INNER JOIN Empresa ON Funcionario.fk_idEmpresa = Empresa.idEmpresa 
  WHERE Empresa.dominio = :dominio 
AND Funcionario.emailFuncionario = :email 
 AND senhaFuncionario = :senha;
