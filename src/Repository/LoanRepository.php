<?php

// src/Repository/LoanRepository.php
namespace App\Repository;

use App\Entity\Loan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LoanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loan::class);
    }

    public function findActiveLoansByUser(int $userId)
    {
        return $this->createQueryBuilder('l')
            ->where('l.user = :user')
            ->andWhere('l.dateReturned IS NULL')
            ->setParameter('user', $userId)
            ->getQuery()
            ->getResult();
    }

    public function findLoansByBook(int $bookId)
    {
        return $this->createQueryBuilder('l')
            ->where('l.book = :book')
            ->setParameter('book', $bookId)
            ->getQuery()
            ->getResult();
    }

    public function findLoansByBorrowDate(\DateTimeInterface $borrowDate)
    {
        return $this->createQueryBuilder('l')
            ->where('l.dateBorrowed = :borrowDate')
            ->setParameter('borrowDate', $borrowDate)
            ->getQuery()
            ->getResult();
    }

    public function findLoansByReturnDate(\DateTimeInterface $returnDate)
    {
        return $this->createQueryBuilder('l')
            ->where('l.dateReturned = :returnDate')
            ->setParameter('returnDate', $returnDate)
            ->getQuery()
            ->getResult();
    }
}
