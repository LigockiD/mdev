<?php

namespace App\Entity;

use App\Repository\EmpireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpireRepository::class)]
class Empire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $leader_id = null;

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

    public function getLeaderId(): ?int
    {
        return $this->leader_id;
    }

    public function setLeaderId(int $leader_id): self
    {
        $this->leader_id = $leader_id;

        return $this;
    }
}
