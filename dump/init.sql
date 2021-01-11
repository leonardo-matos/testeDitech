create table Pessoa(
id_pessoa int unsigned auto_increment,
nome varchar(255),
data_criacao datetime,
data_alteracao datetime,
primary key (id_pessoa)
);

create table usuario(
id_usuario int unsigned auto_increment,
id_pessoa int unsigned,
login varchar(50),
senha varchar(10),
tipo varchar(30),
data_criacao datetime,
data_alteracao datetime,
primary key (id_usuario),
foreign key (id_pessoa) references pessoa (id_pessoa)
);

create table sala(
id_sala int unsigned auto_increment,
descricao varchar(50),
numero int,
data_criacao datetime,
data_alteracao datetime,
primary key (id_sala)
);


create table reserva_usuario_sala(
id_reserva_usuario_sala int unsigned auto_increment,
id_usuario int unsigned,
id_sala int unsigned,
hora_inicial datetime,
hora_final datetime,
ativo int(2),
primary key (id_reserva_usuario_sala),
foreign key (id_usuario) references usuario (id_usuario),
foreign key (id_sala) references sala (id_sala)
);