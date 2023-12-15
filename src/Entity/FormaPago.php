<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormaPago
 *
 * @ORM\Table(name="forma_pago")
 * @ORM\Entity
 */
class FormaPago
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
}
