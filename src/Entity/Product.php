<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    normalizationContext:['groups'=>['read','abc']],
    denormalizationContext:['groups'=>['write','ecrire']]
)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read','write'])]
    private ?string $desg = null;

    #[ORM\Column]
    #[Groups(['read','write'])]
    private ?int $price = null;

    #[ORM\Column]
    #[Groups(['read','write'])]
    private ?int $qte = null;


    #[ORM\ManyToOne(inversedBy: 'products')]
    #[Groups(['read','write'])]
    private ?Categorie $categorie = null;
    
    #[Groups(['read'])]
    public function getHt()
        {
            return $this->price * $this->qte;
        }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesg(): ?string
    {
        return $this->desg;
    }

    public function setDesg(string $desg): self
    {
        $this->desg = $desg;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
