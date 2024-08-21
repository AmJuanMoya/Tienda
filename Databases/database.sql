

-- creacion Database
CREATE DATABASE tienda;
-- Abrir base de datos
USE tienda;

-- CREACION DE LAS TABLAS
CREATE TABLE t_usuarios(

    id_usuario  int(11) auto_increment NOT NULL,
    nombre      varchar(100)  NOT NULL,
    apellidos   varchar(100)  NOT NULL,
    email       varchar(100)  NOT NULL,
    password    varchar(200)  NOT NULL,
    rol         varchar(20),
    imagen      varchar(255),
    CONSTRAINT pk_usuario PRIMARY KEY(id_usuario),
    CONSTRAINT uq_email UNIQUE(email)
) ENGINE=InnoDB;


--  Creacion de La tabla Pedidos: 
CREATE TABLE t_pedido(
	id_pedido INT(11) AUTO_INCREMENT NOT NULL,
    id_usuario int(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT null,
    costo FLOAT(10,2) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    CONSTRAINT fk_pedido FOREIGN KEY(id_usuario)REFERENCES t_usuarios(id_usuario),
    CONSTRAINT pk_pedido PRIMARY KEY (id_pedido)
)ENGINE=InnoDB;

-- Tabla de Categorias
CREATE TABLE t_categorias(

    id_categoria  INT(11) auto_increment NOT NULL,
    categoria  VARCHAR(200) NOT NULL,
    CONSTRAINT pk_categoria PRIMARY KEY(id_categoria)
) ENGINE=InnoDB;

CREATE TABLE t_productos (

        id_producto INT(11) auto_increment NOT NULL,
        producto VARCHAR(100) NOT NULL,
        precio FLOAT(10,2) NOT NULL,
        stock INT(100) NOT NULL,
        oferta VARCHAR(2) NOT NULL,
        fecha DATE NOT NULL,
        imagen VARCHAR(200),
        id_categoria INT(11) NOT NULL,
        CONSTRAINT fk_producto_categoria FOREIGN KEY(id_categoria) REFERENCES t_categorias(id_categoria),
        CONSTRAINT pk_producto PRIMARY KEY(id_producto)
)ENGINE=InnoDB;

-- Tabla intermedia entre Pedidos y Productos:
CREATE TABLE t_lineaPedidos(

    id_lineaPedido INT(11) auto_increment NOT NULL,
    id_pedido INT(11) NOT NULL,
    id_producto INT(11) NOT NULL,
    unidades INT(11) NOT NULL,

    CONSTRAINT pk_lineaPedidos PRIMARY KEY(id_lineaPedido),
    CONSTRAINT fk_pedido_lineaPedido FOREIGN KEY(id_pedido) REFERENCES t_pedido(id_pedido),
    CONSTRAINT fk_producto_lineaPedido FOREIGN KEY(id_producto) REFERENCES t_productos(id_producto)
) ENGINE=InnoDB;



-- Creacion de algunos Datos.....

INSERT INTO t_pedido VALUES
(NULL, 1, "Bogota", "Kr 99 A #51a Sur", 150.0, "pendiente", '2023-11-24','15:30:00');

INSERT INTO t_usuarios VALUES
(NULL, "Admin", "admin", "admin@admin.com", "123456", "gerente", "avatar.png" );

