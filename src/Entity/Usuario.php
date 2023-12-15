<?php



use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genero", type="string", length=1, nullable=true)
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="string", length=45, nullable=true)
     */
    private $pais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo_postal", type="string", length=20, nullable=true)
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

}
