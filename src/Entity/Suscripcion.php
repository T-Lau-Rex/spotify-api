<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion", indexes={@ORM\Index(name="fk_suscripcion_premium1_idx", columns={"premium_usuario_id"}), @ORM\Index(name="fecha_fin_idx", columns={"fecha_fin"}), @ORM\Index(name="fecha_inicio_idx", columns={"fecha_inicio"})})
 * @ORM\Entity
 */
class Suscripcion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups("suscripcion")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     * 
     * @Groups("suscripcion")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     * 
     * @Groups("suscripcion")
     */
    private $fechaFin;

    /**
     * @var Premium
     *
     * @ORM\ManyToOne(targetEntity="Premium")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="premium_usuario_id", referencedColumnName="usuario_id")
     * })
     * 
     * @Groups("suscripcion")
     */
    private $premiumUsuario;



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
     * Get the value of fechaInicio
     */
    public function getFechaInicio(): \DateTime
    {
        return $this->fechaInicio;
    }

    /**
     * Set the value of fechaInicio
     */
    public function setFechaInicio(\DateTime $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get the value of fechaFin
     */
    public function getFechaFin(): \DateTime
    {
        return $this->fechaFin;
    }

    /**
     * Set the value of fechaFin
     */
    public function setFechaFin(\DateTime $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get the value of premiumUsuario
     */
    public function getPremiumUsuario(): Premium
    {
        return $this->premiumUsuario;
    }

    /**
     * Set the value of premiumUsuario
     */
    public function setPremiumUsuario(Premium $premiumUsuario): self
    {
        $this->premiumUsuario = $premiumUsuario;

        return $this;
    }
}
