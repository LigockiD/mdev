<?php

// src/Entity/Book.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: "book")]
class Book
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    #[Groups(['get'])]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['get'])]
    private string $title;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['get'])]
    private string $author;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['get'])]
    private string $isbn;

    #[ORM\Column(type: "integer")]
    #[Groups(['get'])]
    private int $year;

    #[ORM\Column(type: "string", length: 255)]
    #[Groups(['get'])]
    private string $publisher;

    #[ORM\Column(type: "integer")]
    #[Groups(['get'])]
    private int $availableCopies;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
    }

    public function getAvailableCopies(): int
    {
        return $this->availableCopies;
    }

    public function setAvailableCopies(int $availableCopies): void
    {
        $this->availableCopies = $availableCopies;
    }
}
