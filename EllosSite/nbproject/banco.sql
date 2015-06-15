drop database ellos;

create database ellos;

use ellos;

create table aluno(
    matricula int primary key auto_increment,
    nome varchar(30),
    email varchar(30),
    telefone varchar(15),
    sexo enum('M','F'),
    dtnasc date,
    logradouro varchar(30),
    numero int,
    complemento varchar(30),
    cidade varchar(20),
    uf varchar(2),
    cep varchar(30),
    observacoes text,
    datagravacao date
);

create table atividade(
    idatividade int primary key auto_increment,
    nomeatividade varchar(20),
    plano varchar(20),
    horario varchar(200),
    idmatricula int,
    foreign key(idmatricula) references aluno(matricula)
);


insert into aluno values ('null','Andre','aoliveira@100','9885-84114','M','2015-01-01','Rua A',100,'Tijuca','Rio','RJ','20530-500','OBS1','2015-05-08');

insert into atividade values('null','Musculacao','Livre','Qualquer Horario',1);
insert into atividade values('null','Spinning','Livre','Qualquer Horario',1);
insert into atividade values('null','Body Pump','Livre','Qualquer Horario',1);


