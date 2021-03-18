<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="invoices")
     */
    private $client;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $paid;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Designation::class, mappedBy="invoice", cascade={"persist"} )
     */
    private $designations;

    public function __construct()
    {
        $this->designations = new ArrayCollection();
    }

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(?bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Designation[]
     */
    public function getDesignations(): Collection
    {
        return $this->designations;
    }

    public function addDesignation(Designation $designation): self
    {
        if (!$this->designations->contains($designation)) {
            $this->designations[] = $designation;
            $designation->setInvoice($this);
        }

        return $this;
    }

    public function removeDesignation(Designation $designation): self
    {
        if ($this->designations->removeElement($designation)) {
            // set the owning side to null (unless already changed)
            if ($designation->getInvoice() === $this) {
                $designation->setInvoice(null);
            }
        }

        return $this;
    }

    public function __toString(): string {
        return $this->getId();
    }
}
