<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cancion
 *
 * @ORM\Table(name="cancion", indexes={@ORM\Index(name="titulo_idx", columns={"titulo"}), @ORM\Index(name="fk_cancion_album1_idx", columns={"album_id"})})
 * @ORM\Entity
 */
class Cancion
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
     * @ORM\Column(name="titulo", type="string", length=255, nullable=false)
     */
    private $titulo;

    /**
     * @var int
     *
     * @ORM\Column(name="duracion", type="integer", nullable=false)
     */
    private $duracion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ruta", type="string", length=255, nullable=true)
     */
    private $ruta;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_reproducciones", type="integer", nullable=false)
     */
    private $numeroReproducciones;

    /**
     * @var Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * })
     */
    private $album;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="cancion")
     */
    private $usuario = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Premium", inversedBy="cancion")
     * @ORM\JoinTable(name="usuario_descarga_cancion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cancion_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="premium_usuario_id", referencedColumnName="usuario_id")
     *   }
     * )
     */
    private $premiumUsuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->premiumUsuario = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of duracion
     */
    public function getDuracion(): int
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     */
    public function setDuracion(int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get the value of ruta
     */
    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    /**
     * Set the value of ruta
     */
    public function setRuta(?string $ruta): self
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get the value of numeroReproducciones
     */
    public function getNumeroReproducciones(): int
    {
        return $this->numeroReproducciones;
    }

    /**
     * Set the value of numeroReproducciones
     */
    public function setNumeroReproducciones(int $numeroReproducciones): self
    {
        $this->numeroReproducciones = $numeroReproducciones;

        return $this;
    }

    /**
     * Get the value of album
     */
    public function getAlbum(): Album
    {
        return $this->album;
    }

    /**
     * Set the value of album
     */
    public function setAlbum(Album $album): self
    {
        $this->album = $album;

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

    /**
     * Get the value of premiumUsuario
     */
    public function getPremiumUsuario(): \Doctrine\Common\Collections\Collection
    {
        return $this->premiumUsuario;
    }

    /**
     * Set the value of premiumUsuario
     */
    public function setPremiumUsuario(\Doctrine\Common\Collections\Collection $premiumUsuario): self
    {
        $this->premiumUsuario = $premiumUsuario;

        return $this;
    }
}
