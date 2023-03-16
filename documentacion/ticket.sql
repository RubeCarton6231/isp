CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario SERIAL PRIMARY KEY,
	  Email VARCHAR(255) NOT NULL UNIQUE,
	  Nombre VARCHAR(255) NOT NULL,
	  Rol JSON,
	  Clave VARCHAR(255) NOT NULL,
	  Estado VARCHAR(1) NOT NULL DEFAULT 'A'
);

CREATE TABLE IF NOT EXISTS Cliente (
    id_cliente SERIAL PRIMARY KEY,
    id_usuario INT NOT NULL REFERENCES Usuario(id_usuario),
    estado VARCHAR(1) DEFAULT 'A' NOT NULL
);

CREATE TABLE IF NOT EXISTS Tecnico (
    id_tecnico SERIAL PRIMARY KEY,
    id_usuario INT NOT NULL REFERENCES Usuario(id_usuario),
    estado VARCHAR(1) DEFAULT 'A' NOT NULL
);


CREATE TABLE IF NOT EXISTS Facturacion (
    id_facturacion SERIAL PRIMARY KEY,
    id_cliente INT NOT NULL REFERENCES Cliente(id_cliente),
    id_tipo_trabajo INT NOT NULL REFERENCES TipoTrabajo(id_tipo_trabajo),
    estado VARCHAR(1) DEFAULT 'A' NOT NULL
);

CREATE TABLE IF NOT EXISTS Gerente (
    id_gerente SERIAL PRIMARY KEY,
    id_usuario INT NOT NULL REFERENCES Usuario(id_usuario),
    estado VARCHAR(1) DEFAULT 'A' NOT NULL
);
CREATE TABLE IF NOT EXISTS Ticket (
    id_ticket SERIAL PRIMARY KEY,
    fecha_creacion DATE NOT NULL,
    descripcion_problema VARCHAR(1000) NOT NULL,
	tipo VARCHAR(255) NOT NULL UNIQUE,
    valor_hora NUMERIC(10,2) NOT NULL,
    estado VARCHAR(1) DEFAULT 'A' NOT NULL,
    id_cliente INT NOT NULL REFERENCES Cliente(id_cliente),
    id_tecnico INT NOT NULL REFERENCES Tecnico(id_tecnico)
);

CREATE TABLE IF NOT EXISTS Facturador (
    id_facturador SERIAL PRIMARY KEY,
    id_usuario INT NOT NULL REFERENCES Usuario(id_usuario),
    estado VARCHAR(1) DEFAULT 'A' NOT NULL
);
-- DROP TABLE IF EXISTS Ticket;
-- DROP TABLE IF EXISTS Gerente;
-- DROP TABLE IF EXISTS Facturacion;
-- DROP TABLE IF EXISTS Tecnico;
-- DROP TABLE IF EXISTS Cliente;
-- DROP TABLE IF EXISTS Facturador;
-- DROP TABLE IF EXISTS Usuario;

INSERT INTO Usuario (Email, Nombre, Rol, Clave, Estado) 
VALUES ('ejemplo@correo.com', 'Juan Pérez', '{"rol": "usuario"}', 'clave123', 'A');