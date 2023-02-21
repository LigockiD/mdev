<?php

// src/Repository/BookRepository.php
namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findAvailableBooks()
    {
        return $this->createQueryBuilder('b')
            ->where('b.availableCopies > 0')
            ->getQuery()
            ->getResult();
    }

    public function findBooksByAuthor(string $author)
    {
        return $this->createQueryBuilder('b')
            ->where('b.author = :author')
            ->setParameter('author', $author)
            ->getQuery()
            ->getResult();
    }

    public function findBooksByTitle(string $title)
    {
        return $this->createQueryBuilder('b')
            ->where('b.title = :title')
            ->setParameter('title', $title)
            ->getQuery()
            ->getResult();
    }

    public function findBooksByIsbn(string $isbn)
    {
        return $this->createQueryBuilder('b')
            ->where('b.isbn = :isbn')
            ->setParameter('isbn', $isbn)
            ->getQuery()
            ->getResult();
    }

    public function findBooksByYear(int $year)
    {
        return $this->createQueryBuilder('b')
            ->where('b.year = :year')
            ->setParameter('year', $year)
            ->getQuery()
            ->getResult();
    }

    public function findBooksByPublisher(string $publisher)
    {
        return $this->createQueryBuilder('b')
            ->where('b.publisher = :publisher')
            ->setParameter('publisher', $publisher)
            ->getQuery()
            ->getResult();
    }
}
