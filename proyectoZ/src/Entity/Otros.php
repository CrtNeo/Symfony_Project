<?php

namespace App\Entity;

use App\Repository\OtrosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OtrosRepository::class)
 */
class Otros
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Modelo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Piezas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelo(): ?string
    {
        return $this->Modelo;
    }

    public function setModelo(string $Modelo): self
    {
        $this->Modelo = $Modelo;

        return $this;
    }

    public function getPiezas(): ?string
    {
        return $this->Piezas;
    }

    public function setPiezas(string $Piezas): self
    {
        $this->Piezas = $Piezas;

        return $this;
    }
}
