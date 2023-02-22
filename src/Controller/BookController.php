<?php

// src/Controller/BookController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/books')]
class BookController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private BookRepository $bookRepository;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
        BookRepository $bookRepository,
        ValidatorInterface $validator
    )
    {
        $this->entityManager = $entityManager;
        $this->bookRepository = $bookRepository;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    #[Route('/', name: 'book_list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $repository = $this->bookRepository;
        $books = $repository->findAll();
        $data = $this->serializer->serialize($books, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'book_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $repository = $this->bookRepository;
        $book = $repository->find($id);
        $data = $this->serializer->serialize($book, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        if (!$book) {
            return new JsonResponse(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($data);
    }

    #[Route('/', name: 'book_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $book = new Book();
        //dd($request->request);
        $book->setTitle($request->request->get('title'));
        $book->setAuthor($request->request->get('author'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setYear($request->request->get('year'));
        $book->setPublisher($request->request->get('publisher'));
        $book->setAvailableCopies($request->request->get('availableCopies'));
        $data = $this->serializer->serialize($book, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        $errors = $this->validator->validate($book);

        if (count($errors) > 0) {
            $data = $this->serializer->serialize($errors, 'json');

            return new JsonResponse($data, Response::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager = $this->entityManager;
        $entityManager->persist($book);
        $entityManager->flush();

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'book_update', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $entityManager = $this->entityManager;
        $repository = $entityManager->getRepository(Book::class);

        $book = $repository->find($id);

        if (!$book) {
            return new JsonResponse(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }
        if($request->request->has('title'))
            $book->setTitle($request->request->get('title'));
        if($request->request->has('author'))
            $book->setAuthor($request->request->get('author'));
        if($request->request->has('isbn'))
            $book->setIsbn($request->request->get('isbn'));
        if($request->request->has('year'))
            $book->setYear($request->request->get('year'));
        if($request->request->has('publisher'))
            $book->setPublisher($request->request->get('publisher'));
        if($request->request->has('availableCopies'))
            $book->setAvailableCopies($request->request->get('availableCopies'));

        $data = $this->serializer->serialize($book, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        $entityManager->persist($book);
        $entityManager->flush();

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'book_delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $entityManager = $this->entityManager;
        $repository = $entityManager->getRepository(Book::class);

        $book = $repository->find($id);

        if (!$book) {
            return new JsonResponse(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
