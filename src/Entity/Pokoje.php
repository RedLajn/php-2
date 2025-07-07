<?php

namespace App\Entity;

use App\Repository\PokojeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokojeRepository::class)]
class Pokoje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Wymiar = null;

    #[ORM\Column]
    private ?int $Cena = null;

    #[ORM\Column(length: 55)]
    private ?string $Przeznaczenie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWymiar(): ?int
    {
        return $this->Wymiar;
    }

    public function setWymiar(int $Wymiar): static
    {
        $this->Wymiar = $Wymiar;

        return $this;
    }

    public function getCena(): ?int
    {
        return $this->Cena;
    }

    public function setCena(int $Cena): static
    {
        $this->Cena = $Cena;

        return $this;
    }

    public function getPrzeznaczenie(): ?string
    {
        return $this->Przeznaczenie;
    }

    public function setPrzeznaczenie(string $Przeznaczenie): static
    {
        $this->Przeznaczenie = $Przeznaczenie;

        return $this;
    }
}
