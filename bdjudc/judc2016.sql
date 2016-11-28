--
-- ER/Studio 8.0 SQL Code Generation
-- Company :      Microsoft
-- Project :      judc.dm1
-- Author :       Microsoft
--
-- Date Created : Thursday, September 01, 2016 11:46:13
-- Target DBMS : MySQL 5.x
--

-- 
-- TABLE: Carrera 
--

CREATE TABLE Carrera(
    carreraID         TINYINT        NOT NULL,
    descripcarrera    VARCHAR(50)    NOT NULL,
    departamentoID    TINYINT        NOT NULL,
    PRIMARY KEY (carreraID)
)ENGINE=MYISAM
;



-- 
-- TABLE: Departamento 
--

CREATE TABLE Departamento(
    departamentoID    TINYINT        NOT NULL,
    descripdpto       VARCHAR(60)    NOT NULL,
    PRIMARY KEY (departamentoID)
)ENGINE=MYISAM
;



-- 
-- TABLE: Sala 
--

CREATE TABLE Sala(
    salaID            TINYINT        NOT NULL,
    descripsala       VARCHAR(60)    NOT NULL,
    departamentoID    TINYINT        NOT NULL,
    PRIMARY KEY (salaID)
)ENGINE=MYISAM
;



-- 
-- TABLE: Trabajos 
--

CREATE TABLE Trabajos(
    trabajoID      TINYINT         NOT NULL,
    tema           VARCHAR(150)    NOT NULL,
    autor1         VARCHAR(50)     NOT NULL,
    autor2         VARCHAR(50)     NOT NULL,
    autor3         VARCHAR(50)     NOT NULL,
    autor4         VARCHAR(50)     NOT NULL,
    autor5         VARCHAR(50)     NOT NULL,
    tutor1         VARCHAR(50)     NOT NULL,
    tutor2         VARCHAR(50)     NOT NULL,
    tutor3         VARCHAR(50)     NOT NULL,
    asesor1        VARCHAR(50)     NOT NULL,
    asesor2        VARCHAR(50)     NOT NULL,
    tipotrabajo    VARCHAR(100)    NOT NULL,
    salaID         TINYINT         NOT NULL,
    PRIMARY KEY (trabajoID)
)ENGINE=MYISAM
;



-- 
-- TABLE: Usuarios 
--

CREATE TABLE Usuarios(
    userID      TINYINT        NOT NULL,
    fullname    VARCHAR(60)    NOT NULL,
    email       VARCHAR(60)    NOT NULL,
    passwd      TEXT           NOT NULL,
    PRIMARY KEY (userID)
)ENGINE=MYISAM
;



-- 
-- TABLE: Carrera 
--

ALTER TABLE Carrera ADD CONSTRAINT RefDepartamento1 
    FOREIGN KEY (departamentoID)
    REFERENCES Departamento(departamentoID)
;


-- 
-- TABLE: Sala 
--

ALTER TABLE Sala ADD CONSTRAINT RefDepartamento3 
    FOREIGN KEY (departamentoID)
    REFERENCES Departamento(departamentoID)
;


-- 
-- TABLE: Trabajos 
--

ALTER TABLE Trabajos ADD CONSTRAINT RefSala2 
    FOREIGN KEY (salaID)
    REFERENCES Sala(salaID)
;


