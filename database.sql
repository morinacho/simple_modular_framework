-- Crear el esquema "personas"
CREATE SCHEMA people;

CREATE TABLE people.gender(
    id serial4 NOT NULL,
    name VARCHAR(80),
    CONSTRAINT gender_pkey PRIMARY KEY (id)
);

CREATE TABLE people.nationality(
    id serial4 NOT NULL,
    name VARCHAR(180),
    CONSTRAINT nationality_pkey PRIMARY KEY (id)
);

CREATE TABLE people.personal_information (
    id serial4 NOT NULL,
    first_name VARCHAR(80),
    last_name VARCHAR(80),
    personal_id VARCHAR(80),
    birth_date DATE,
    image_src VARCHAR(250)
    gender_id serial4 NOT NULL,
    nationality_id serial4 NOT NULL,
    country_date_entry DATE,
    status int4 NOT NULL DEFAULT 0,
    CONSTRAINT personal_information_pkey PRIMARY KEY (id)
);
ALTER TABLE people.personal_information  ADD CONSTRAINT personal_information_gender_id_fkey FOREIGN KEY (gender_id) REFERENCES people.gender(id);
ALTER TABLE people.personal_information  ADD CONSTRAINT personal_information_nationality_id_fkey FOREIGN KEY (nationality_id) REFERENCES people.nationality(id);

CREATE TABLE people.contact_type(
    id serial4 NOT NULL,
    name VARCHAR(100),
    CONSTRAINT contact_type_pkey PRIMARY KEY (id)
);

CREATE TABLE people.contact(
    id serial4 NOT NULL,
    contact_value VARCHAR(255),
    contact_type_id serial4 NOT NULL,
    personal_information_id serial4 NOT NULL,
    CONSTRAINT contact_pkey PRIMARY KEY (id)
);
ALTER TABLE people.contact  ADD CONSTRAINT contact_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);

CREATE TABLE people.user_rol(
    id serial4 NOT NULL,
    name VARCHAR(100),
    CONSTRAINT user_rol_pkey PRIMARY KEY (id)
);
CREATE TABLE people.user(
    id serial4 NOT NULL,
    username VARCHAR(250),
    password VARCHAR(250),
    token VARCHAR(250),
    user_rol_id serial4 NOT NULL,
    CONSTRAINT user_pkey PRIMARY KEY (id)
);
ALTER TABLE people.user ADD CONSTRAINT user_user_rol_id_fkey FOREIGN KEY (user_rol_id) REFERENCES people.user_rol(id);

-- Crear el esquema "recursos_humanos"
CREATE SCHEMA human_resources;

-- Crear el esquema "control_de_stock"
CREATE SCHEMA stock_control;

-- Crear el esquema "gestion_de_alumnos"
CREATE SCHEMA academic;

-- Crear el esquema "gestion_de_eventos"
CREATE SCHEMA events;

-- Crear el esquema "gestion_contable"
CREATE SCHEMA accountant;

-- Crear el esquema "gestion_legales"
CREATE SCHEMA legal;

-- Crear el esquema "gestion_de_incidencias"
CREATE SCHEMA incidence;

-- Crear el esquema "mensajeria"
CREATE SCHEMA communication;

-- Crear el esquema "gestion_de_tareas"
CREATE SCHEMA tasks;

-- Crear el esquema "gestion_de_vigilancia"
CREATE SCHEMA surveillance;

-- Crear el esquema "gestion_de_turnos"
CREATE SCHEMA shifts;

-- Crear el esquema "gestion_de_encuestas"
CREATE SCHEMA surveys;

-- Crear el esquema "blog"
CREATE SCHEMA blog;

-- Crear el esquema "gestion_de_mantenimiento"
CREATE SCHEMA maintenance;
