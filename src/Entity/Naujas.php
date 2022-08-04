<?php

namespace App\Entity;

use App\Repository\NaujasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NaujasRepository::class)]
class Naujas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Vardas = null;

    #[ORM\Column(length: 255)]
    private ?string $Pavarde = null;

    #[ORM\Column(length: 255)]
    private ?string $Epastas = null;

    #[ORM\Column(length: 255)]
    private ?string $Telefonas = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVardas(): ?string
    {
        return $this->Vardas;
    }

    public function setVardas(string $Vardas): self
    {
        $this->Vardas = $Vardas;

        return $this;
    }

    public function getPavarde(): ?string
    {
        return $this->Pavarde;
    }

    public function setPavarde(string $Pavarde): self
    {
        $this->Pavarde = $Pavarde;

        return $this;
    }

    public function getEpastas(): ?string
    {
        return $this->Epastas;
    }

    public function setEpastas(string $Epastas): self
    {
        $this->Epastas = $Epastas;

        return $this;
    }

    public function getTelefonas(): ?string
    {
        return $this->Telefonas;
    }

    public function setTelefonas(string $Telefonas): self
    {
        $this->Telefonas = $Telefonas;

        return $this;
    }

    public function getAdresas(): ?string
    {
        return $this->Adresas;
    }

    public function setAdresas(string $Adresas): self
    {
        $this->Adresas = $Adresas;

        return $this;
    }
}
