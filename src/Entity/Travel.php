<?php

namespace App\Entity;

use App\Repository\TravelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TravelRepository::class)]
class Travel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $num_passengers = null;

    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $out_time = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $arrive_time = null;

    #[ORM\Column(nullable: true)]
    private ?float $kilometers = null;

    #[ORM\Column(nullable: true)]
    private ?float $gas_used_liters = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumPassengers(): ?int
    {
        return $this->num_passengers;
    }

    public function setNumPassengers(?int $num_passengers): static
    {
        $this->num_passengers = $num_passengers;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getOutTime(): ?\DateTime
    {
        return $this->out_time;
    }

    public function setOutTime(?\DateTime $out_time): static
    {
        $this->out_time = $out_time;

        return $this;
    }

    public function getArriveTime(): ?\DateTime
    {
        return $this->arrive_time;
    }

    public function setArriveTime(?\DateTime $arrive_time): static
    {
        $this->arrive_time = $arrive_time;

        return $this;
    }

    public function getKilometers(): ?float
    {
        return $this->kilometers;
    }

    public function setKilometers(?float $kilometers): static
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getGasUsedLiters(): ?float
    {
        return $this->gas_used_liters;
    }

    public function setGasUsedLiters(?float $gas_used_liters): static
    {
        $this->gas_used_liters = $gas_used_liters;

        return $this;
    }
}
