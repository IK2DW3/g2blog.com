/* Crear la base de datos si no existe */
CREATE DATABASE IF NOT EXISTS bdg2blog;

/* Ponemos como condición la base de datos que vamos a usar */
USE bdg2blog;

/*Borramos la tabla si existe */
DROP TABLE IF EXISTS `usuarios`;
/* Creamos la tabla de usuarios */
CREATE TABLE usuarios(
	nombre_usuario VARCHAR(20) NOT NULL,
  password VARCHAR(20) NOT NULL,
  email VARCHAR(40) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	apellidos VARCHAR(255) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  num_telefono INT(9) DEFAULT NULL,
	sexo CHAR NOT NULL,
  entradas_publicadas INT(255) DEFAULT '0',

	PRIMARY KEY(nombre_usuario)
);
INSERT INTO `usuarios` VALUES ('admin','admin','ruben.izcara@gmail.com','G2RD', 'Administrador', '2019-10-16', '611111111', 'O', 0);

/*Borramos la tabla si existe */
DROP TABLE IF EXISTS `entradas`;
/* Creamos la tabla de usuarios */
CREATE TABLE entradas(
	id INT(255) NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(30) DEFAULT NULL COMMENT 'Título de la entrada',
  descripcion VARCHAR(255) DEFAULT NULL COMMENT 'Contenido',
  fecha_publicacion DATE NOT NULL,
  categoria CHAR NOT NULL,
  num_comentarios INT(255) DEFAULT '0',
  name_usuario VARCHAR(20) NOT NULL,
  FOREIGN KEY (name_usuario) REFERENCES usuarios(nombre_usuario),

	PRIMARY KEY(id)
);

/*Borramos la tabla si existe */
DROP TABLE IF EXISTS `comentarios`;
/* Creamos la tabla de usuarios */
CREATE TABLE comentarios(
	id INT(255) NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(255) DEFAULT NULL COMMENT 'Contenido',
  fecha_comentario DATE NOT NULL,
  id_entrada INT(255) DEFAULT NULL COMMENT 'Título de la entrada',
  name_usuario VARCHAR(20) NOT NULL,
  FOREIGN KEY (id_entrada) REFERENCES entradas(id),
  FOREIGN KEY (name_usuario) REFERENCES usuarios(nombre_usuario),

	PRIMARY KEY(id)
);