<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Paypal
 *
 * @ORM\Table(name="paypal", uniqueConstraints={@ORM\UniqueConstraint(name="username_paypal_UNIQUE", columns={"username_paypal"})}, indexes={@ORM\Index(name="fk_paypal_forma_pago1_idx", columns={"forma_pago_id"})})
 * @ORM\Entity
 */
class Paypal
{
    /**
     * @var string
     *
     * @ORM\Column(name="username_paypal", type="string", length=150, nullable=false)
     * 
     * @Groups("paypal")
     */
    private $usernamePaypal;

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
     * @Groups("paypal")
     */
    private $formaPago;



    /**
     * Get the value of usernamePaypal
     */
    public function getUsernamePaypal(): string
    {
        return $this->usernamePaypal;
    }

    /**
     * Set the value of usernamePaypal
     */
    public function setUsernamePaypal(string $usernamePaypal): self
    {
        $this->usernamePaypal = $usernamePaypal;

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
