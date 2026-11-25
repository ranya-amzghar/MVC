<?php

require_once dirname(__DIR__) . '/config/Database.php';

class SectionDAO{
    protected ?PDO $db = null;

    public function __construct(?PDO $db = null){
        $this->db = $db;
    }

    protected function getDB(): PDO{
        if ($this->db === null) {
            $this->db = Database::getConnection();
        }

        return $this->db;
    }

    // GET ALL SECTIONS
    public function afficherTous(): array{
        try {

            return $this->getDB()
                ->query("SELECT * FROM sections ORDER BY id ASC")
                ->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            throw new Exception(
                "Erreur lors de la récupération des sections : "
                . $e->getMessage(),
                0,
                $e
            );
        }
    }

    // ADD SECTION
    public function ajouter(
        string $nom,
        string $description,
        string $couleur,
        string $icone
    ): bool {

        try {

            $sql = "INSERT INTO sections
                    (nom, description, couleur, icone)
                    VALUES (?, ?, ?, ?)";

            $stmt = $this->getDB()->prepare($sql);

            return $stmt->execute([
                $nom,
                $description,
                $couleur,
                $icone
            ]);

        } catch (PDOException $e) {

            throw new Exception(
                "Erreur lors de l'ajout de la section"
            );
        }
    }
}