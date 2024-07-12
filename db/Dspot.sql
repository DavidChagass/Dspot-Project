create database dspot;

use dspot;

create table Empresa(
idEmpresa int primary key auto_increment,
dominio char(10) not null,
nomeEmpresa varchar(80) not null,
emailEmpresa varchar(200) not null,
telefoneEmpresa varchar(14)
)engine=InnoDB;

create table Funcionario(
idFuncionario int primary key auto_increment not null,
fk_idEmpresa int not null,
nomeFuncionario varchar(200) not null,
senhaFuncionario varchar(255) not null,
emailFuncionario varchar(150) not null,
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;

create table Gerente(
idGerente int primary key auto_increment,
fk_idEmpresa int not null,
nomeGerente varchar(200) not null,
senhaGerente varchar(255) not null,
emailGerente varchar(150) not null,
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;

-- criar tabela estoque
create table Estoque(
idEstoque int primary key auto_increment,
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
imagem varchar(255),
foreign key(fk_idEmpresa) references empresa(idEmpresa) on delete restrict on update restrict
)engine=InnoDB;


-- drop table Funcionario;

-- colunas: id, nomeProduto, detalhes, quantidadeAtual, dataEntrada, dataUltimaModificacao, perecivel = bool, dataValidade, precoCompra
-- precoVenda, fornecedor, quantidadeTotal, idEmpresa=fk

insert into Empresa(dominio, nomeEmpresa, emailEmpresa, telefoneEmpresa)
values('12345-1*23', 'empresa',"empresa1@gmail.com",  "(81) 3897-8248");

insert into Empresa(dominio, nomeEmpresa, emailEmpresa, telefoneEmpresa)
values('23456-1*23', 'segunda-empresa', "empresa2@gmail.com", "(79) 3862-5632");

insert into Gerente(fk_idEmpresa, nomeGerente, senhaGerente, emailGerente) 
values(1, "Ronaldo", "ronaldo123","ronaldo@gmail.com");

insert into Funcionario(fk_idEmpresa ,nomeFuncionario, senhaFuncionario, emailFuncionario)
values(1, "samuel silva", "samuelsilva", "sanduicheiche@gmail.com");


insert into Gerente(fk_idEmpresa, nomeGerente, senhaGerente, emailGerente) 
values(2, "santana", "santana123","santana@gmail.com");

insert into Funcionario(fk_idEmpresa ,nomeFuncionario, senhaFuncionario, emailFuncionario)
values(2, "mariana", "mariana123", "mariana@gmail.com");








INSERT INTO estoque (
    fk_idEmpresa, 
    nomeProduto, 
    detalhes, 
    quantidadeAtual, 
    dataEntrada, 
    dataUltimaModificacao, 
    perecivel, 
    dataValidade, 
    precoCompra, 
    fornecedor, 
    quantidadeTotal,
    imagem
) VALUES (
    1, 
    'Produto Exemplo', 
    'Detalhes do produto', 
    100, 
    '2024-07-06 10:00:00',
    '2024-07-06 10:00:00', 
    TRUE, 
    '2024-12-31',
    19.99, 
    'Fornecedor Exemplo', 
    150,
    'https://cdn.motor1.com/images/mgl/lEmjGg/s3/chevrolet-tracker-rs-2024.jpg'
);


INSERT INTO estoque (
    fk_idEmpresa, 
    nomeProduto, 
    detalhes, 
    quantidadeAtual, 
    dataEntrada, 
    dataUltimaModificacao, 
    perecivel, 
    dataValidade, 
    precoCompra, 
    fornecedor, 
    quantidadeTotal
) VALUES (
    1, 
    'Segundo Produto Exemplo', 
    'Detalhes do produto exemplo', 
    100, 
    '2024-07-06 12:00:00', 
    '2024-07-06 12:00:00', 
    true, 
    '2025-07-06', 
    50.75, 
    'Fornecedor Exemplo', 
    200
);


delimiter $
create procedure logFuncionario(
  in Login_dominio_funcionario char(10),
   in Login_email_funcionario varchar(150),
   in Login_senha_funcionario varchar(255)
  )
  BEGIN

    SELECT *
       FROM Funcionario 
          INNER JOIN Empresa ON Funcionario.fk_idEmpresa = Empresa.idEmpresa 
      WHERE Empresa.dominio = Login_dominio_funcionario AND 
      Funcionario.emailFuncionario = Login_email_funcionario AND 
      senhaFuncionario = Login_senha_funcionario;
  END$
  

delimiter ;



delimiter $
create procedure logGerente(
  in Login_dominio_gerente char(10),
   in Login_email_gerente varchar(150),
   in Login_senha_gerente varchar(255)
  )
  BEGIN

    SELECT *
       FROM Gerente 
          INNER JOIN Empresa ON Gerente.fk_idEmpresa = Empresa.idEmpresa 
      WHERE Empresa.dominio = Login_dominio_gerente AND 
      Gerente.emailGerente = Login_email_gerente AND 
      senhaGerente= Login_senha_gerente;
  END$
  
delimiter ;


delimiter $
create procedure CadFuncionario(
  in idempresa int,
  in cad_nomeFuncionario varchar(200),
  in cad_emailFuncionario varchar(150),
  in cad_senhaFuncionario varchar(255) 
  )
    BEGIN
      insert into Funcionario(fk_idempresa, nomeFuncionario, emailFuncionario, senhaFuncionario)
      values(idempresa, cad_nomeFuncionario,cad_emailFuncionario, cad_senhaFuncionario);
    END$

delimiter ;

delimiter $ 
create procedure contFuncionarios(
  in dominioEmpresa char(10),
  out quantidadeTotal int
)
BEGIN
  select count(idFuncionario) INTO quantidadeTotal
    from funcionario 
    inner join empresa on funcionario.fk_idEmpresa = empresa.idempresa
    WHERE empresa.dominio = dominioEmpresa;
END$
delimiter ;



-- drop procedure contFuncionarios;
-- call contFuncionarios('12345-1*23', @quantidadeTotal);
-- select @quantidadeTotal;
-- select * from gerente;
-- select * from empresa;
-- select * from funcionario;
-- delete from empresa where idempresa = 3;
-- delete from funcionario where fk_idempresa = 3;
-- delete from estoque where fk_idempresa = 3;
-- delete from gerente where fk_idempresa = 3;
-- drop procedure logFuncionario;
-- drop procedure logGerente;
-- drop table funcionario;
-- drop table gerente;
-- drop procedure cadfuncionario;
-- call CadFuncionario(1,'rosangela', 'rosangela@gmail.com', 'rosa12345');
-- call logFuncionario('12345-1*23', "sanduicheiche@gmail.com", "samuelsilva");

-- SELECT  * FROM Estoque INNER JOIN Empresa ON Estoque.fk_idEmpresa = Empresa.idEmpresa  WHERE dominio = '12345-1*23';

