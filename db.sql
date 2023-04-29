CREATE TABLE utilisateurs
(
    id               INT PRIMARY KEY,
    nom              VARCHAR(255),
    prenom           VARCHAR(255),
    email            VARCHAR(255),
    mot_de_passe     VARCHAR(255),
    type_utilisateur VARCHAR(255),
    date_naissance   DATE,
    sex              VARCHAR(255),
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE clients
(
    id                INT PRIMARY KEY,
    id_utilisateur    INT,
    objectifs         TEXT,
    niveau_experience VARCHAR(255),
    created_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id)
);

CREATE TABLE coachs
(
    id             INT PRIMARY KEY,
    id_utilisateur INT,
    description    TEXT,
    tarif_horaire  DECIMAL,
    disponibilite  VARCHAR(255),
    specialite     VARCHAR(255),
    experience     DATE,
    created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id)
);

CREATE TABLE seances
(
    id         INT PRIMARY KEY,
    id_client  INT,
    id_coachs  INT,
    date_heure DATETIME,
    duree      DATETIME,
    tarif      DECIMAL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES clients (id),
    FOREIGN KEY (id_coachs) REFERENCES coachs (id)
);

CREATE TABLE paiments
(
    id             INT PRIMARY KEY,
    id_utilisateur INT,
    id_seance      INT,
    date_paiment   DATETIME,
    montant        DECIMAL,
    mode_paiment   VARCHAR(256),
    created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id),
    FOREIGN KEY (id_seance) REFERENCES seances (id)
);

CREATE TABLE offres
(
    id          INT PRIMARY KEY,
    id_coachs   INT,
    nom         VARCHAR(255),
    tarif       VARCHAR(256),
    description TEXT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_coachs) REFERENCES coachs (id)
);

CREATE TABLE avis
(
    id          INT PRIMARY KEY,
    id_seance   INT,
    note        INT,
    commentaire TEXT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_seance) REFERENCES seances (id)
);

CREATE TABLE administrateurs
(
    id           INT PRIMARY KEY,
    nom          VARCHAR(255),
    prenom       VARCHAR(255),
    email        VARCHAR(255),
    mot_de_passe VARCHAR(256),
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
