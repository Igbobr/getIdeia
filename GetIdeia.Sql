CREATE DATABASE getIdeia character set UTF8 collate utf8_bin; 
USE getIdeia; 

create table usuarios(
	id int primary key auto_increment,
	email VARCHAR(50) NOT NULL,
	senha VARCHAR(50) NOT NULL,
	nome VARCHAR(50) NOT NULL,
	avaPessoal int DEFAULT 0, 
	foto VARCHAR(250)
	)ENGINE = innodb;
create table projetos(
	id int primary key auto_increment, 
	id_usuarios int,
	img VARCHAR(250),
	classificacao int, 
	descricao VARCHAR (50)NOT NULL,
	sobre TEXT, 
	preco DECIMAL(7,2)NOT NULL,
	categoria VARCHAR (50)NOT NULL,
        previa VARCHAR(100) NOT NULL
)ENGINE = innodb;
	ALTER TABLE projetos ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (id_usuarios) REFERENCES usuarios(id) 

INSERT INTO projetos (img,classificacao,descricao,sobre,preco,categoria,previa) VALUES ('',0,'MEU PROJETO','UM BOM PROJETO',100.00,'PROGRAMAÇÃO','https://www.instagram.com');

INSERT INTO projetos (img,classificacao,descricao,sobre,preco,categoria,previa) VALUES ('',0,'NOSSO PROJETO','UM OTIMO PROJETO',400.00,'PROGRAMAÇÃO','https://www.twitter.com')