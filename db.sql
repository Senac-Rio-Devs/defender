CREATE DATABASE meubanco;
USE meubanco;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(255),
    cpf VARCHAR(11),
    endereco VARCHAR(255),
    telefone VARCHAR(20)
);
