<?php

namespace App\Entity;

use App\Repository\ServerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServerRepository::class)]
class Server
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $ip = null;

    #[ORM\Column(length: 255)]
    private ?string $port = null;

    #[ORM\Column]
    private ?int $exp_rate = null;

    #[ORM\Column]
    private ?int $training_rate = null;

    #[ORM\Column]
    private ?int $speed_rate = null;

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

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function setPort(string $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getExpRate(): ?int
    {
        return $this->exp_rate;
    }

    public function setExpRate(int $exp_rate): self
    {
        $this->exp_rate = $exp_rate;

        return $this;
    }

    public function getTrainingRate(): ?int
    {
        return $this->training_rate;
    }

    public function setTrainingRate(int $training_rate): self
    {
        $this->training_rate = $training_rate;

        return $this;
    }

    public function getSpeedRate(): ?int
    {
        return $this->speed_rate;
    }

    public function setSpeedRate(int $speed_rate): self
    {
        $this->speed_rate = $speed_rate;

        return $this;
    }
}
