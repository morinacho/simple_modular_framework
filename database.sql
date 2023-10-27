-- Crear el esquema "personas"
CREATE SCHEMA people;

CREATE TABLE people.genders(
    id serial4 NOT NULL,
    name VARCHAR(80),
    CONSTRAINT genders_pkey PRIMARY KEY (id)
);

CREATE TABLE people.nationalities(
    id serial4 NOT NULL,
    name VARCHAR(180),
    CONSTRAINT nationalities_pkey PRIMARY KEY (id)
);

CREATE TABLE people.personal_information (
    id serial4 NOT NULL,
    first_name VARCHAR(80),
    last_name VARCHAR(80),
    personal_id VARCHAR(80),
    birth_date DATE,
    image_src VARCHAR(250),
    gender_id serial4 NOT NULL,
    nationality_id serial4 NOT NULL,
    country_date_entry DATE,
    status int4 NOT NULL DEFAULT 0,
    CONSTRAINT personal_information_pkey PRIMARY KEY (id)
);
ALTER TABLE people.personal_information  ADD CONSTRAINT personal_information_gender_id_fkey FOREIGN KEY (gender_id) REFERENCES people.genders(id);
ALTER TABLE people.personal_information  ADD CONSTRAINT personal_information_nationality_id_fkey FOREIGN KEY (nationality_id) REFERENCES people.nationalities(id);

CREATE TABLE people.contacts_types(
    id serial4 NOT NULL,
    name VARCHAR(100),
    CONSTRAINT contacts_types_pkey PRIMARY KEY (id)
);

CREATE TABLE people.contacts(
    id serial4 NOT NULL,
    contact_value VARCHAR(255),
    contact_type_id serial4 NOT NULL,
    personal_information_id serial4 NOT NULL,
    CONSTRAINT contacts_pkey PRIMARY KEY (id)
);
ALTER TABLE people.contacts ADD CONSTRAINT contacts_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);
ALTER TABLE people.contacts ADD CONSTRAINT contacts_contact_type_id_fkey FOREIGN KEY (contact_type_id) REFERENCES people.contacts_types(id);


CREATE TABLE people.countries(
    id serial4 NOT NULL,
    name VARCHAR(250),
    CONSTRAINT countries_pkey PRIMARY KEY (id)
);
CREATE TABLE people.provinces( 
    id serial4 NOT NULL,
    name VARCHAR(200),
    country_id serial4 NOT NULL,
    CONSTRAINT provinces_pkey PRIMARY KEY (id)
);
ALTER TABLE people.provinces ADD CONSTRAINT provinces_country_id_fkey FOREIGN KEY (country_id) REFERENCES people.countries(id);


CREATE TABLE people.cities(
    id serial4 NOT NULL,
    name VARCHAR(200),
    province_id serial4 NOT NULL,
    CONSTRAINT cities_pkey PRIMARY KEY (id)
);
ALTER TABLE people.cities ADD CONSTRAINT cities_province_id_fkey FOREIGN KEY (province_id) REFERENCES people.provinces(id);

CREATE TABLE people.address(
    id serial4 NOT NULL,
    street VARCHAR(100),
    num VARCHAR(8),
    city_id serial4 NOT NULL,
    personal_information_id serial4 NOT NULL,
    CONSTRAINT address_pkey PRIMARY KEY (id)
); 
ALTER TABLE people.address ADD CONSTRAINT address_city_id_fkey FOREIGN KEY (city_id) REFERENCES people.cities(id);
ALTER TABLE people.address ADD CONSTRAINT address_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);

CREATE TABLE people.users_roles(
    id serial4 NOT NULL,
    name VARCHAR(100),
    CONSTRAINT users_roles_pkey PRIMARY KEY (id)
);
CREATE TABLE people.users(
    id serial4 NOT NULL,
    username VARCHAR(250),
    password VARCHAR(250),
    token VARCHAR(250),
    users_roles_id serial4 NOT NULL,
    personal_information_id serial4 NOT NULL,
    CONSTRAINT user_pkey PRIMARY KEY (id)
);
ALTER TABLE people.users ADD CONSTRAINT users_users_roles_id_fkey FOREIGN KEY (users_roles_id) REFERENCES people.users_roles(id);
ALTER TABLE people.users ADD CONSTRAINT users_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);




-- Crear el esquema "recursos_humanos"
CREATE SCHEMA human_resources;

CREATE TABLE human_resources.departments(
    id serial4 NOT NULL,
    name VARCHAR(250),
    CONSTRAINT departments_pkey PRIMARY KEY (id)
);

