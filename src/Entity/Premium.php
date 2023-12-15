<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Premium
 *
 * @ORM\Table(name="premium", indexes={@ORM\Index(name="fecha_renovacion_idx", columns={"fecha_renovacion"}), @ORM\Index(name="fk_premium_usuario1_idx", columns={"usuario_id"})})
 * @ORM\Entity
 */
class Premium
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_renovacion", type="date", nullable=false)
     */
    private $fechaRenovacion;

    /**
     * @var Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="premiumUsuario")
     */
    private $cancion = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cancion = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
