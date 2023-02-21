<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Loan;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class JebaneFixtures extends Fixture
{
    private $hasherFactory;

    public function __construct(PasswordHasherFactoryInterface $hasherFactory)
    {
        $this->hasherFactory = $hasherFactory;
    }

    public function load(ObjectManager $manager)
    {
        $bcrypt = $this->hasherFactory->getPasswordHasher('bcrypt');
        for($i=0; $i<15; $i++) {
            $faker = Factory::create();
            $user = new User();
            $user->setName($faker->name);
            $user->setEmail($faker->email);
            $user->setPassword($bcrypt->hash($faker->password));
            $user->setRoles([]);
            $manager->persist($user);

            $book = new Book();
            $book->setAuthor($faker->name);
            $book->setIsbn($faker->isbn13);
            $book->setAvailableCopies($faker->numberBetween(1,20));
            $book->setTitle($faker->title);
            $book->setYear($faker->numberBetween(1988,2022));
            $book->setPublisher($faker->firstNameFemale);
            $manager->persist($book);

            $loan = new Loan();
            $loan->setUser($user);
            $loan->setBook($book);
            $loan->setDateBorrowed($faker->dateTimeThisDecade);
            $loan->setDateReturned($faker->dateTimeThisMonth);
            $manager->persist($loan);
        }
        $user = new User();
        $user->setName('admin');
        $user->setEmail('admin@wp.pl');
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($bcrypt->hash('admin'));
        $manager->persist($user);

        $manager->flush();
    }
}
