CREATE DATABASE IF NOT EXISTS livraria;
USE livraria;

DROP TABLE IF EXISTS tb_cidades;
DROP TABLE IF EXISTS tb_editoras;
DROP TABLE IF EXISTS tb_categorias;
DROP TABLE IF EXISTS tb_autores;
DROP TABLE IF EXISTS tb_usuarios;
DROP TABLE IF EXISTS tb_vendas;
DROP TABLE IF EXISTS tb_livros;
DROP TABLE IF EXISTS tb_autores_livros;
DROP TABLE IF EXISTS tb_categorias_livros;
DROP TABLE IF EXISTS tb_livros_vendas;

CREATE TABLE IF NOT EXISTS tb_cidades (
    id INT PRIMARY KEY,
    nome VARCHAR(45),
    estado VARCHAR(2) CHECK (estado IN ('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO'))
);

CREATE TABLE IF NOT EXISTS tb_editoras (
    id_editora INT PRIMARY KEY AUTO_INCREMENT,
    nome_editora VARCHAR(50),
    ativo VARCHAR(1) DEFAULT 'S' CHECK (ativo IN ('S','N'))
);

CREATE TABLE IF NOT EXISTS tb_categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome_categoria VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS tb_autores (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nome_autor VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS tb_usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50),
    data_nasc DATE CHECK ((date_part('year',current_date) - date_part('year',data_nasc) <= 100) 
    AND (date_part('year',current_date) - date_part('year',data_nasc) > 18)),
    email_usuario VARCHAR(50),
    cpf_usuario BIGINT (11) ZEROFILL,
    rg_usuario VARCHAR(40),
    telefone_usuario BIGINT (11) ZEROFILL,
    cep_usuario VARCHAR(20),
    rua_usuario VARCHAR(50),
    bairro_usuario VARCHAR(50),
    numero_casa_usuario VARCHAR(10),
    complemento VARCHAR(50),
    senha_usuario VARCHAR(32),
    tipo_usuario VARCHAR(1) DEFAULT 'C' CHECK (tipo_usuario IN ('C','A')),
    ativo VARCHAR(1) DEFAULT 'S' CHECK (ativo IN ('S','N')),
    fk_cidade INT,
    FOREIGN KEY (fk_cidade) REFERENCES tb_cidades(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tb_vendas (
    id_venda INT PRIMARY KEY AUTO_INCREMENT,
    data_venda DATE CHECK ((date_part('day',current_date) - date_part('day',data_venda) = TODAY()),
    fk_usuario INT,
    tipo_entrega VARCHAR(1) DEFAULT 'C' CHECK (tipo_entrega IN ('C','P')),
    valor_entrega FLOAT,
    cod_entrega VARCHAR(45),
    forma_pagamento VARCHAR(1) DEFAULT 'P' CHECK (forma_pagamento IN ('P','D')),
    FOREIGN KEY (fk_usuario) REFERENCES tb_usuarios(id_usuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tb_livros (
    id_livro INT PRIMARY KEY AUTO_INCREMENT,
    titulo_livro VARCHAR(50),
    valor_livro FLOAT(5,2),
    ativo VARCHAR(1) DEFAULT 'S' CHECK (ativo IN ('S','N')),
    volume_livro VARCHAR(20),
    fk_editora INT,
    imagem_livro VARCHAR(255),
    FOREIGN KEY (fk_editora) REFERENCES tb_editoras(id_editora)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tb_autores_livros (
    fk_autor INT,
    fk_livro INT,
    PRIMARY KEY (fk_autor, fk_livro),
    FOREIGN KEY (fk_autor) REFERENCES tb_autores(id_autor)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (fk_livro) REFERENCES tb_livros(id_livro)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tb_categorias_livros (
    fk_categoria INT,
    fk_livro INT,
    PRIMARY KEY (fk_categoria, fk_livro),
    FOREIGN KEY (fk_categoria) REFERENCES tb_categorias(id_categoria)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (fk_livro) REFERENCES tb_livros(id_livro)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tb_livro_vendas (
    fk_livro INT,
    fk_venda INT,
    valor_venda FLOAT(5,2),
    qnt_venda INT,
    id_livro_venda INT PRIMARY KEY,
    FOREIGN KEY (fk_livro) REFERENCES tb_livros(id_livro)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (fk_venda) REFERENCES tb_vendas(id_venda)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

