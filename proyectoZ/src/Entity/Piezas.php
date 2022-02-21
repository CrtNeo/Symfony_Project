<?php

namespace App\Entity;

use App\Repository\PiezasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=Vehiculos::class, mappedBy="piezas")
     */
    private $vehiculos;

    public function __construct()
    {
        $this->vehiculos = new ArrayCollection();
    }

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

    /**
     * @return Collection|Vehiculos[]
     */
    public function getVehiculos(): Collection
    {
        return $this->vehiculos;
    }

    public function addVehiculo(Vehiculos $vehiculo): self
    {
        if (!$this->vehiculos->contains($vehiculo)) {
            $this->vehiculos[] = $vehiculo;
            $vehiculo->addPieza($this);
        }

        return $this;
    }

    public function removeVehiculo(Vehiculos $vehiculo): self
    {
        if ($this->vehiculos->removeElement($vehiculo)) {
            $vehiculo->removePieza($this);
        }

        return $this;
    }
}
