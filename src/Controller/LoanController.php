<?php
// src/Controller/Loan.php
namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\LoanRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Loan;
use App\Entity\Book;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/loans')]
class LoanController extends AbstractController
{
    private $entityManager;
    private $loanRepository;
    private $bookRepository;
    private $userRepository;
    private $serializer;
    private $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        LoanRepository $loanRepository,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        BookRepository $bookRepository,
        UserRepository $userRepository
    )

    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->loanRepository = $loanRepository;
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;
        $this->validator = $validator;
    }


    #[Route('/', name: 'loan_list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $repository = $this->loanRepository;
        $loans = $repository->findAll();
        $data = $this->serializer->serialize($loans, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'loan_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $repository = $this->loanRepository;
        $loan = $repository->find($id);

        if (!$loan) {
            return new JsonResponse(['error' => 'Loan not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $this->serializer->serialize($loan, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        return new JsonResponse($data);
    }

    #[Route('/', name: 'loan_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $loan = new Loan();
        $loan->setUser($this->userRepository->find($request->request->get('userId')));
        $loan->setBook($this->bookRepository->find($request->request->get('bookId')));
        $loan->setDateBorrowed(new \DateTime());
        $data = $this->serializer->serialize($loan, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        $errors = $this->validator->validate($loan);

        if (count($errors) > 0) {
            $data = $this->serializer->serialize($errors, 'json');

            return new JsonResponse($data, Response::HTTP_BAD_REQUEST, [], true);
        }

        $this->entityManager->persist($loan);
        $this->entityManager->flush();

        return new JsonResponse($data);
    }

    #[Route('/{id}',name: 'loan_update', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $entityManager = $this->entityManager;
        $repository = $this->loanRepository;

        $loan = $repository->find($id);

        if (!$loan) {
            return new JsonResponse(['error' => 'Loan not found'], Response::HTTP_NOT_FOUND);
        }
        if ($request->request->has('date_returned')) {
            $loan->setDateReturned(new \DateTime($request->request->get('date_returned')));
        }

        $data = $this->serializer->serialize($loan, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);

        $entityManager->persist($loan);
        $entityManager->flush();

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'loan_delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $entityManager = $this->entityManager;
        $repository = $this->loanRepository;

        $loan = $repository->find($id);

        if (!$loan) {
            return new JsonResponse(['error' => 'Loan not found'], Response::HTTP_NOT_FOUND);
        }

        $entityManager->remove($loan);
        $entityManager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    #[Route('/return/{id}', name: 'loan_return', methods: ['PATCH'])]
    public function returned(int $id): JsonResponse
    {
        $entityManager = $this->entityManager;
        $repository = $this->loanRepository;

        $loan = $repository->find($id);

        if (!$loan) {
            return new JsonResponse(['error' => 'Loan not found'], Response::HTTP_NOT_FOUND);
        }
        if($loan->getDateReturned()){
            return new JsonResponse(['error' => 'Already returned']);
        }
        $loan->setDateReturned(new \DateTime());
        $data = $this->serializer->serialize($loan, 'json', ['groups' => 'get']);
        $data = json_decode($data, true);
        $entityManager->persist($loan);
        $entityManager->flush();

        return new JsonResponse($data);
    }
}
