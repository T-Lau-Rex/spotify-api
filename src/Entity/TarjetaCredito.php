<?php

namespace App\Entity;
use Symfony\Component\Serializer\Annotation\Groups;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarjetaCredito
 *
 * @ORM\Table(name="tarjeta_credito", uniqueConstraints={@ORM\UniqueConstraint(name="numero_tarjeta_UNIQUE", columns={"numero_tarjeta"})}, indexes={@ORM\Index(name="fk_tarjeta_credito_forma_pago1_idx", columns={"forma_pago_id"})})
 * @ORM\Entity
 */
class TarjetaCredito
{
    /**
     * @var string
     *
     * @ORM\Column(name="numero_tarjeta", type="string", length=20, nullable=false)
     * 
     * @Groups("tarjeta")
     */
    private $numeroTarjeta;

    /**
     * @var bool
     *
     * @ORM\Column(name="mes_caducidad", type="boolean", nullable=false)
     * 
     * @Groups("tarjeta")
     */
    private $mesCaducidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="anyo_caducidad", type="date", nullable=false)
     * 
     * @Groups("tarjeta")
     */
    private $anyoCaducidad;

    /**
     * @var int
     *
     * @ORM\Column(name="codigo_seguridad", type="smallint", nullable=false, options={"unsigned"=true})
     * 
     * @Groups("tarjeta")
     */
    private $codigoSeguridad;

    /**
     * @var FormaPago
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FormaPago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forma_pago_id", referencedColumnName="id")
     * })
     * 
     * @Groups("tarjeta")
     */
    private $formaPago;



    /**
     * Get the value of numeroTarjeta
     */
    public function getNumeroTarjeta(): string
    {
        return $this->numeroTarjeta;
    }

    /**
     * Set the value of numeroTarjeta
     */
    public function setNumeroTarjeta(string $numeroTarjeta): self
    {
        $this->numeroTarjeta = $numeroTarjeta;

        return $this;
    }

    /**
     * Get the value of mesCaducidad
     */
    public function isMesCaducidad(): bool
    {
        return $this->mesCaducidad;
    }

    /**
     * Set the value of mesCaducidad
     */
    public function setMesCaducidad(bool $mesCaducidad): self
    {
        $this->mesCaducidad = $mesCaducidad;

        return $this;
    }

    /**
     * Get the value of anyoCaducidad
     */
    public function getAnyoCaducidad(): \DateTime
    {
        return $this->anyoCaducidad;
    }

    /**
     * Set the value of anyoCaducidad
     */
    public function setAnyoCaducidad(\DateTime $anyoCaducidad): self
    {
        $this->anyoCaducidad = $anyoCaducidad;

        return $this;
    }

    /**
     * Get the value of codigoSeguridad
     */
    public function getCodigoSeguridad(): int
    {
        return $this->codigoSeguridad;
    }

    /**
     * Set the value of codigoSeguridad
     */
    public function setCodigoSeguridad(int $codigoSeguridad): self
    {
        $this->codigoSeguridad = $codigoSeguridad;

        return $this;
    }

    /**
     * Get the value of formaPago
     */
    public function getFormaPago(): FormaPago
    {
        return $this->formaPago;
    }

    /**
     * Set the value of formaPago
     */
    public function setFormaPago(FormaPago $formaPago): self
    {
        $this->formaPago = $formaPago;

        return $this;
    }
}
