/*Creacion de la base de datos llamada  rolees*/
create database roles;

/*Usamos la base de datos*/
use roles;

/*Creacion de la tabla de tipo de usuario*/
CREATE TABLE tipo_usuario (
    tipo_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
    nombre_Tipo VARCHAR(100) NOT NULL);

/*Creacion de la tabla usuario (visitante), lo del nombre que no era usuario si no visitante
ya me di cuenta hasta el final y por el tiempo no pude cambiarlo :(*/
CREATE TABLE usuario( 
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
    nombre VARCHAR(200) NOT NULL ,  
    apellido_paterno VARCHAR(200) NOT NULL ,  
    apellido_materno VARCHAR(200) NOT NULL , 
    telefono VARCHAR(13),
    fechaNacimento date,
    email VARCHAR(200) NOT NULL UNIQUE ,  
    clave VARCHAR(200) NOT NULL ,  
    tipo_usuario INT NOT NULL );

/*Agregando la llave foranea de la tabla tipo usuario*/
ALTER TABLE usuario ADD FOREIGN KEY(tipo_usuario) REFERENCES tipo_usuario(tipo_usuario);
