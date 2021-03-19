<?php

namespace App\Entity;

use App\Repository\LVehiclesPicturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LVehiclesPicturesRepository::class)
 */
class LVehiclesPictures
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity=LightVehicles::class, inversedBy="lVehiclesPictures")
     */
    private $lightVehicle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getNbPicture(): ?int
    {
        return $this->nbPicture;
    }

    public function setNbPicture(int $nbPicture): self
    {
        $this->nbPicture = $nbPicture;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getLightVehicle(): ?LightVehicles
    {
        return $this->lightVehicle;
    }

    public function setLightVehicle(?LightVehicles $lightVehicle): self
    {
        $this->lightVehicle = $lightVehicle;

        return $this;
    }
}
