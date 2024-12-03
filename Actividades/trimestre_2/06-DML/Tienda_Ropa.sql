-- Insertar en Admin
INSERT INTO tiendaoonline_admin (username, password, name) VALUES 
('admin1', 'admin123', 'Administrador 1');

-- Insertar en Clientes
INSERT INTO tiendaoonline_clientes (username, password, name) VALUES 
('cliente1', 'pass123', 'Cliente Uno');

-- Insertar en Categorías
INSERT INTO tiendaoonline_categorias (categoria) VALUES 
('Ropa'),
('Electrónica'),
('Hogar');

-- Insertar en Productos
INSERT INTO tiendaoonline_productos (descripcionProducto, price, imagen, name, id_categoria, oferta) VALUES 
('Camiseta de algodón', 19.99, 'camiseta.jpg', 'Camiseta Básica', 1, 0),
('Smartphone gama media', 299.99, 'smartphone.jpg', 'Teléfono XY', 2, 1);

-- Insertar en Stock
INSERT INTO tiendaoonline_enstock (id_producto, cantidadStock, tallaS) VALUES 
(1, 50, 'M'),
(2, 20, NULL);

-- Insertar en Carro
INSERT INTO tiendaoonline_carro (id_cliente, id_producto, cant, talla) VALUES 
(1, 1, 2, 'M');

-- Insertar en Compras
INSERT INTO tiendaoonline_compra (id_cliente, fecha, monto, estado) VALUES 
(1, NOW(), 39.98, 1);

-- Insertar en Productos_Compra
INSERT INTO tiendaoonline_productos_compra (id_compra, id_producto, cantidad, monto) VALUES 
(1, 1, 2, 39.98);

-- Insertar en Pagos
INSERT INTO tiendaoonline_pagos (id_cliente, id_compra, comprobante, nombre, fecha, estado) VALUES 
(1, 1, '123ABC', 'Pago por Camisetas', NOW(), 1);
