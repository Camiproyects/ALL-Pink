CREATE TABLE tiendaoonline_admin (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE tiendaoonline_clientes (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE tiendaoonline_carro (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT(255) NOT NULL,
    id_producto INT(255) NOT NULL,
    cant INT(255) NOT NULL,
    talla VARCHAR(50) NOT NULL
);

CREATE TABLE tiendaoonline_productos (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    descripcionProducto TEXT,
    price DOUBLE(6,3),
    imagen VARCHAR(255),
    name VARCHAR(255),
    id_categoria INT(255),
    oferta INT(11)
);

CREATE TABLE tiendaoonline_enstock (
    idstock INT(255) PRIMARY KEY AUTO_INCREMENT,
    id_producto INT(255),
    cantidadStock INT(255),
    tallaS VARCHAR(50)
);

CREATE TABLE tiendaoonline_categorias (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(255) NOT NULL
);

CREATE TABLE tiendaoonline_compra (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT(255),
    fecha DATETIME NOT NULL,
    monto FLOAT NOT NULL,
    estado INT(11)
);

CREATE TABLE tiendaoonline_productos_compra (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    id_compra INT(255),
    id_producto INT(255),
    cantidad INT(255),
    monto FLOAT
);

CREATE TABLE tiendaoonline_pagos (
    id INT(255) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT(255),
    id_compra INT(255),
    comprobante VARCHAR(255),
    nombre VARCHAR(255),
    fecha DATETIME NOT NULL,
    estado INT(11)
);
