<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $FamilyName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $SocialName;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $VATnumber;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Street;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $Zipcode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="client")
     */
    private $invoices;

    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->FamilyName;
    }

    public function setFamilyName(?string $FamilyName): self
    {
        $this->FamilyName = $FamilyName;

        return $this;
    }

    public function getSocialName(): ?string
    {
        return $this->SocialName;
    }

    public function setSocialName(?string $SocialName): self
    {
        $this->SocialName = $SocialName;

        return $this;
    }

    public function getVATnumber(): ?string
    {
        return $this->VATnumber;
    }

    public function setVATnumber(?string $VATnumber): self
    {
        $this->VATnumber = $VATnumber;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->Street;
    }

    public function setStreet(?string $Street): self
    {
        $this->Street = $Street;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->Zipcode;
    }

    public function setZipcode(?string $Zipcode): self
    {
        $this->Zipcode = $Zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|Invoice[]
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(Invoice $invoice): self
    {
        if (!$this->invoices->contains($invoice)) {
            $this->invoices[] = $invoice;
            $invoice->setClient($this);
        }

        return $this;
    }

    public function removeInvoice(Invoice $invoice): self
    {
        if ($this->invoices->removeElement($invoice)) {
            // set the owning side to null (unless already changed)
            if ($invoice->getClient() === $this) {
                $invoice->setClient(null);
            }
        }
        return $this;
    }
}
