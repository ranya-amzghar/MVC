<?php

require_once __DIR__ . '/BaseService.php';
require_once dirname(__DIR__) . '/models/Section.php';

class SectionService extends BaseService
{
    private Section $section;

    public function __construct()
    {
        $this->section = new Section();
    }

    // LIST SECTIONS
    public function listerSections(): array
    {
        try {

            return $this->section->afficherTous();

        } catch (Exception $e) {

            throw new Exception(
                "Erreur Service : " . $e->getMessage()
            );
        }
    }

    // ADD SECTION
    public function ajouterSection(array $input): array
    {
        try {

            $nom = trim($input['nom'] ?? '');
            $description = trim($input['description'] ?? '');
            $couleur = trim($input['couleur'] ?? '');
            $icone = trim($input['icone'] ?? '');

            // VALIDATION
            if (
                $nom === '' ||
                $description === '' ||
                $couleur === '' ||
                $icone === ''
            ) {

                throw new InvalidArgumentException(
                    "Tous les champs sont obligatoires"
                );
            }

            $this->validateNomLength($nom);

            // ADD SECTION
            $this->section->ajouter(
                $nom,
                $description,
                $couleur,
                $icone
            );

            return [
                'success' => true,
                'message' => 'Section ajoutée avec succès'
            ];

        } catch (InvalidArgumentException $e) {

            throw $e;

        } catch (Exception $e) {

            throw new Exception(
                "Erreur Service : " . $e->getMessage()
            );
        }
    }
}