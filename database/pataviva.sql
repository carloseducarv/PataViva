CREATE DATABASE pataviva;
USE pataviva;

-- TABELA USUARIOS
CREATE TABLE usuarios (
    usuario_id int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL
    created_at TIMESTAMP NOT NULL
); 

-- TABELA ANIMAIS 
CREATE TABLE animais(
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50),
    sexo ENUM('m', 'f'),
    porte ENUM('pequeno', 'medio', 'grande'),
    idade INT

);

-- TABELA ADOCOES
CREATE TABLE adocoes(
    adocao_id INT AUTO_INCREMENT PRIMARY KEY, 
    usuario_id INT NOT NULL,
    animal_id INT NOT NULL,
    dt_adocao DATE NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (animal_id) REFERENCES animais(animal_id),
);