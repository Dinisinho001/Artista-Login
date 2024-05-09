CREATE DATABASE MixMusic;
USE MixMusic;

CREATE TABLE utilizador(
	id	INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome_completo	VARCHAR(180) NOT NULL,
	perfil	longtext,
	telefone char(9),
    email	varchar(50) NOT NULL UNIQUE,
    pass	varchar(256) NOT NULL,
    username varchar(12) NOT NULL,
    dt_registo	datetime default current_timestamp
) ENGINE=InnoDB;

CREATE TABLE album(
	id		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome	VARCHAR(128) NOT NULL,
	dt_lanc	date NOT NULL,
    tipo	VARCHAR(128) NOT NULL,
	m	int NOT NULL,
    s 	int NOT NULL
) ENGINE=InnoDB;

CREATE TABLE musica(
	id		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome	VARCHAR(128) NOT NULL,
	link_mp3	varchar(256) NOT NULL,
	letra 	text,
    m	int NOT NULL,
    s 	int NOT NULL,
    ano	char(4) NOT NULL,
    genero enum('Rock','Pop','Rap'),
    id_album int unsigned NOT NULL,
    foreign key (id_album) references album(id)
) ENGINE=InnoDB;

CREATE TABLE playlist(
	id		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome	varchar(128) default 'playlist' NOT NULL,
	dt_criacao	datetime default current_timestamp,
    id_utilizador int unsigned,
    foreign key ( id_utilizador) references utilizador(id)
) ENGINE=InnoDB;


CREATE TABLE artista(
	id		INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome	VARCHAR(128) NOT NULL,
    qt_seguidores int
) ENGINE=InnoDB;

CREATE TABLE premium(
	nome	VARCHAR(128) NOT NULL primary key,
	preco decimal(7,2) NOT NULL
) ENGINE=InnoDB;


ALTER TABLE premium ADD INDEX preco_index (preco);

CREATE TABLE compra(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_utilizador INT UNSIGNED NOT NULL,
    nome_premium VARCHAR(128) NOT NULL,
    dt_compra datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilizador) REFERENCES utilizador(id),
    FOREIGN KEY (nome_premium) REFERENCES premium(nome)
) ENGINE=InnoDB;

CREATE TABLE playlist_musica(
   id_playlist int unsigned,
   id_musica int unsigned,
    PRIMARY KEY (id_playlist,id_musica),
    FOREIGN KEY (id_playlist) REFERENCES playlist(id),
    FOREIGN KEY (id_musica) REFERENCES musica(id),
    dt_criacao datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE musica_artista(
	id_artista int unsigned,
    id_musica int unsigned,
    PRIMARY KEY (id_artista,id_musica),
    FOREIGN KEY (id_artista) REFERENCES artista(id),
    FOREIGN KEY (id_musica) REFERENCES musica(id)
) ENGINE=InnoDB;

CREATE TABLE faq (
  id int unsigned AUTO_INCREMENT primary key ,
  pergunta varchar(255) NOT NULL,
  resposta varchar(255) NOT NULL
) ENGINE=InnoDB;

/*Vista dos utilizadores*/
create view utilizadores as
select
	id as 'Id utilizador',
	nome_completo as 'Nome completo',
    telefone as 'Nº telefone',
    email as 'Email',
    username as 'Username'
from utilizador;

/*Vista das compras*/
create view compras as
select
	compra.id as 'ID compra',
	compra.id_utilizador as 'ID utilizador',
    compra.nome_premium as 'Prime',
    CONCAT(premium.preco, '€') as 'Preço',
    dt_compra as 'Data compra'
from compra join premium on compra.nome_premium=premium.nome;

/*Vista dos tipos de premium*/
create view premiums as
select
	nome as 'Nome premium',
    CONCAT(preco, '€') as 'Preço'
from premium
order by 2 asc;

/*Vista dos artistas*/
create view artistas as
select
	id as 'ID artista',
    nome as 'Nome Artista',
    qt_seguidores as 'Seguidores'
from artista;

/*Vista das músicas*/
create view musicas as
select
	musica.id as 'ID música',
	musica.nome as 'Nome artista',
    musica.link_mp3 as 'Ligação',
	musica.letra as 'Letra música',
    musica.m as 'Minutos',
    musica.s as 'Segundos',
    musica.ano	as 'Ano de lançamento',
    musica.genero as 'Género',
    album.nome as 'Álbum'
from musica join album on musica.id_album=album.id;

/*Vista dos álbuns*/
CREATE VIEW albuns AS
SELECT
    id AS 'ID álbum',
    nome AS 'Nome álbum',
    dt_lanc AS 'Data lançamento',
    m as 'Minutos',
    s as 'Segundos',
    tipo AS 'Tipo'
FROM
    album;
    
/*Vista das playlists*/
create view playlists as
select
	id as 'ID playlist',
	nome as 'Nome playlist',
    dt_criacao 'Data criação'
from playlist;

/*Tipos de Premium*/
INSERT INTO premium (nome, preco)
VALUES ('Familiar', 10);

INSERT INTO premium (nome, preco)
VALUES ('Mensal', 20);

INSERT INTO premium (nome, preco)
VALUES ('Anual', 30);

/*Inserir dados na tabela*/
/*artistas*/
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Sematary', 3861233);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('The Beetles', 123214);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Meshuggah', 524354);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Slipknot', 32423);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Shredder 1984', 45253);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Xavier Wulf', 234535);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Chief Keef', 214234);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Bauhaus', 565791230);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Purity Filter', 14465453);
INSERT INTO artista (nome, qt_seguidores)
VALUES ('Hi-C', 123125);

