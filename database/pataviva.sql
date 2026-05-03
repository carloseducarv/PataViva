CREATE DATABASE pataviva;
USE pataviva;

-- TABELA USUARIOS
CREATE TABLE usuarios (
    usuario_id int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 

-- TABELA ANIMAIS 
CREATE TABLE animais(
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    sexo ENUM('m', 'f') NOT NULL,
    porte ENUM('pequeno', 'medio', 'grande') NOT NULL,
    idade INT
    descricao TEXT,
    status ENUM('para adoção', 'adotado') DEFAULT 'para adoção'
);

-- TABELA SOLICITACOES
CREATE TABLE solicitacoes(
    sol_id INT AUTO_INCREMENT PRIMARY KEY, 
    usuario_id INT NOT NULL,
    animal_id INT NOT NULL,
    dt_sol TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pendente', 'aprovado', 'negado') DEFAULT 'pendente',
    CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES animais(animal_id)
);

-- TABELA ADOCOES
CREATE TABLE adocoes(
    adocao_id INT AUTO_INCREMENT PRIMARY KEY, 
    sol_id INT NOT NULL UNIQUE,
    dt_adocao DATE NOT NULL,
    CONSTRAINT fk_solicitacao FOREIGN KEY (sol_id) REFERENCES solicitacoes(sol_id)
);