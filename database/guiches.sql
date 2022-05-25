use cac;

show tables;

CREATE TABLE
    tb_login_guiches(
        id_login_guiches INT NOT NULL auto_increment,
        login VARCHAR(100) NOT NULL,
        senha VARCHAR(100) NOT NULL,
        nomes_funcionarios VARCHAR(100) NOT NULL,
        cadastros_ativos enum('ativo', 'desativado') DEFAULT 'desativado',
        PRIMARY key (id_login_guiches, nomes_funcionarios)
    );

CREATE TABLE
    tb_guiches(
        id_guiches INT NOT NULL auto_increment,
        id_login_guiches INT NOT NULL,
        nomes_funcionarios VARCHAR(100) NOT NULL,
        PRIMARY KEY(id_guiches)
    );

ALTER TABLE tb_guiches
ADD
    CONSTRAINT fk_id_login_guiches FOREIGN key(id_login_guiches) REFERENCES tb_login_guiches(id_login_guiches);

ALTER TABLE tb_guiches
ADD
    CONSTRAINT nomes_funcionarios FOREIGN key(nomes_funcionarios) REFERENCES tb_login_guiches(nomes_funcionarios);

ALTER TABLE tb_guiches
ADD
    CONSTRAINT fk_nomes_funcionarios FOREIGN KEY (nomes_funcionarios) REFERENCES tb_login_guiches (nomes_funcionarios);
