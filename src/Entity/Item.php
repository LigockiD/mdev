<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\Column]
    private ?int $bonus1 = null;

    #[ORM\Column]
    private ?int $bonus1_value = null;

    #[ORM\Column]
    private ?int $bonus2 = null;

    #[ORM\Column]
    private ?int $bonus2_value = null;

    #[ORM\Column]
    private ?int $bonus3 = null;

    #[ORM\Column]
    private ?int $bonus3_value = null;

    #[ORM\Column]
    private ?int $bonus4 = null;

    #[ORM\Column]
    private ?int $bonus4_value = null;

    #[ORM\Column]
    private ?int $bonus5 = null;

    #[ORM\Column]
    private ?int $bonus5_value = null;

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBonus1(): ?int
    {
        return $this->bonus1;
    }

    public function setBonus1(int $bonus1): self
    {
        $this->bonus1 = $bonus1;

        return $this;
    }

    public function getBonus1Value(): ?int
    {
        return $this->bonus1_value;
    }

    public function setBonus1Value(int $bonus1_value): self
    {
        $this->bonus1_value = $bonus1_value;

        return $this;
    }

    public function getBonus2(): ?int
    {
        return $this->bonus2;
    }

    public function setBonus2(int $bonus2): self
    {
        $this->bonus2 = $bonus2;

        return $this;
    }

    public function getBonus2Value(): ?int
    {
        return $this->bonus2_value;
    }

    public function setBonus2Value(int $bonus2_value): self
    {
        $this->bonus2_value = $bonus2_value;

        return $this;
    }

    public function getBonus3(): ?int
    {
        return $this->bonus3;
    }

    public function setBonus3(int $bonus3): self
    {
        $this->bonus3 = $bonus3;

        return $this;
    }

    public function getBonus3Value(): ?int
    {
        return $this->bonus3_value;
    }

    public function setBonus3Value(int $bonus3_value): self
    {
        $this->bonus3_value = $bonus3_value;

        return $this;
    }

    public function getBonus4(): ?int
    {
        return $this->bonus4;
    }

    public function setBonus4(int $bonus4): self
    {
        $this->bonus4 = $bonus4;

        return $this;
    }

    public function getBonus4Value(): ?int
    {
        return $this->bonus4_value;
    }

    public function setBonus4Value(int $bonus4_value): self
    {
        $this->bonus4_value = $bonus4_value;

        return $this;
    }

    public function getBonus5(): ?int
    {
        return $this->bonus5;
    }

    public function setBonus5(int $bonus5): self
    {
        $this->bonus5 = $bonus5;

        return $this;
    }

    public function getBonus5Value(): ?int
    {
        return $this->bonus5_value;
    }

    public function setBonus5Value(int $bonus5_value): self
    {
        $this->bonus5_value = $bonus5_value;

        return $this;
    }
}
