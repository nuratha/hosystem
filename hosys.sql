DROP DATABASE hosys;
CREATE DATABASE hosys;
USE hosys;

-- TABLES --

CREATE TABLE studentLog (
    st_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    st_email VARCHAR(128) NOT NULL UNIQUE,
    st_pswd VARCHAR(128) NOT NULL,
    st_first VARCHAR(128) NOT NULL,
    st_last VARCHAR(128) NOT NULL,
    st_sex VARCHAR(6) NOT NULL DEFAULT 'N/A',
    st_dob DATE NOT NULL,
    st_phone VARCHAR(15) NOT NULL DEFAULT 'N/A',
    st_uni VARCHAR(128) NOT NULL DEFAULT 'N/A',
    st_prog VARCHAR(128) NOT NULL DEFAULT 'N/A',
    st_height INT NOT NULL DEFAULT '0',
    st_weight INT NOT NULL DEFAULT '0',
    st_blood VARCHAR(6) NOT NULL DEFAULT 'N/A',
    st_pre VARCHAR(128) NOT NULL DEFAULT 'N/A'
);

CREATE TABLE deptLog (
    dept_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dept_name VARCHAR(128) NOT NULL DEFAULT 'N/A',
    dept_loc VARCHAR(255) NOT NULL DEFAULT 'N/A',
    dept_phone VARCHAR(15) NOT NULL DEFAULT 'N/A'
);

CREATE TABLE doctorLog (
    dr_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dr_email VARCHAR(128) NOT NULL UNIQUE,
    dr_pswd VARCHAR(128) NOT NULL,
    dr_first VARCHAR(128) NOT NULL,
    dr_last VARCHAR(128) NOT NULL,
    dr_sex VARCHAR(6) NOT NULL DEFAULT 'N/A',
    dr_dob DATE NOT NULL,
    dr_spec VARCHAR(128) NOT NULL DEFAULT 'N/A',
    dept_id INT NOT NULL
);

CREATE TABLE appLog (
    app_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dr_id INT NOT NULL DEFAULT '1',
    st_id INT NOT NULL,
    dept_id INT NOT NULL,
    app_category VARCHAR(128) NOT NULL,
    app_date DATE NOT NULL,
    app_stat VARCHAR(128) NOT NULL DEFAULT 'Pending',
    app_note VARCHAR(128) NOT NULL DEFAULT 'No description'
);

-- FK --
ALTER TABLE doctorLog 
    ADD FOREIGN KEY (dept_id) REFERENCES deptLog(dept_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE appLog
    ADD FOREIGN KEY (dr_id) REFERENCES doctorLog(dr_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE appLog
    ADD FOREIGN KEY (st_id) REFERENCES studentLog(st_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE appLog
    ADD FOREIGN KEY (dept_id) REFERENCES deptLog(dept_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- Sample data --
INSERT INTO deptlog(dept_id, dept_name, dept_loc , dept_phone) 
	VALUES (1, "Hospital Shah Alam", "Persiaran Kayangan, Seksyen 7, 40000 Shah Alam, Selangor", "03-5526 3000");
    
INSERT INTO doctorlog(dr_email, dr_pswd, dr_first , dr_last, dr_sex, dr_dob, dept_id) 
	VALUES ("placeholder@gmail.com", "123", "Doctor", "Pending", "N/A", "2000-01-01", 1);