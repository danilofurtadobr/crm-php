USE scc_db;

DROP TABLE IF EXISTS working_hours, users;
CREATE TABLE users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    cpf VARCHAR(11),
    cnpj VARCHAR(14),
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    is_admin BOOLEAN NOT NULL DEFAULT false
);
CREATE TABLE working_hours (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    user_id INT(6),
    work_date DATE NOT NULL,
    time1 TIME,
    time2 TIME,
    time3 TIME,
    time4 TIME,
    worked_time INT,

    FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT cons_user_day UNIQUE (user_id, work_date)
);

-- Essa senha criptografada corresponde ao valor "a"
INSERT INTO users (id, name, password, email, start_date, end_date, is_admin)
VALUES (1, 'Admin', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'admin@root.com.br', '2000-1-1', null, 1, '16128484000199');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cnpj)
VALUES (2, 'Esin Relis', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'esin@relis.com.br', '2000-1-1', null, 1, '33562771037');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES (3, 'Zena Soero', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'zena@soero.com.br', '2000-1-1', null, 0, '32883827095');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES (4, 'Ulmu Hahso', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'ulmu@hahso.com.br', '2000-1-1', null, 0, '19515278015');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES (5, 'Waire Caruzi', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'waire@caruzi.com.br', '2000-1-1', '2019-1-1', 0, '80564403059');