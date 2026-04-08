CREATE TABLE pizzas (
    idPizza INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    ingredientes VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);

CREATE TABLE bebidas (
    idBebida INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    litros VARCHAR(50) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);

INSERT INTO pizzas (nome, ingredientes, valor) VALUES
('Calabresa', 'Mussarela, calabresa fatiada e cebola', 45.50),
('Mussarela', 'Mussarela e molho de tomate', 40.00),
('Frango com Catupiry', 'Frango desfiado, catupiry e mussarela', 52.90),
('Portuguesa', 'Mussarela, presunto, ovo, ervilha, cebola e calabresa', 62.90),
('Moda do Juca', 'Mussarela, peito de peru, palmito, alho poró e alcaparras', 72.50);

INSERT INTO bebidas (nome,litros, valor) VALUES
('Suco de laranja','1L', 15.50),
('Coca-cola lata','350 ml', 5.00),
('Fanta uva lata','350 ml', 4.90),
('Àgua com gás','500 ml', 62.90),
('Juca cola','1.5L', 10.50);
