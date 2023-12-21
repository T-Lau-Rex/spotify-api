<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups("usuario")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     * 
     * @Groups("usuario")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     * 
     * @Groups("usuario")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     * 
     * @Groups("usuario")
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genero", type="string", length=1, nullable=true)
     * 
     * @Groups("usuario")
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     * 
     * @Groups("usuario")
     */
    private $fechaNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="string", length=45, nullable=true)
     * 
     * @Groups("usuario")
     */
    private $pais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo_postal", type="string", length=20, nullable=true)
     * 
     * @Groups("usuario")
     */
    private $codigoPostal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cancion", inversedBy="usuario")
     * @ORM\JoinTable(name="guarda_cancion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="cancion_id", referencedColumnName="id")
     *   }
     * )
     * 
     * @Groups("usuario")
     */
    private $cancion = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Podcast", inversedBy="usuario")
     * @ORM\JoinTable(name="podcast_usuario",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="podcast_id", referencedColumnName="id")
     *   }
     * )
     * 
     * @Groups("usuario")
     */
    private $podcast = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Album", inversedBy="usuario")
     * @ORM\JoinTable(name="sigue_album",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     *   }
     * )
     * 
     * @Groups("usuario")
     */
    private $album = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artista", inversedBy="usuario")
     * @ORM\JoinTable(name="sigue_artista",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="artista_id", referencedColumnName="id")
     *   }
     * )
     * 
     * @Groups("usuario")
     */
    private $artista = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Playlist", inversedBy="usuarioSeguidor")
     * @ORM\JoinTable(name="sigue_playlist",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_seguidor_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     *   }
     * )
     * 
     * @Groups("usuario")
     */
    private $playlist = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cancion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->podcast = new \Doctrine\Common\Collections\ArrayCollection();
        $this->album = new \Doctrine\Common\Collections\ArrayCollection();
        $this->artista = new \Doctrine\Common\Collections\ArrayCollection();
        $this->playlist = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?string
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */
    public function getFechaNacimiento(): \DateTime
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     */
    public function setFechaNacimiento(\DateTime $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais(): ?string
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     */
    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of codigoPostal
     */
    public function getCodigoPostal(): ?string
    {
        return $this->codigoPostal;
    }

    /**
     * Set the value of codigoPostal
     */
    public function setCodigoPostal(?string $codigoPostal): self
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get the value of cancion
     */
    public function getCancion(): \Doctrine\Common\Collections\Collection
    {
        return $this->cancion;
    }

    /**
     * Set the value of cancion
     */
    public function setCancion(\Doctrine\Common\Collections\Collection $cancion): self
    {
        $this->cancion = $cancion;

        return $this;
    }

    /**
     * Get the value of podcast
     */
    public function getPodcast(): \Doctrine\Common\Collections\Collection
    {
        return $this->podcast;
    }

    /**
     * Set the value of podcast
     */
    public function setPodcast(\Doctrine\Common\Collections\Collection $podcast): self
    {
        $this->podcast = $podcast;

        return $this;
    }

    /**
     * Get the value of album
     */
    public function getAlbum(): \Doctrine\Common\Collections\Collection
    {
        return $this->album;
    }

    /**
     * Set the value of album
     */
    public function setAlbum(\Doctrine\Common\Collections\Collection $album): self
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get the value of artista
     */
    public function getArtista(): \Doctrine\Common\Collections\Collection
    {
        return $this->artista;
    }

    /**
     * Set the value of artista
     */
    public function setArtista(\Doctrine\Common\Collections\Collection $artista): self
    {
        $this->artista = $artista;

        return $this;
    }

    /**
     * Get the value of playlist
     */
    public function getPlaylist(): \Doctrine\Common\Collections\Collection
    {
        return $this->playlist;
    }

    /**
     * Set the value of playlist
     */
    public function setPlaylist(\Doctrine\Common\Collections\Collection $playlist): self
    {
        $this->playlist = $playlist;

        return $this;
    }
}
