<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="fk_album_artista1_idx", columns={"artista_id"}), @ORM\Index(name="patrocinado_idx", columns={"patrocinado"}), @ORM\Index(name="titulo_idx", columns={"titulo"}), @ORM\Index(name="anyo_idx", columns={"anyo"})})
 * @ORM\Entity
 */
class Album
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
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

    /**
     * @var bool
     *
     * @ORM\Column(name="patrocinado", type="boolean", nullable=false)
     */
    private $patrocinado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio_patrocinio", type="date", nullable=true)
     */
    private $fechaInicioPatrocinio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin_patrocinio", type="date", nullable=true)
     */
    private $fechaFinPatrocinio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="anyo", type="datetime", nullable=true)
     */
    private $anyo;

    /**
     * @var \Artista
     *
     * @ORM\ManyToOne(targetEntity="Artista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artista_id", referencedColumnName="id")
     * })
     */
    private $artista;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="album")
     */
    private $usuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
