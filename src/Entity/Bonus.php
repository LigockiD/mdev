<?php

namespace App\Entity;

use App\Repository\BonusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonusRepository::class)]
class Bonus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $value1 = null;

    #[ORM\Column]
    private ?int $value2 = null;

    #[ORM\Column]
    private ?int $value3 = null;

    #[ORM\Column]
    private ?int $value4 = null;

    #[ORM\Column]
    private ?int $value5 = null;

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

    public function getValue1(): ?int
    {
        return $this->value1;
    }

    public function setValue1(int $value1): self
    {
        $this->value1 = $value1;

        return $this;
    }

    public function getValue2(): ?int
    {
        return $this->value2;
    }

    public function setValue2(int $value2): self
    {
        $this->value2 = $value2;

        return $this;
    }

    public function getValue3(): ?int
    {
        return $this->value3;
    }

    public function setValue3(int $value3): self
    {
        $this->value3 = $value3;

        return $this;
    }

    public function getValue4(): ?int
    {
        return $this->value4;
    }

    public function setValue4(int $value4): self
    {
        $this->value4 = $value4;

        return $this;
    }

    public function getValue5(): ?int
    {
        return $this->value5;
    }

    public function setValue5(int $value5): self
    {
        $this->value5 = $value5;

        return $this;
    }
}
