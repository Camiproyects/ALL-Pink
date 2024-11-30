CREATE DATABASE TiendaOnline;
USE TiendaOnline;

CREATE TABLE Admin(
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id),
	username VARCHAR(50),
	password VARCHAR(50),
	name VARCHAR(50)
);

INSERT INTO Admin(username,password,name) VALUES ('a','12345',' ad');

#-------------------------------------------------------------------------------------

CREATE TABLE clientes(
	id INT(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id),
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	name VARCHAR(255) NOT NULL
);

#-------------------------------------------------------------------------------------

CREATE TABLE Productos (
  	id INT(255) NOT NULL,
	PRIMARY KEY(id),
	descripcionProducto TEXT,
  	price double(6,3) NOT NULL,
  	imagen varchar(255) NOT NULL,
  	name varchar(255) NOT NULL,
  	id_categoria int(11) NOT NULL,
  	oferta int(11) NOT NULL
);

#-------------------------------------------------------------------------------------

CREATE TABLE EnStock(
	idstock INT(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (idstock),
	id_producto INT (255),
	cantidadStock INT(255),
	TallaS VARCHAR(50)
);

#-------------------------------------------------------------------------------------

CREATE TABLE carro (
	id int(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
  	id_cliente int(255) NOT NULL,
  	id_producto int(255) NOT NULL,
  	cant int(255) NOT NULL,
	talla VARCHAR(50) NOT NULL
);

#-------------------------------------------------------------------------------------

CREATE TABLE Compra (
	id int(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	id_cliente int(255),
	fecha DATETIME,
	monto FLOAT,
	estado INT
);

#-------------------------------------------------------------------------------------

CREATE TABLE Productos_Compra (
	id int(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	id_compra INT(255),
	id_producto INT(255),
	cantidad INT(255),
	monto FLOAT
);

#-------------------------------------------------------------------------------------

CREATE TABLE categorias(
	id INT(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	categoria VARCHAR(255)
);

#-------------------------------------------------------------------------------------

CREATE TABLE pagos (
   	id int(255) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
   	id_cliente int(255) NOT NULL,
   	id_compra int(255) NOT NULL,
   	comprobante varchar(255) NOT NULL,
   	nombre varchar(255) NOT NULL,
   	fecha datetime NOT NULL,
   	estado int(11) NOT NULL
);

-- Cambiar a la base de datos
USE TiendaOnline;

-- Llenar tabla Admin
INSERT INTO Admin(username, password, name) 
VALUES 
('admin1', 'password123', 'Administrador Principal');

-- Llenar tabla clientes
INSERT INTO clientes(username, password, name) 
VALUES 
('juan_perez', 'password123', 'Juan Pérez'),
('maria_lopez', 'secure456', 'María López'),
('carlos_gomez', 'clave789', 'Carlos Gómez'),
('ana_rojas', 'pass123', 'Ana Rojas'),
('pedro_ramirez', 'password321', 'Pedro Ramírez'),
('laura_martinez', 'secure654', 'Laura Martínez'),
('david_fernandez', 'clave987', 'David Fernández'),
('sandra_garcia', 'pass456', 'Sandra García'),
('jorge_herrera', 'password789', 'Jorge Herrera'),
('claudia_moreno', 'secure123', 'Claudia Moreno');

-- Llenar tabla categorias
INSERT INTO categorias(categoria) 
VALUES 
('Ropa'),
('Calzado'),
('Accesorios');

-- Llenar tabla Productos
INSERT INTO Productos(id, descripcionProducto, price, imagen, name, id_categoria, oferta) 
VALUES 
(1, 'Camisa de algodón para hombre', 45.000, 'img/camisa1.jpg', 'Camisa', 1, 0),
(2, 'Zapatos deportivos para mujer', 120.000, 'img/zapatos1.jpg', 'Zapatos', 2, 1),
(3, 'Bolso casual de cuero', 85.000, 'img/bolso1.jpg', 'Bolso', 3, 0),
(4, 'Camiseta básica', 25.000, 'img/camiseta.jpg', 'Camiseta', 1, 0),
(5, 'Sandalias de playa', 50.000, 'img/sandalias.jpg', 'Sandalias', 2, 1);

-- Llenar tabla EnStock
INSERT INTO EnStock(id_producto, cantidadStock, TallaS) 
VALUES 
(1, 50, 'M'),
(2, 30, '38'),
(3, 20, 'Única'),
(4, 100, 'L'),
(5, 40, '39');

-- Llenar tabla carro
INSERT INTO carro(id_cliente, id_producto, cant, talla) 
VALUES 
(1, 1, 2, 'M'),
(2, 2, 1, '38'),
(3, 4, 3, 'L'),
(4, 5, 1, '39');

-- Llenar tabla Compra
INSERT INTO Compra(id_cliente, fecha, monto, estado) 
VALUES 
(1, NOW(), 90.000, 1),
(2, NOW(), 120.000, 0),
(3, NOW(), 75.000, 1);

-- Llenar tabla Productos_Compra
INSERT INTO Productos_Compra(id_compra, id_producto, cantidad, monto) 
VALUES 
(1, 1, 2, 90.000),
(2, 2, 1, 120.000),
(3, 4, 3, 75.000);

-- Llenar tabla pagos
INSERT INTO pagos(id_cliente, id_compra, comprobante, nombre, fecha, estado) 
VALUES 
(1, 1, 'ABC123', 'Juan Pérez', NOW(), 1),
(2, 2, 'DEF456', 'María López', NOW(), 0),
(3, 3, 'GHI789', 'Carlos Gómez', NOW(), 1);
