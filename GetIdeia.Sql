CREATE DATABASE getIdeia character set = utf8 DEFAULT COLLATE utf8_general_ci;
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
	linkComprar VARCHAR(250),
	classificacao int, 
	descricao VARCHAR (50)NOT NULL,
	sobre TEXT, 
	preco DECIMAL(7,2)NOT NULL,
	categoria VARCHAR (50)NOT NULL,
        previa VARCHAR(100) NOT NULL
)ENGINE = innodb;
ALTER TABLE projetos ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (id_usuarios) REFERENCES usuarios(id) ;

INSERT INTO usuarios(email,senha,nome,foto) values('Ideia@getideia.com','123456','GetIdeia','');

INSERT INTO projetos (img,classificacao,descricao,sobre,preco,categoria,previa,linkComprar,id_usuarios) VALUES ('',0,'MEU PROJETO','UM BOM PROJETO',100.00,'PROGRAMAÇÃO','https://www.instagram.com','https://www.mercadolivre.com.br',1);

INSERT INTO projetos (img,classificacao,descricao,sobre,preco,categoria,previa,linkComprar,id_usuarios) VALUES ('',0,'NOSSO PROJETO','UM OTIMO 

PROJETO',400.00,'PROGRAMAÇÃO','https://www.twitter.com','https://www.mercadolivre.com.br',1)