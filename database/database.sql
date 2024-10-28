CREATE DATABASE IF NOT EXISTS fruteria;
USE fruteria;

CREATE TABLE IF NOT EXISTS t_usuarios(
    id_usuario  int(11) auto_increment NOT NULL,
    nombre      varchar(100) NOT NULL,
    apellidos   varchar(100) NOT NULL,
    email       varchar(200) NOT NULL,
    password    varchar(200) NOT NULL,
    rol         varchar(20),
    imagen      varchar(255),
    CONSTRAINT  pk_usuario PRIMARY KEY(id_usuario),
    CONSTRAINT  uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO t_usuarios VALUES(NULL, 'Admin','Admin','admin@admin.com','contrasena','admin','imagen');


CREATE TABLE IF NOT EXISTS t_categorias(
    id_categoria    int(11) auto_increment NOT NULL,
    nombre          varchar(100) NOT NULL,
    CONSTRAINT  pk_categoria PRIMARY KEY(id_categoria)
)ENGINE=InnoDb;

INSERT INTO t_categorias VALUES(NULL, 'Contruccion'),(NULL, 'Electricos'),(NULL,'Tuberia');


CREATE TABLE IF NOT EXISTS t_productos(
    id_producto int(11) auto_increment NOT NULL,
    nombre      varchar(100) NOT NULL,
    precio      float(100,2) NOT NULL,
    stock       int(100) NOT NULL,
    oferta      varchar(20) NOT NULL,
    fecha       date NOT NULL,
    imagen      varchar(255),
    id_categoria int(11)   NOT NULL,
    CONSTRAINT  pk_producto PRIMARY KEY(id_producto),
    CONSTRAINT  fk_producto_categoria FOREIGN KEY(id_categoria) REFERENCES t_categorias(id_categoria)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS t_pedidos(
    id_pedido   int(11) auto_increment NOT NULL,
    id_usuario  int(11) NOT NULL,
    ciudad      varchar(100) NOT NULL,
    direccion   varchar(200) NOT NULL,
    costo       float(100,2) NOT NULL,
    estado      varchar(20) NOT NULL,
    fecha       date,
    hora        time,
    CONSTRAINT  pk_pedidos PRIMARY KEY(id_pedido),
    CONSTRAINT  fk_pedido_usuario FOREIGN KEY(id_usuario) REFERENCES t_usuarios(id_usuario)
)ENGINE=InnoDb;


CREATE TABLE IF NOT EXISTS t_lineasPedidos(
    id_lineapedido  int(11) auto_increment NOT NULL,
    id_Pedido   int(11) NOT NULL,
    id_producto int(11) NOT NULL,
    unidades    int(10),
    CONSTRAINT  pk_linea_pedido PRIMARY KEY(id_lineapedido),
    CONSTRAINT  fk_linea_pedido FOREIGN KEY(id_pedido) REFERENCES t_pedidos(id_pedido),
    CONSTRAINT  fk_linea_producto FOREIGN KEY(id_producto) REFERENCES t_productos(id_producto)
)ENGINE=InnoDb;