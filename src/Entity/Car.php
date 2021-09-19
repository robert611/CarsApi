<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 * @ApiResource()
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $fuel_type;

    /**
     * @ORM\Column(type="string", length=4)
     * @Assert\NotBlank()
     */
    private $production_year;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity=CarBrand::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity=CarPicture::class, mappedBy="car")
     */
    private $carPictures;

    public function __construct()
    {
        $this->carPictures = new ArrayCollection();
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

    public function getFuelType(): ?string
    {
        return $this->fuel_type;
    }

    public function setFuelType(string $fuel_type): self
    {
        $this->fuel_type = $fuel_type;

        return $this;
    }

    public function getProductionYear(): ?string
    {
        return $this->production_year;
    }

    public function setProductionYear(string $production_year): self
    {
        $this->production_year = $production_year;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getBrand(): ?CarBrand
    {
        return $this->brand;
    }

    public function setBrand(?CarBrand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|CarPicture[]
     */
    public function getCarPictures(): Collection
    {
        return $this->carPictures;
    }

    public function addCarPicture(CarPicture $carPicture): self
    {
        if (!$this->carPictures->contains($carPicture)) {
            $this->carPictures[] = $carPicture;
            $carPicture->setCar($this);
        }

        return $this;
    }

    public function removeCarPicture(CarPicture $carPicture): self
    {
        if ($this->carPictures->removeElement($carPicture)) {
            // set the owning side to null (unless already changed)
            if ($carPicture->getCar() === $this) {
                $carPicture->setCar(null);
            }
        }

        return $this;
    }
}