/*utilizador*/
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Victor Silva', 987238123, 'victor@gmail.com', 'oiasjdoi23213', 'turtle');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Henry Johnson', 963728192, 'henry@gmail.com', 'ha9sdjsa123', 'wys');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Jesper Pedro', 929102391, 'jesper@gmail.com', 'pijsadj082h789', 'jayp7');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Sined Mendes', 928201923, 'sined@gmail.com', 'iasjd0891233', 'sined');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Tommy Kiki', 982019234, 'tommy@gmail.com', 'oiasjdoi23213', 'tommyow_');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('John Bob', 990293123, 'john@gmail.com', 'asudh7123', 'johnowich');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Mathias Pereira', 910293023, 'mathias@gmail.com', 'j21u3891us', 'mootze');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Tiago Mendes', 982019231, 'tiago@gmail.com', '12hnndsa8', 'tiagolini');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('Stjin Scheffers', 902930293, 'scheffers@gmail.com', 'ihasd21', 'schef');
INSERT INTO utilizador (nome_completo, telefone, email, pass, username)
VALUES ('João Pereira', 928301231, 'joao@gmail.com', 'hasduh2321', 'jaypigga');

/*albuns*/
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('album fixe', '2005-05-24','Rock fixe',10,34);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('rarea', '2024-05-02','Rap',15,30);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('calalal', '2020-09-12','Techno',20,15);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('aisdjaiow', '2015-01-05','Techno',16,10);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('opaskdopaw', '2023-07-15','Jazz',3,34);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('lpwlawd', '2010-03-30','DnB',25,50);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('asdawd', '2007-02-14','Metal',30,13);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('album 37', '2013-03-27','37',37,37);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('POOPPOPOP', '2017-07-12','Boom boom',12,30);
INSERT INTO album (nome, dt_lanc, tipo, m, s)
VALUES ('ayyyyyy', '2024-12-24','Xmas',12,24);


/*musicas*/
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Hi-C', 'a', 'a',3,34,2020,'Rap', 1);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('musica fixe', 'a', 'a',2,20,2024,'Rock',2);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('outra musica', 'a', 'a',1,10,2015,'Pop',3);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Uoooou', 'a', 'a',5,58,2010,'Pop',3);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('mskdiw', 'a', 'a',0,34,2023,'Rap',1);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Long Shot', 'a', 'a',10,20,2012,'Rock',2);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Looby goon', 'a', 'a',8,50,2024,'Rap',1);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Feite damer', 'a', 'a',4,20,2000,'Rap',1);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('Money tree', 'a', 'a',2,35,2021,'Rap',1);
INSERT INTO musica (nome, link_mp3, letra, m, s, ano, genero,id_album)
VALUES ('loooo', 'a', 'a',3,45,2010,'Rock',2);
insert into musica_artista values
  (1,1),
  (1,2),
  (1,3),
  (2,4);
  

INSERT INTO faq (pergunta, resposta) VALUES
	('Como faço para cancelar a minha assinatura?', 'Basta acederes à tua conta e seguir as instruções de cancelamento.'),
	('Posso mudar o meu plano a qualquer momento?', 'Sim, podes fazer o upgrade do plano a qualquer momento.'),
	('Qual é a política de reembolso?', 'Oferecemos reembolso total dentro dos primeiros 30 dias após a compra.');