<?php

namespace App\Entity;

use App\Repository\VehiculosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculosRepository::class)
 */
class Vehiculos
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
     * @ORM\ManyToOne(targetEntity=Tipos::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipos;

    /**
     * @ORM\ManyToOne(targetEntity=Marcas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $marca;

    /**
     * @ORM\OneToMany(targetEntity=Piezas::class, mappedBy="vehiculos")
     */
    private $piezas;

    public function __construct()
    {
        $this->piezas = new ArrayCollection();
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

    public function getTipos(): ?Tipos
    {
        return $this->tipos;
    }

    public function setTipos(?Tipos $tipos): self
    {
        $this->tipos = $tipos;

        return $this;
    }

    public function getMarca(): ?Marcas
    {
        return $this->marca;
    }

    public function setMarca(?Marcas $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * @return Collection|Piezas[]
     */
    public function getPiezas(): Collection
    {
        return $this->piezas;
    }

    public function addPieza(Piezas $pieza): self
    {
        if (!$this->piezas->contains($pieza)) {
            $this->piezas[] = $pieza;
            $pieza->setVehiculos($this);
        }

        return $this;
    }

    public function removePieza(Piezas $pieza): self
    {
        if ($this->piezas->removeElement($pieza)) {
            // set the owning side to null (unless already changed)
            if ($pieza->getVehiculos() === $this) {
                $pieza->setVehiculos(null);
            }
        }

        return $this;
    }
}
