drop database if exists bdmedique;
create database bdmedique;
use bdmedique;

create table medico(
	crm integer not null primary key,
	nome varchar(40) not null,
  cidade varchar(15) not null,
  posto_atendimento varchar(15) not null,
  especialidade varchar(15) not null,
  telefone varchar (20),
  e_mail varchar (50) 
);
create table paciente(
	cpf varchar(11) not null primary key,
	nome varchar(40) not null,
  cidade varchar(15) not null,
  tipo_sanguineo varchar(4) not null,
  data_de_nascimento date,
  telefone varchar(20),
  e_mail varchar (50)  	
);
create table status_Consulta(
  id integer not null auto_increment primary key,
  status varchar (20)
);
create table agenda (
  id integer not null,  
  id_medico integer,
  id_paciente varchar(11),
  data_hora datetime,
  id_status integer not null,
  constraint fk_agenda_medico FOREIGN KEY (id_medico) references medico(crm),
  constraint fk_agenda_paciente FOREIGN KEY (id_paciente) references paciente(cpf),
  constraint fk_agenda_status_Consulta FOREIGN KEY (id_status) references status_Consulta(id)
);
CREATE TABLE validacao (
  id integer primary key not null,  
  id_medico integer,
  /*foto img blob,*/
  num_crm varchar (50),
  carterinha varchar (50),
  status varchar (10),
  constraint fk_validacao_medico FOREIGN KEY (id_medico) references medico(crm)
  );
create table usuarioM(
  crm integer not null,
	senha varchar(50) not null,
	constraint fk_usuarioM_medico foreign key (crm) references medico (crm)
);
create table usuarioP(
	cpf varchar(11) not null,
	senha varchar(50) not null,
	constraint fk_usuarioP_paciente foreign key (cpf) references paciente(cpf)
);

insert into medico values
(506575,"Hiago Cardoso","jaguariuna","Sao Joao","Ortopedista","19 99896-4045","hiagojrcardoso@gmail.com"),
(254698,"Elis Silva","Pedreira","Kobayashy","massoterapeuta","19 35426-8522","eliss@hotmail.com"),
(489564,"Paulo Filho","Pedreira","Primavera","Clinico geral","19 25467-5784","paulodino@gmail.com"),
(845692,"Leonardo","Amparo","Ype","Clinico geral","19 84692-1426","leo@gmail.com");

insert into paciente values
(12365498775,"Fernando Santos","amparo","O-","1992/05/20","19 99896-4045","ferSantos@gmail.com"),
(88964523154,"Lais Oliveira","Pedreira","O+","2002/01/10","19 35426-8522","laisOli@hotmail.com"),
(67531225368,"Ricardo Silva","jaguariuna","B+","2002/06/08","19 25467-5784","ricSilva@gmail.com"),
(32547861235,"Leandro piza","Amparo","AB","1996/12/01","19 84692-1426","leandropiza@gmail.com");

insert into status_Consulta values
(1,"confirmado"),
(2,"aguardando"),
(3,"reagendar"),
(4,"realizado");

insert into agenda values
(1,506575,12365498775,"2021/04/30 14:00",2),
(2,254698,88964523154,"2021/04/05 15:00",1),
(3,489564,67531225368,"2021/05/07 10:00",4),
(4,845692,32547861235,"2021/05/10 13:00",3);

insert into usuarioM values
(506575,md5("Senh@123")),
(254698,md5("Senh@123")),
(489564,md5("Senh@123")),
(845692,md5("Senh@123"));

insert into usuarioP values
(12365498775,md5("Senh@123")),
(88964523154,md5("Senh@123")),
(67531225368,md5("Senh@123")),
(32547861235,md5("Senh@123"));

select * from medico;
select * from paciente;
select * from status_Consulta;
select * from agenda;
select * from validacao;
select * from usuarioM;
select * from usuarioP;
show tables;

