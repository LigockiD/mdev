<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestRepository::class)]
class Quest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 5000)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $reward1 = null;

    #[ORM\Column]
    private ?int $reward1_value = null;

    #[ORM\Column(nullable: true)]
    private ?int $reward2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $reward2_value = null;

    #[ORM\Column(nullable: true)]
    private ?int $reward3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $reward3_value = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReward1(): ?int
    {
        return $this->reward1;
    }

    public function setReward1(int $reward1): self
    {
        $this->reward1 = $reward1;

        return $this;
    }

    public function getReward1Value(): ?int
    {
        return $this->reward1_value;
    }

    public function setReward1Value(int $reward1_value): self
    {
        $this->reward1_value = $reward1_value;

        return $this;
    }

    public function getReward2(): ?int
    {
        return $this->reward2;
    }

    public function setReward2(?int $reward2): self
    {
        $this->reward2 = $reward2;

        return $this;
    }

    public function getReward2Value(): ?int
    {
        return $this->reward2_value;
    }

    public function setReward2Value(?int $reward2_value): self
    {
        $this->reward2_value = $reward2_value;

        return $this;
    }

    public function getReward3(): ?int
    {
        return $this->reward3;
    }

    public function setReward3(?int $reward3): self
    {
        $this->reward3 = $reward3;

        return $this;
    }

    public function getReward3Value(): ?int
    {
        return $this->reward3_value;
    }

    public function setReward3Value(?int $reward3_value): self
    {
        $this->reward3_value = $reward3_value;

        return $this;
    }
}
