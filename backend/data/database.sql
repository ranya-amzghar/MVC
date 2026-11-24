CREATE DATABASE IF NOT EXISTS gestion_domaines;
USE gestion_domaines;

CREATE TABLE IF NOT EXISTS domaines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO domaines (nom, description) VALUES
('Informatique', 'Développement, réseaux et systèmes'),
('Finance', 'Comptabilité et gestion financière'),
('Marketing', 'Communication et stratégie digitale');
