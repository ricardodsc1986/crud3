DROP DATABASE IF EXISTS loja;
CREATE DATABASE loja;
USE loja;

CREATE TABLE produtos (
    idprod INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    pagamento VARCHAR(50) NOT NULL
);

INSERT INTO produtos (nome, tipo, preco, pagamento) VALUES
('Camiseta Esportiva', 'Roupas', 49.90, 'Cartão'),
('Calça de Moletom', 'Roupas', 89.90, 'Dinheiro'),
('Shorts de Corrida', 'Roupas', 59.90, 'Cartão'),
('Jaqueta Corta-Vento', 'Agasalhos', 129.90, 'Cartão'),
('Tênis de Corrida', 'Calçados', 199.90, 'Dinheiro'),
('Chuteira de Futebol', 'Calçados', 249.90, 'Cartão'),
('Agasalho Esportivo', 'Agasalhos', 159.90, 'Dinheiro'),
('Blusa de Frio', 'Agasalhos', 99.90, 'Cartão'),
('Bermuda de Praia', 'Roupas', 39.90, 'Dinheiro'),
('Sandalha Esportiva', 'Calçados', 79.90, 'Cartão');