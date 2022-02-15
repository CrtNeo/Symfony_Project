<?php

namespace App\Entity;

use App\Repository\PiezasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PiezasRepository::class)
 */
class Piezas
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
    private $nombre;

    /**
     * @ORM\ManyToOne(targetEntity=Vehiculos::class, inversedBy="piezas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehiculos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getVehiculos(): ?Vehiculos
    {
        return $this->vehiculos;
    }

    public function setVehiculos(?Vehiculos $vehiculos): self
    {
        $this->vehiculos = $vehiculos;

        return $this;
    }
    public function __toString()
    {
        return $this->nombre;
    }
}
