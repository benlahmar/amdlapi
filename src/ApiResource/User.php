<?php

use ApiPlatform\Metadata\ApiResource;

#[ApiResource()]
class User
{

    private ?int $id = null;
    private string $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }


    public function setNom(string $libelle): self
    {
        $this->nom = $libelle;

        return $this;
    }
}



?>