/* Creación de DB */
CREATE DATABASE centro_medico_db;

/* Selección de DB */
USE centro_medico_db;

/* Creación de tablas */
CREATE TABLE Paciente(
	id_paciente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(20) NOT NULL,
	apellido VARCHAR(20) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    pais VARCHAR(20) NOT NULL,
    provincia VARCHAR(30) NOT NULL,
    localidad VARCHAR(30) NOT NULL,
    codigo_postal VARCHAR(8) NOT NULL,
    sexo VARCHAR(9) NOT NULL,
    dni INT(11) NOT NULL,
    telefono INT(10) NOT NULL,
    correo_electronico VARCHAR(70) NOT NULL,
    nota VARCHAR(200),
    grupo_sanguineo VARCHAR(3) NOT NULL,
    obra_social VARCHAR(10) NOT NULL,
    vacunacion_completa BIT NOT NULL,
    medicamento VARCHAR(200),
    nota_medica VARCHAR(200),
    id_zona_fk INT,
    id_enfermero_fk INT
);

CREATE TABLE Enfermero(
	id_enfermero INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    apellido VARCHAR(20) NOT NULL,
    dni INT(11) NOT NULL,
    id_zona_fk INT,
    telefono INT(10) NOT NULL,
    sexo VARCHAR(9) NOT NULL,
    correo_electronico VARCHAR(70) NOT NULL,
    id_especialidad_fk INT
);

CREATE TABLE Usuario(
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    correo_electronico VARCHAR(30) NOT NULL,
    id_tipo_usuario_fk INT
);

CREATE TABLE Especialidad(
	id_especialidad INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    especialidad VARCHAR(30) NOT NULL
);

CREATE TABLE Tipo_Usuario(
	id_tipo_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(200) NOT NULL
);

CREATE TABLE Llamado(
	id_llamado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_zona_fk INT,
    cantidad INT NOT NULL,
    tipo_llamado VARCHAR(30) NOT NULL,
    id_usuario_fk INT,
    tiempo_respuesta TIME NOT NULL,
    origen_llamado VARCHAR(20) NOT NULL,
    fecha_hora DATETIME NOT NULL
);

CREATE TABLE Zona(
	id_zona INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(10) NOT NULL
);



/* Alteración de tablas para relacionar llaves foráneas */
ALTER TABLE Paciente ADD CONSTRAINT zona_paciente_fk FOREIGN KEY (id_zona_fk) REFERENCES Zona(id_zona);
ALTER TABLE Paciente ADD CONSTRAINT enfermero_paciente_fk FOREIGN KEY (id_enfermero_fk) REFERENCES Enfermero(id_enfermero);

ALTER TABLE Enfermero ADD CONSTRAINT zona_enfermero_fk FOREIGN KEY (id_zona_fk) REFERENCES Zona(id_zona);
ALTER TABLE Enfermero ADD CONSTRAINT especialida_enfermero_fk FOREIGN KEY (id_especialidad_fk) REFERENCES Especialidad(id_especialidad);

ALTER TABLE Usuario ADD CONSTRAINT tipo_usuario_fk FOREIGN KEY (id_tipo_usuario_fk) REFERENCES Tipo_Usuario(id_tipo_usuario);

ALTER TABLE Llamado ADD CONSTRAINT zona_llamado_fk FOREIGN KEY (id_zona_fk) REFERENCES Zona(id_zona);
ALTER TABLE Llamado ADD CONSTRAINT usuario_llamado_fk FOREIGN KEY (id_usuario_fk) REFERENCES Usuario(id_usuario);



/* Inserción de datos en tablas */
INSERT INTO Especialidad(especialidad)
VALUES
    ('Endocrinología'),
    ('Pediatría'),
    ('Ginecología'),
    ('Cardiología'),
    ('Dermatología'),
    ('Gastroenterología'),
    ('Infectología'),
    ('Nefrología'),
    ('Oftalmología'),
    ('Otorrinolaringología'),
    ('Neurología'),
    ('Radiología'),
    ('Anestesiología'),
    ('Oncología'),
    ('Patología')
    ;

INSERT INTO Zona(nombre)
VALUES
    ('Zona 1'),
    ('Zona 2'),
    ('Zona 3'),
    ('Zona 4')
    ;

INSERT INTO Enfermero(nombre, apellido, dni, id_zona_fk, telefono, sexo, correo_electronico, id_especialidad_fk)
VALUES
    ('Ariel', 'Díaz', 44784701, 2, 1181618067, 'Masculino', 'arieldiaz@gmail.com', 2),
    ('Aaron', 'Ávila', 55562078, 3, 1174136813, 'Masculino', 'aaronavila@gmail.com', 4),
    ('Mariano', 'Aguiar', 53613106, 1, 1124801637, 'Masculino', 'marianoaguiar@gmail.com', 14),
    ('Sofía', 'Pérez', 65695555, 4, 1106924085, 'Femenino', 'sofiaperez@gmail.com', 6),
    ('Jorge', 'Acuña', 91797014, 3, 1192750163, 'Masculino', 'jorgeacuna@gmail.com', 9),
    ('Zoe', 'Agüero', 19408409, 2, 1155118699, 'Femenino', 'zoeaguero@gmail.com', 11),
    ('Miguel', 'Aguirre', 96960902, 4, 1162403105, 'Masculino', 'miguelaguirre@gmail.com', 10),
    ('Ana', 'Álvarez', 37702889, 4, 1104104379, 'Femenino', 'anaalvarez@gmail.com', 12),
    ('Héctor', 'Arias', 85735823, 4, 1196771392, 'Masculino', 'hectorarias@gmail.com', 8),
    ('Ramón', 'Correa', 67879408, 1, 1152138479, 'Masculino', 'ramoncorrea@gmail.com', 10),
    ('Silvia', 'Coronel', 58679346, 3, 1154196081, 'Femenino', 'silviacoronel@gmail.com', 3),
    ('Rosa', 'Blanco', 97309014, 2, 1122169265, 'Femenino', 'rosablanco@gmail.com', 12),
    ('Roberto', 'Cruz', 60120033, 1, 1124838914, 'Masculino', 'robertocruz@gmail.com', 3),
    ('Lucía', 'Domínguez', 44803844, 3, 1137433943, 'Femenino', 'luciadominguez@gmail.com', 7),
    ('Valentina', 'Duarte', 04995553, 2, 1141704010, 'Femenino', 'valentinaduarte@gmail.com', 13),
    ('Mario', 'Farías', 56760428, 4, 1137569052, 'Masculino', 'mariofarias@gmail.com', 4),
    ('Elena', 'Flores', 82474162, 1, 1144317150, 'Femenino', 'elenaflores@gmail.com', 3),
    ('Max', 'Franco', 25254332, 3, 1155810980, 'Masculino', 'maxfranco@gmail.com', 15),
    ('Henry', 'Guzmán', 86021601, 2, 1182486142, 'Masculino', 'henryguzman@gmail.com', 13),
    ('Martina', 'Molina', 02324611, 4, 1147431873, 'Femenino', 'martinamolina@gmail.com', 1)
    ;