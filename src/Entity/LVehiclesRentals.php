<?php

namespace App\Entity;

use App\Repository\LVehiclesRentalsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LVehiclesRentalsRepository::class)
 */
class LVehiclesRentals
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $driver;

    /**
     * @ORM\Column(type="date")
     */
    private $startRental;

    /**
     * @ORM\Column(type="date")
     */
    private $endRental;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=LightVehicles::class, inversedBy="lVehiclesRentals")
     */
    private $vehicle;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="lVehiclesRentals")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStartRental(): ?\DateTimeInterface
    {
        return $this->startRental;
    }

    public function setStartRental(\DateTimeInterface $startRental): self
    {
        $this->startRental = $startRental;

        return $this;
    }

    public function getEndRental(): ?\DateTimeInterface
    {
        return $this->endRental;
    }

    public function setEndRental(\DateTimeInterface $endRental): self
    {
        $this->endRental = $endRental;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

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

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $company): self
    {
        $this->company = $company;

        return $this;
    }
}
