<?php

namespace App\Entity;

use App\Repository\CompaniesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompaniesRepository::class)
 */
class Companies
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
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $littleName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wording;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streetSupplement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isArchived;

    /**
     * @ORM\OneToMany(targetEntity=LightVehicles::class, mappedBy="company")
     */
    private $lightVehicles;

    /**
     * @ORM\OneToMany(targetEntity=LVehiclesRentals::class, mappedBy="company")
     */
    private $lVehiclesRentals;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

    /**
     * @ORM\OneToMany(targetEntity=LVehiclesMaintenances::class, mappedBy="company")
     */
    private $lVehiclesMaintenances;

    public function __construct()
    {
        $this->lightVehicles = new ArrayCollection();
        $this->lVehiclesRentals = new ArrayCollection();
        $this->lVehiclesMaintenances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLittleName(): ?string
    {
        return $this->littleName;
    }

    public function setLittleName(string $littleName): self
    {
        $this->littleName = $littleName;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getStreetSupplement(): ?string
    {
        return $this->streetSupplement;
    }

    public function setStreetSupplement(string $streetSupplement): self
    {
        $this->streetSupplement = $streetSupplement;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    /**
     * @return Collection|LightVehicles[]
     */
    public function getLightVehicles(): Collection
    {
        return $this->lightVehicles;
    }

    public function addLightVehicle(LightVehicles $lightVehicle): self
    {
        if (!$this->lightVehicles->contains($lightVehicle)) {
            $this->lightVehicles[] = $lightVehicle;
            $lightVehicle->setCompany($this);
        }

        return $this;
    }

    public function removeLightVehicle(LightVehicles $lightVehicle): self
    {
        if ($this->lightVehicles->removeElement($lightVehicle)) {
            // set the owning side to null (unless already changed)
            if ($lightVehicle->getCompany() === $this) {
                $lightVehicle->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LVehiclesRentals[]
     */
    public function getLVehiclesRentals(): Collection
    {
        return $this->lVehiclesRentals;
    }

    public function addLVehiclesRental(LVehiclesRentals $lVehiclesRental): self
    {
        if (!$this->lVehiclesRentals->contains($lVehiclesRental)) {
            $this->lVehiclesRentals[] = $lVehiclesRental;
            $lVehiclesRental->setCompany($this);
        }

        return $this;
    }

    public function removeLVehiclesRental(LVehiclesRentals $lVehiclesRental): self
    {
        if ($this->lVehiclesRentals->removeElement($lVehiclesRental)) {
            // set the owning side to null (unless already changed)
            if ($lVehiclesRental->getCompany() === $this) {
                $lVehiclesRental->setCompany(null);
            }
        }

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * @return Collection|LVehiclesMaintenances[]
     */
    public function getLVehiclesMaintenances(): Collection
    {
        return $this->lVehiclesMaintenances;
    }

    public function addLVehiclesMaintenance(LVehiclesMaintenances $lVehiclesMaintenance): self
    {
        if (!$this->lVehiclesMaintenances->contains($lVehiclesMaintenance)) {
            $this->lVehiclesMaintenances[] = $lVehiclesMaintenance;
            $lVehiclesMaintenance->setCompany($this);
        }

        return $this;
    }

    public function removeLVehiclesMaintenance(LVehiclesMaintenances $lVehiclesMaintenance): self
    {
        if ($this->lVehiclesMaintenances->removeElement($lVehiclesMaintenance)) {
            // set the owning side to null (unless already changed)
            if ($lVehiclesMaintenance->getCompany() === $this) {
                $lVehiclesMaintenance->setCompany(null);
            }
        }

        return $this;
    }
}
