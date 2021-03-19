<?php

namespace App\Entity;

use App\Repository\LightVehiclesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LightVehiclesRepository::class)
 */
class LightVehicles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $numberPlate;

    /**
     * @ORM\Column(type="date")
     */
    private $putCirculation;

    /**
     * @ORM\Column(type="date")
     */
    private $entrancePark;

    /**
     * @ORM\Column(type="date")
     */
    private $exitPark;

    /**
     * @ORM\Column(type="integer")
     */
    private $km;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isArchived;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="lightVehicles")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=Bodies::class, inversedBy="lightVehicles")
     */
    private $body;

    /**
     * @ORM\ManyToOne(targetEntity=Brands::class, inversedBy="lightVehicles")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="lightVehicles")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $emptyWeight;

    /**
     * @ORM\OneToMany(targetEntity=LVehiclesPictures::class, mappedBy="lightVehicle")
     */
    private $lVehiclesPictures;

    /**
     * @ORM\ManyToOne(targetEntity=TireBrands::class, inversedBy="lightVehiclesAV")
     */
    private $tireBrandsAV;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tireSizeAV;

    /**
     * @ORM\ManyToOne(targetEntity=TireBrands::class, inversedBy="lightVehiclesAR")
     */
    private $tireBrandsAR;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tireSizeAR;

    /**
     * @ORM\ManyToOne(targetEntity=VehiclesKind::class, inversedBy="lightVehicles")
     */
    private $kind;

    /**
     * @ORM\ManyToOne(targetEntity=VehiclesType::class, inversedBy="lightVehicles")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bodyType;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlaces;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $energy;

    /**
     * @ORM\Column(type="integer")
     */
    private $power;

    /**
     * @ORM\OneToMany(targetEntity=LVehiclesDocuments::class, mappedBy="vehicle")
     */
    private $lVehiclesDocuments;

    /**
     * @ORM\OneToMany(targetEntity=LVehiclesRentals::class, mappedBy="vehicle")
     */
    private $lVehiclesRentals;

    public function __construct()
    {
        $this->lVehiclesPictures = new ArrayCollection();
        $this->lVehiclesDocuments = new ArrayCollection();
        $this->lVehiclesRentals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberPlate(): ?string
    {
        return $this->numberPlate;
    }

    public function setNumberPlate(string $numberPlate): self
    {
        $this->numberPlate = $numberPlate;

        return $this;
    }

    public function getPutCirculation(): ?\DateTimeInterface
    {
        return $this->putCirculation;
    }

    public function setPutCirculation(\DateTimeInterface $putCirculation): self
    {
        $this->putCirculation = $putCirculation;

        return $this;
    }

    public function getEntrancePark(): ?\DateTimeInterface
    {
        return $this->entrancePark;
    }

    public function setEntrancePark(\DateTimeInterface $entrancePark): self
    {
        $this->entrancePark = $entrancePark;

        return $this;
    }

    public function getExitPark(): ?\DateTimeInterface
    {
        return $this->exitPark;
    }

    public function setExitPark(\DateTimeInterface $exitPark): self
    {
        $this->exitPark = $exitPark;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): self
    {
        $this->km = $km;

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

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getBody(): ?Bodies
    {
        return $this->body;
    }

    public function setBody(?Bodies $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getBrand(): ?Brands
    {
        return $this->brand;
    }

    public function setBrand(?Brands $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getEmptyWeight(): ?string
    {
        return $this->emptyWeight;
    }

    public function setEmptyWeight(string $emptyWeight): self
    {
        $this->emptyWeight = $emptyWeight;

        return $this;
    }

    /**
     * @return Collection|LVehiclesPictures[]
     */
    public function getLVehiclesPictures(): Collection
    {
        return $this->lVehiclesPictures;
    }

    public function addLVehiclesPicture(LVehiclesPictures $lVehiclesPicture): self
    {
        if (!$this->lVehiclesPictures->contains($lVehiclesPicture)) {
            $this->lVehiclesPictures[] = $lVehiclesPicture;
            $lVehiclesPicture->setLightVehicle($this);
        }

        return $this;
    }

    public function removeLVehiclesPicture(LVehiclesPictures $lVehiclesPicture): self
    {
        if ($this->lVehiclesPictures->removeElement($lVehiclesPicture)) {
            // set the owning side to null (unless already changed)
            if ($lVehiclesPicture->getLightVehicle() === $this) {
                $lVehiclesPicture->setLightVehicle(null);
            }
        }

        return $this;
    }

    public function getTireBrandsAV(): ?TireBrands
    {
        return $this->tireBrandsAV;
    }

    public function setTireBrandsAV(?TireBrands $tireBrandsAV): self
    {
        $this->tireBrandsAV = $tireBrandsAV;

        return $this;
    }

    public function getTireSizeAV(): ?string
    {
        return $this->tireSizeAV;
    }

    public function setTireSizeAV(string $tireSizeAV): self
    {
        $this->tireSizeAV = $tireSizeAV;

        return $this;
    }

    public function getTireBrandsAR(): ?TireBrands
    {
        return $this->tireBrandsAR;
    }

    public function setTireBrandsAR(?TireBrands $tireBrandsAR): self
    {
        $this->tireBrandsAR = $tireBrandsAR;

        return $this;
    }

    public function getTireSizeAR(): ?string
    {
        return $this->tireSizeAR;
    }

    public function setTireSizeAR(string $tireSizeAR): self
    {
        $this->tireSizeAR = $tireSizeAR;

        return $this;
    }

    public function getKind(): ?VehiclesKind
    {
        return $this->kind;
    }

    public function setKind(?VehiclesKind $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function getType(): ?VehiclesType
    {
        return $this->type;
    }

    public function setType(?VehiclesType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBodyType(): ?string
    {
        return $this->bodyType;
    }

    public function setBodyType(string $bodyType): self
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): self
    {
        $this->power = $power;

        return $this;
    }

    /**
     * @return Collection|LVehiclesDocuments[]
     */
    public function getLVehiclesDocuments(): Collection
    {
        return $this->lVehiclesDocuments;
    }

    public function addLVehiclesDocument(LVehiclesDocuments $lVehiclesDocument): self
    {
        if (!$this->lVehiclesDocuments->contains($lVehiclesDocument)) {
            $this->lVehiclesDocuments[] = $lVehiclesDocument;
            $lVehiclesDocument->setVehicle($this);
        }

        return $this;
    }

    public function removeLVehiclesDocument(LVehiclesDocuments $lVehiclesDocument): self
    {
        if ($this->lVehiclesDocuments->removeElement($lVehiclesDocument)) {
            // set the owning side to null (unless already changed)
            if ($lVehiclesDocument->getVehicle() === $this) {
                $lVehiclesDocument->setVehicle(null);
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
            $lVehiclesRental->setVehicle($this);
        }

        return $this;
    }

    public function removeLVehiclesRental(LVehiclesRentals $lVehiclesRental): self
    {
        if ($this->lVehiclesRentals->removeElement($lVehiclesRental)) {
            // set the owning side to null (unless already changed)
            if ($lVehiclesRental->getVehicle() === $this) {
                $lVehiclesRental->setVehicle(null);
            }
        }

        return $this;
    }
}
