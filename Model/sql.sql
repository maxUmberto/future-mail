CREATE DATABASE IF NOT EXISTS futuro_email;

USE futuro_email;

CREATE TABLE IF NOT EXISTS usuario(
    id_usuario INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL,
    nome VARCHAR(100) NOT NULL
    );

CREATE TABLE IF NOT EXISTS email(
    id_email INT(11) AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT(11) NOT NULL,
    destinatario VARCHAR(300) NOT NULL,
    assunto VARCHAR(200) NOT NULL,
    corpo TEXT NOT NULL,
    data_envio DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    );

CREATE TABLE IF NOT EXISTS redefinir_senha (
    id_usuario INT(12) PRIMARY KEY NOT NULL,
    token VARCHAR(32) NOT NULL,
    expira_em DATETIME NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    );
