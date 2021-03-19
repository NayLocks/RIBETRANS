<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $littleName;

    /**
     * @ORM\OneToMany(targetEntity=LightVehicles::class, mappedBy="category")
     */
    private $lightVehicles;

    public function __construct()
    {
        $this->lightVehicles = new ArrayCollection();
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
            $lightVehicle->setCategory($this);
        }

        return $this;
    }

    public function removeLightVehicle(LightVehicles $lightVehicle): self
    {
        if ($this->lightVehicles->removeElement($lightVehicle)) {
            // set the owning side to null (unless already changed)
            if ($lightVehicle->getCategory() === $this) {
                $lightVehicle->setCategory(null);
            }
        }

        return $this;
    }
}
