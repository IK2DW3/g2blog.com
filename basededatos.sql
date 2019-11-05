/* Crear la base de datos si no existe */
CREATE DATABASE IF NOT EXISTS bdg2blog;

/* Ponemos como condición la base de datos que vamos a usar */
USE bdg2blog;

/*Borramos la tabla si existe */
DROP TABLE IF EXISTS `usuarios`;
/* Creamos la tabla de usuarios */
CREATE TABLE usuarios(
	nombre_usuario VARCHAR(20) NOT NULL,
  password VARBINARY(200) NOT NULL,
	tipo_usuario VARCHAR(20) DEFAULT 'Usuario',
  email VARCHAR(40) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	apellidos VARCHAR(255) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
	sexo CHAR NOT NULL,
	terminos_condi VARCHAR(3) NOT NULL DEFAULT 'No',
  entradas_publicadas INT(255) DEFAULT '0',
	img_avatar VARCHAR(255) DEFAULT 'default.png',
	fecha_creacion DATE NOT NULL,

	PRIMARY KEY(nombre_usuario)
);
INSERT INTO `usuarios` VALUES ('Admin','$2y$10$Yz9C9XhGfHMBrTDJTK0.5O9ndvTPtllh1V4c8K2ZNbAB.SE8y5B6G','Administrador','ruben.izcara@gmail.com','G2RD', 'Administrador', '2019-10-16', 'O', 'Yes', 0, 'default.png', '2019-10-16');

/*Borramos la tabla si existe */
DROP TABLE IF EXISTS `entradas`;
/* Creamos la tabla de usuarios */
CREATE TABLE entradas(
	id INT(255) NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(50) DEFAULT NULL COMMENT 'Título de la entrada',
  descripcion VARCHAR(5000) DEFAULT NULL COMMENT 'Contenido',
	img_entrada VARCHAR(255) COMMENT 'Imagen publicada',
  fecha_publicacion DATE NOT NULL,
	hora_publicacion TIME,
  categoria VARCHAR(30) NOT NULL,
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
  descripcion VARCHAR(200) DEFAULT NULL COMMENT 'Contenido',
  fecha_comentario DATE NOT NULL,
	hora_comentario TIME,
  id_entrada INT(255) DEFAULT NULL COMMENT 'Título de la entrada',
  name_usuario VARCHAR(20) NOT NULL,
  FOREIGN KEY (id_entrada) REFERENCES entradas(id),
  FOREIGN KEY (name_usuario) REFERENCES usuarios(nombre_usuario),

	PRIMARY KEY(id)
);
