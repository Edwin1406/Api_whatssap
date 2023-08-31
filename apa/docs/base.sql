-- Creación de la tabla 'Autores'
CREATE TABLE Autores (
    autor_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255),
    fecha_nacimiento DATE,
    nacionalidad VARCHAR(255),
    genero_favorito VARCHAR(255),
    biografia TEXT,
    INDEX (autor_id) -- Agregamos un índice para el autor_id para mejorar el rendimiento de las consultas
);

-- Creación de la tabla 'Libros'
CREATE TABLE Libros (
    libro_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fecha_publicacion DATE,
    editorial VARCHAR(255),
    genero VARCHAR(255),
    sinopsis TEXT,
    autor_id INT,
    FOREIGN KEY (autor_id) REFERENCES Autores(autor_id) ON DELETE CASCADE,  -- Agregado ON DELETE CASCADE para manejar eliminaciones
    INDEX (libro_id)  -- Agregamos un índice para el libro_id para mejorar el rendimiento de las consultas
);
