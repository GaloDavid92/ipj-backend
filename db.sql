CREATE TABLE usuarios(
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255),
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    username VARCHAR(25),
    cedula VARCHAR(10),
    clave VARCHAR(255),
    id_garante INT,
    PRIMARY KEY (id)
);