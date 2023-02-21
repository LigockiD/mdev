<?php

// src/Entity/Loan.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: "loan")]
class Loan
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    #[Groups(['get'])]
    private int $id;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", onDelete: "SET NULL")]
    #[Groups(['get'])]
    private User $user;

    #[ORM\ManyToOne(targetEntity: "Book")]
    #[ORM\JoinColumn(name: "book_id", referencedColumnName: "id", onDelete: "SET NULL")]
    #[Groups(['get'])]
    private Book $book;

    #[ORM\Column(type: "datetime")]
    #[Groups(['get'])]
    private \DateTimeInterface $dateBorrowed;

    #[ORM\Column(type: "datetime", nullable: true)]
    #[Groups(['get'])]
    private ?\DateTimeInterface $dateReturned = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function setBook(Book $book): void
    {
        $this->book = $book;
    }

    public function getDateBorrowed(): \DateTimeInterface
    {
        return $this->dateBorrowed;
    }

    public function setDateBorrowed(\DateTimeInterface $dateBorrowed): void
    {
        $this->dateBorrowed = $dateBorrowed;
    }

    public function getDateReturned(): ?\DateTimeInterface
    {
        return $this->dateReturned;
    }

    public function setDateReturned(?\DateTimeInterface $dateReturned): void
    {
        $this->dateReturned = $dateReturned;
    }
}
