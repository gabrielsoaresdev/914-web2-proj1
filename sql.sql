drop DATABASE loja;
CREATE DATABASE loja;
USE loja;

CREATE TABLE usuarios (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(120),
    cpf INT UNIQUE KEY,
    email VARCHAR(120) UNIQUE KEY,
    username VARCHAR(120) UNIQUE KEY,
    password VARCHAR(120),
    is_admin BOOLEAN
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
    FOREIGN KEY (id_adm) REFERENCES usuarios(id)
);

CREATE TABLE compras (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_cliente INT,
    id_produto INT,
    FOREIGN KEY (id_cliente) REFERENCES usuarios(id),
    FOREIGN KEY (id_produto) REFERENCES produtos(id)
);

INSERT INTO usuarios (nome, username, password, is_admin) values ('Administrador', 'admin', 'admin', true);