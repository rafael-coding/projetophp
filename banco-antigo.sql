CREATE DATABASE php_migration_old

USE php_migration_old

CREATE TABLE pedido (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numero_pedido INT NOT NULL,
    nome_cliente VARCHAR(100) NOT NULL,
    cpf CHAR(11) NOT NULL,
    email NCHAR(100),
    dt_pedido DATETIME NOT NULL,
    cod_barras VARCHAR(20) NOT NULL,
    nome_produto VARCHAR(100),
    valor_unitario DECIMAL(8,2) NOT NULL,
    quantidade INT NOT NULL
);

INSERT INTO pedido values
	(DEFAULT, 1, "Rodrigo", "12345678912", "rodrigo@email.com", now(), "3123541384633646", "Água", 15.05, 10),
    (DEFAULT, 2, "Paulo", "32162594761", "paulo@email.com", now(), "6835435843543658", "Refrigerante", 15.05, 15),
    (DEFAULT, 3, "Pedro", "92341656917", "pedro@email.com", now(), "3153543516156435", "Cerveja", 15.05, 20),
    (DEFAULT, 4, "Lucas", "62579413684", "lucas@email.com", now(), "2654698384967560", "Suco de uva", 15.05, 25),
    (DEFAULT, 5, "João", "62594136874", "joao@email.com", now(), "6351569023105478", "Açúcar", 15.05, 19),
    (DEFAULT, 6, "Vinícius", "30256105973", "vinicius@email.com", now(), "9531647890321546", "Feijão", 15.05, 35),
    (DEFAULT, 7, "Eduardo", "10236520048", "edu@email.com", now(), "3025046089047035", "Sal", 15.05, 6),
    (DEFAULT, 8, "Victor", "30641978026", "victor@email.com", now(), "9567619438207901", "Pão", 15.05, 10),
    (DEFAULT, 9, "Henrique", "41360594762", "henrique@email.com", now(), "1063054096123780", "Arroz", 15.05, 8),
    (DEFAULT, 10, "Mateus", "36985214701", "mateus@email.com", now(), "9642381039705604", "Macarrão", 15.05, 5);

select * from pedido;
