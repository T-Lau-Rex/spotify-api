<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * 
     * @Groups("premium")
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
     * 
     * @Groups("premium")
     */
    private $usuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cancion", mappedBy="premiumUsuario")
     * 
     * @Groups("premium")
     */
    private $cancion = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cancion = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get the value of fechaRenovacion
     */
    public function getFechaRenovacion(): \DateTime
    {
        return $this->fechaRenovacion;
    }

    /**
     * Set the value of fechaRenovacion
     */
    public function setFechaRenovacion(\DateTime $fechaRenovacion): self
    {
        $this->fechaRenovacion = $fechaRenovacion;

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
}
