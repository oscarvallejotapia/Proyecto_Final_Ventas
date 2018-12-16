CREATE TABLE venta (
    venta_id INT PRIMARY KEY AUTO_INCREMENT,
    fecha_factura DATE,
    folio VARCHAR(10),
    fecha_registro DATE,
    cliente_id INT,
    cerrado TINYINT(1),
    FOREIGN KEY (cliente_id) REFERENCES clientes (cliente_id)
);

CREATE TABLE detalle_venta (
    detalle_id INT PRIMARY KEY AUTO_INCREMENT,
    cantidad INT,
    precio DECIMAL(10,0),
    venta_id INT,
    producto_id INT,
    FOREIGN KEY (venta_id) REFERENCES venta (venta_id)
);