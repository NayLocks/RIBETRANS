<?php

namespace App\Entity;

use App\Repository\TireBrandsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TireBrandsRepository::class)
 */
class TireBrands
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
     * @ORM\OneToMany(targetEntity=LightVehicles::class, mappedBy="tireBrandsAV")
     */
    private $lightVehiclesAV;

    /**
     * @ORM\OneToMany(targetEntity=LightVehicles::class, mappedBy="tireBrandsAR")
     */
    private $lightVehiclesAR;

    public function __construct()
    {
        $this->lightVehiclesAV = new ArrayCollection();
        $this->lightVehiclesAR = new ArrayCollection();
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
    public function getLightVehiclesAV(): Collection
    {
        return $this->lightVehiclesAV;
    }

    public function addLightVehiclesAV(LightVehicles $lightVehiclesAV): self
    {
        if (!$this->lightVehiclesAV->contains($lightVehiclesAV)) {
            $this->lightVehiclesAV[] = $lightVehiclesAV;
            $lightVehiclesAV->setTireBrandsAV($this);
        }

        return $this;
    }

    public function removeLightVehiclesAV(LightVehicles $lightVehiclesAV): self
    {
        if ($this->lightVehiclesAV->removeElement($lightVehiclesAV)) {
            // set the owning side to null (unless already changed)
            if ($lightVehiclesAV->getTireBrandsAV() === $this) {
                $lightVehiclesAV->setTireBrandsAV(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LightVehicles[]
     */
    public function getLightVehiclesAR(): Collection
    {
        return $this->lightVehiclesAR;
    }

    public function addLightVehiclesAR(LightVehicles $lightVehiclesAR): self
    {
        if (!$this->lightVehiclesAR->contains($lightVehiclesAR)) {
            $this->lightVehiclesAR[] = $lightVehiclesAR;
            $lightVehiclesAR->setTireBrandsAR($this);
        }

        return $this;
    }

    public function removeLightVehiclesAR(LightVehicles $lightVehiclesAR): self
    {
        if ($this->lightVehiclesAR->removeElement($lightVehiclesAR)) {
            // set the owning side to null (unless already changed)
            if ($lightVehiclesAR->getTireBrandsAR() === $this) {
                $lightVehiclesAR->setTireBrandsAR(null);
            }
        }

        return $this;
    }
}
