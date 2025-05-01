<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $rut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $license_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRut(): ?string
    {
        return $this->rut;
    }

    public function setRut(?string $rut): static
    {
        $this->rut = $rut;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLicenseType(): ?string
    {
        return $this->license_type;
    }

    public function setLicenseType(?string $license_type): static
    {
        $this->license_type = $license_type;

        return $this;
    }
}
