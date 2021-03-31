create database restaurante;
use restaurante;

create table cozinha(
	tipo varchar(32),
    horaAbertura int,
    horaFechamento int,
    pratoPrincipal varchar(32)
);

create table funcionario(
	nome varchar(32),
    atividade varchar(32)
);

create table ingrediente(
	nome varchar(32),
    validade date
);

insert into cozinha values("Mineira", "14", "20", "Feijoada");
insert into cozinha values("Chinesa", "10", "21", "Yakissoba");
insert into cozinha values("italiana", "13", "22", "Pizza");

insert into funcionario values("Felipe", "Atendente");
insert into funcionario values("Joao", "Atendente");
insert into funcionario values("natanael", "Gerente");

insert into funcionario values("Feijao", date(now()));
insert into funcionario values("Arroz", date(now()));
insert into funcionario values("Carne de porco", date(now()));




