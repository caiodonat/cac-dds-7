use cac;
show tables;

create table tb_login_guiches(
id_login_guiches int not null auto_increment,
login varchar(100) not null,
senha varchar(100) not null,
funcionarios_nomes varchar(100) not null,
cadastros_ativos boolean default false,
primary key (id_login_guiches, funcionarios_nomes)
 );

create table tb_guiches(
id_guiches int primary key not null auto_increment,
id_login_guiches int not null,
funcionarios_nomes varchar(100) not null);

alter table tb_guiches add constraint fk_id_login_guiches foreign key(id_login_guiches) references tb_login_guiches(id_login_guiches);
alter table tb_guiches add constraint fk_funcionarios_nomes foreign key(funcionarios_nomes) references tb_login_guiches(funcionarios_nomes);
