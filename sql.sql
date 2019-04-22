CREATE DATABASE loja;
USE loja;

CREATE TABLE adms (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(120),
    cpf INT UNIQUE KEY,
    email VARCHAR(120) UNIQUE KEY,
    username VARCHAR(120) UNIQUE KEY,
    password VARCHAR(120)
);

CREATE TABLE produtos (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(120),
    descricao TEXT,
    imagem_url VARCHAR(300),
    preco DECIMAL(7,2),
    quantidade INT,
    categoria INT,
    id_adm INT,
    FOREIGN KEY (id_adm) REFERENCES adms(id)
);

CREATE TABLE clientes (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(120),
    cpf INT UNIQUE KEY,
    email VARCHAR(120) UNIQUE KEY,
    username VARCHAR(120) UNIQUE KEY,
    password VARCHAR(120)
);

CREATE TABLE compras (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_cliente INT,
    id_produto INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_produto) REFERENCES produtos(id)
);

INSERT INTO adms (nome, username, password) values ('Admin', 'admin', 'admin');