<?php

namespace App\Entity;

use App\Repository\RideStopRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RideStopRepository::class)]
class RideStop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $arrival_time = null;

    #[ORM\Column(nullable: true)]
    private ?int $num_passengers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalTime(): ?\DateTime
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(?\DateTime $arrival_time): static
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getNumPassengers(): ?int
    {
        return $this->num_passengers;
    }

    public function setNumPassengers(int $num_passengers): static
    {
        $this->num_passengers = $num_passengers;

        return $this;
    }
}
