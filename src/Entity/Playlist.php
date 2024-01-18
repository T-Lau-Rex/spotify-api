<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Playlist
 *
 * @ORM\Table(name="playlist", indexes={@ORM\Index(name="fk_playlist_usuario1_idx", columns={"usuario_id"})})
 * @ORM\Entity
 */
class Playlist
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups("playlist")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=150, nullable=false)
     * 
     * @Groups("playlist")
     */
    private $titulo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_canciones", type="integer", nullable=true, options={"unsigned"=true})
     * 
     * @Groups("playlist")
     */
    private $numeroCanciones;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=true)
     * 
     * @Groups("playlist")
     */
    private $fechaCreacion;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     * 
     * @Groups("playlist")
     */
    private $usuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="playlist")
     * 
     * @Groups("playlist")
     */
    private $usuarioSeguidor = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarioSeguidor = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of numeroCanciones
     */
    public function getNumeroCanciones(): ?int
    {
        return $this->numeroCanciones;
    }

    /**
     * Set the value of numeroCanciones
     */
    public function setNumeroCanciones(?int $numeroCanciones): self
    {
        $this->numeroCanciones = $numeroCanciones;

        return $this;
    }

    /**
     * Get the value of fechaCreacion
     */
    public function getFechaCreacion(): ?\DateTime
    {
        return $this->fechaCreacion;
    }

    /**
     * Set the value of fechaCreacion
     */
    public function setFechaCreacion(?\DateTime $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario(Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of usuarioSeguidor
     */
    public function getUsuarioSeguidor(): \Doctrine\Common\Collections\Collection
    {
        return $this->usuarioSeguidor;
    }

    /**
     * Set the value of usuarioSeguidor
     */
    public function setUsuarioSeguidor(\Doctrine\Common\Collections\Collection $usuarioSeguidor): self
    {
        $this->usuarioSeguidor = $usuarioSeguidor;

        return $this;
    }
}
