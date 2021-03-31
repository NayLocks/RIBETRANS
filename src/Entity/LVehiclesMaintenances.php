<?php

namespace App\Entity;

use App\Repository\LVehiclesMaintenancesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LVehiclesMaintenancesRepository::class)
 */
class LVehiclesMaintenances
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="lVehiclesMaintenances")
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $driver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intervenant;

    /**
     * @ORM\Column(type="date")
     */
    private $entrance;

    /**
     * @ORM\Column(type="date")
     */
    private $exitRT;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $km;

    /**
     * @ORM\Column(type="text")
     */
    private $intervention;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $priceUnit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity=LightVehicles::class, inversedBy="lVehiclesMaintenances")
     */
    private $vehicle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getIntervenant(): ?string
    {
        return $this->intervenant;
    }

    public function setIntervenant(string $intervenant): self
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    public function getEntrance(): ?\DateTimeInterface
    {
        return $this->entrance;
    }

    public function setEntrance(\DateTimeInterface $entrance): self
    {
        $this->entrance = $entrance;

        return $this;
    }

    public function getExitRT(): ?\DateTimeInterface
    {
        return $this->exitRT;
    }

    public function setExitRT(\DateTimeInterface $exitRT): self
    {
        $this->exitRT = $exitRT;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->km;
    }

    public function setKm(string $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getIntervention(): ?string
    {
        return $this->intervention;
    }

    public function setIntervention(string $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPriceUnit(): ?string
    {
        return $this->priceUnit;
    }

    public function setPriceUnit(string $priceUnit): self
    {
        $this->priceUnit = $priceUnit;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getVehicle(): ?LightVehicles
    {
        return $this->vehicle;
    }

    public function setVehicle(?LightVehicles $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}
