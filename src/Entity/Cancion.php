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
     * @var \Album
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

}
