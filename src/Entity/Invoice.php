<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $designation = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?array
    {
        return $this->designation;
    }

    public function setDesignation(?array $designation): self
    {
        $this->designation = $designation;

        return $this;
    }
}
