<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_id_UNIQUE", columns={"usuario_id"})}, indexes={@ORM\Index(name="fk_configuracion_calidad1_idx", columns={"calidad_id"}), @ORM\Index(name="fk_configuracion_idioma1_idx", columns={"idioma_id"}), @ORM\Index(name="fk_configuracion_tipo_descarga1_idx", columns={"tipo_descarga_id"})})
 * @ORM\Entity
 */
class Configuracion
{
    /**
     * @var bool
     *
     * @ORM\Column(name="autoplay", type="boolean", nullable=false)
     * 
     * @Groups("configuracion")
     */
    private $autoplay;

    /**
     * @var bool
     *
     * @ORM\Column(name="ajuste", type="boolean", nullable=false)
     * 
     * @Groups("configuracion")
     */
    private $ajuste;

    /**
     * @var bool
     *
     * @ORM\Column(name="normalizacion", type="boolean", nullable=false)
     * 
     * @Groups("configuracion")
     */
    private $normalizacion;

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
     * @Groups("configuracion")
     */
    private $usuario;

    /**
     * @var Calidad
     *
     * @ORM\ManyToOne(targetEntity="Calidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calidad_id", referencedColumnName="id")
     * })
     * 
     * @Groups("configuracion")
     */
    private $calidad;

    /**
     * @var Idioma
     *
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idioma_id", referencedColumnName="id")
     * })
     * 
     * @Groups("configuracion")
     */
    private $idioma;

    /**
     * @var TipoDescarga
     *
     * @ORM\ManyToOne(targetEntity="TipoDescarga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_descarga_id", referencedColumnName="id")
     * })
     * 
     * @Groups("configuracion")
     */
    private $tipoDescarga;



    /**
     * Get the value of autoplay
     */
    public function isAutoplay(): bool
    {
        return $this->autoplay;
    }

    /**
     * Set the value of autoplay
     */
    public function setAutoplay(bool $autoplay): self
    {
        $this->autoplay = $autoplay;

        return $this;
    }

    /**
     * Get the value of ajuste
     */
    public function isAjuste(): bool
    {
        return $this->ajuste;
    }

    /**
     * Set the value of ajuste
     */
    public function setAjuste(bool $ajuste): self
    {
        $this->ajuste = $ajuste;

        return $this;
    }

    /**
     * Get the value of normalizacion
     */
    public function isNormalizacion(): bool
    {
        return $this->normalizacion;
    }

    /**
     * Set the value of normalizacion
     */
    public function setNormalizacion(bool $normalizacion): self
    {
        $this->normalizacion = $normalizacion;

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
     * Get the value of calidad
     */
    public function getCalidad(): Calidad
    {
        return $this->calidad;
    }

    /**
     * Set the value of calidad
     */
    public function setCalidad(Calidad $calidad): self
    {
        $this->calidad = $calidad;

        return $this;
    }

    /**
     * Get the value of idioma
     */
    public function getIdioma(): Idioma
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     */
    public function setIdioma(Idioma $idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get the value of tipoDescarga
     */
    public function getTipoDescarga(): TipoDescarga
    {
        return $this->tipoDescarga;
    }

    /**
     * Set the value of tipoDescarga
     */
    public function setTipoDescarga(TipoDescarga $tipoDescarga): self
    {
        $this->tipoDescarga = $tipoDescarga;

        return $this;
    }
}
