<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutoringController extends AbstractController
{
    #[Route('/tutoring', name: 'app_tutoring')]
    public function index(): Response
    {
        return $this->render('tutoring/static.html.twig', [
            'controller_name' => 'TutoringController',
        ]);
    }
}