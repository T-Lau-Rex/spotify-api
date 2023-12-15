<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     */
    private $fechaFin;

    /**
     * @var \Premium
     *
     * @ORM\ManyToOne(targetEntity="Premium")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="premium_usuario_id", referencedColumnName="usuario_id")
     * })
     */
    private $premiumUsuario;


}
