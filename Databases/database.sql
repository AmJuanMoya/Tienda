

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


INSERT INTO t_usuarios VALUES
(NULL, "Admin", "admin", "admin@admin.com", "123456", "gerente", "avatar.png" );


CREATE TABLE t_pedido(
	id_pedido INT(11) AUTO_INCREMENT NOT NULL,
    id_usuario int(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    direccion VARCHAR(200) NOT null,
    costo FLOAT NOT NULL,
    estado VARCHAR(100),
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    
    CONSTRAINT fk_pedido FOREIGN KEY(id_usuario)REFERENCES t_usuarios(id_usuario),
    CONSTRAINT pk_pedido PRIMARY KEY (id_pedido)
);

INSERT INTO t_pedido VALUES
(NULL, 1, "Bogota", "Kr 99 A #51a Sur", 150.0, "pendiente", '2023-11-24','15:30:00');

