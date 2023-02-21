<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LoadController extends AbstractController
{
    #[Route('/load', name: 'app_load')]
    public function index(): Response
    {
        $data  = array('controller_name' => 'John Doe');
        return new Response(
            $this->renderView('load/index.html.twig', $data)
        );
    }
}
