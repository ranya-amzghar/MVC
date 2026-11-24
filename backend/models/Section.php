<?php

require_once __DIR__ . '/SectionDAO.php';

class Section extends SectionDAO
{
    private ?int $id;
    private string $nom;
    private string $description;
    private string $couleur;
    private string $icone;

    public function __construct(
        ?int $id = null,
        string $nom = '',
        string $description = '',
        string $couleur = '',
        string $icone = ''
    ) {

        parent::__construct();

        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->couleur = $couleur;
        $this->icone = $icone;
    }

    // GETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function getIcone(): string
    {
        return $this->icone;
    }
}