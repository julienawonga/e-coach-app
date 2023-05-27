CREATE TABLE
    utilisateurs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(255),
        prenom VARCHAR(255),
        email VARCHAR(255),
        mot_de_passe VARCHAR(255),
        profil_image VARCHAR(255),
        type_utilisateur VARCHAR(255),
        date_naissance DATE,
        sex VARCHAR(255),
        est_complete INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE = InnoDB;

CREATE TABLE
    clients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_utilisateur INT,
        objectifs TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id)
    ) ENGINE = InnoDB;

CREATE TABLE
    coachs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_utilisateur INT,
        description TEXT,
        tarif_horaire DECIMAL,
        disponibilite INT,
        specialite VARCHAR(255),
        localisation VARCHAR(255),
        experience DATE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs (id)
    ) ENGINE = InnoDB;

CREATE TABLE
    seances (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_client INT,
        id_coach INT,
        date_heure DATETIME,
        duree DATETIME,
        tarif DECIMAL,
        message TEXT,
        statut VARCHAR(255),
        meet_link VARCHAR(255),
        est_termine INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_client) REFERENCES clients (id),
        FOREIGN KEY (id_coach) REFERENCES coachs (id)
    ) ENGINE = InnoDB;

CREATE TABLE
    avis (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_seance INT,
        note INT,
        commentaire TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_seance) REFERENCES seances (id)
    ) ENGINE = InnoDB;

CREATE TABLE
    experiences (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_coach INT,
        type_experience VARCHAR(255),
        titre VARCHAR(255),
        entreprise VARCHAR(255),
        ville VARCHAR(255),
        pays VARCHAR(255),
        date_debut DATE,
        date_fin DATE,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_coach) REFERENCES coachs (id)
    ) ENGINE = InnoDB;

-- coach lang table

CREATE TABLE
    coach_langs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        id_coach INT,
        langue VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (id_coach) REFERENCES coachs (id)
    ) ENGINE = InnoDB;