CREATE TABLE human_resources.areas( 
    id serial4 NOT NULL,
    name VARCHAR(250),
    department_id serial4 NOT NULL,
    CONSTRAINT areas_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.areas ADD CONSTRAINT areas_department_id_fkey FOREIGN KEY (department_id) REFERENCES human_resources.departments(id);

CREATE TABLE human_resources.positions(
    id serial4 NOT NULL,
    name VARCHAR(250),
    area_id serial4 NOT NULL,
    CONSTRAINT positions_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.positions ADD CONSTRAINT positions_area_id_fkey FOREIGN KEY (area_id) REFERENCES human_resources.areas(id);

CREATE TABLE human_resources.employees_categories(
    id serial4 NOT NULL,
    name VARCHAR(250),
    CONSTRAINT employees_categories_pkey PRIMARY KEY (id)
);

CREATE TABLE human_resources.employees(
    id serial4 NOT NULL,
    hire_date DATE,
    discharge_date DATE,
    internal_email VARCHAR(250),
    internal_phone VARCHAR(20),
    personal_information_id serial4 NOT NULL,
    position_id serial4 NOT NULL,
    category_id serial4 NOT NULL,
    CONSTRAINT employees_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.employees ADD CONSTRAINT employees_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);
ALTER TABLE human_resources.employees ADD CONSTRAINT employees_position_id_fkey FOREIGN KEY (position_id) REFERENCES human_resources.positions(id);
ALTER TABLE human_resources.employees ADD CONSTRAINT employees_category_id_fkey FOREIGN KEY (category_id) REFERENCES human_resources.employees_categories(id);

CREATE TABLE human_resources.concept_types(
    id serial4 NOT NULL,
    name VARCHAR(80),
    CONSTRAINT concept_types_pkey PRIMARY KEY (id)
);

CREATE TABLE human_resources.payslips(
    id serial4 NOT NULL,
    payment_date DATE,
    total NUMERIC(10,2),
    employee_id serial4 NOT NULL,
    CONSTRAINT payslips_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.payslips ADD CONSTRAINT payslips_employee_id_fkey FOREIGN KEY (employee_id) REFERENCES human_resources.employees(id);

CREATE TABLE human_resources.concepts(
    id serial4 NOT NULL,
    value NUMERIC(10,2),
    concept_type_id serial4 NOT NULL,
    payslip_id serial4 NOT NULL,
    CONSTRAINT concepts_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.concepts ADD CONSTRAINT concepts_concept_type_id_fkey FOREIGN KEY (concept_type_id) REFERENCES human_resources.concept_types(id);
ALTER TABLE human_resources.concepts ADD CONSTRAINT concepts_payslip_id_fkey FOREIGN KEY (payslip_id) REFERENCES human_resources.payslips(id);

CREATE TABLE human_resources.status(
    id serial4 NOT NULL,
    name VARCHAR(20),
    CONSTRAINT status_pkey PRIMARY KEY (id)
);
CREATE TABLE human_resources.candidate_status(
    id serial4 NOT NULL,
    interview_date DATE,
    status_id serial4 NOT NULL,
    CONSTRAINT candidate_status_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.candidate_status ADD CONSTRAINT candidate_status_status_id_fkey FOREIGN KEY (status_id) REFERENCES human_resources.status(id);

CREATE TABLE human_resources.candidates(
    id serial4 NOT NULL,
    resume_src VARCHAR(255),
    personal_information_id serial4 NOT NULL,
    position_id serial4 NOT NULL,
    candidate_status_id serial4 NOT NULL,
    CONSTRAINT candidates_pkey PRIMARY KEY (id)
);

ALTER TABLE human_resources.candidates ADD CONSTRAINT candidates_personal_information_id_fkey FOREIGN KEY (personal_information_id) REFERENCES people.personal_information(id);
ALTER TABLE human_resources.candidates ADD CONSTRAINT candidates_position_id_fkey FOREIGN KEY (position_id) REFERENCES human_resources.positions(id);
ALTER TABLE human_resources.candidates ADD CONSTRAINT candidates_candidate_status_id_fkey FOREIGN KEY (candidate_status_id) REFERENCES human_resources.candidate_status(id);


CREATE TABLE human_resources.absenteeism_control(
    id serial4 NOT NULL,
    absence_date DATE,
    reason TEXT,
    employee_id serial4 NOT NULL,
    CONSTRAINT absenteeism_control_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.absenteeism_control ADD CONSTRAINT absenteeism_control_employee_id_fkey FOREIGN KEY (employee_id) REFERENCES human_resources.employees(id);


CREATE TABLE human_resources.performance_evaluation(
    id serial4 NOT NULL,
    evaluation_date DATE,
    result VARCHAR(100),
    observation TEXT,
    employee_id serial4 NOT null,
    CONSTRAINT performance_evaluation_pkey PRIMARY KEY (id)
);
ALTER TABLE human_resources.performance_evaluation ADD CONSTRAINT performance_evaluation_employee_id_fkey FOREIGN KEY (employee_id) REFERENCES human_resources.employees(id);

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
