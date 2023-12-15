<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artista
 *
 * @ORM\Table(name="artista", indexes={@ORM\Index(name="nombre_idx", columns={"nombre"})})
 * @ORM\Entity
 */
class Artista
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="artista")
     */
    private $usuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario(): \Doctrine\Common\Collections\Collection
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario(\Doctrine\Common\Collections\Collection $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
