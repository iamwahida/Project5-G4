<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\UniqueContent;
use App\Form\UniqueContentType;
use App\Repository\UniqueContentRepository;

class TutoringController extends AbstractController
{
    #[Route('/tutoring', name: 'app_tutoring')]
    public function index(UniqueContentRepository $uniquecontentRepository): Response
    {
        return $this->render('tutoring/static.html.twig', [
            'controller_name' => 'TutoringController',
            'UniqueContent' => $uniquecontentRepository->findAll(),
        ]);
    }
    #[Route('/calendar', name: 'app_calendar')]
    public function calendar(): Response
    {
        return $this->render('components/calendar.html.twig', [
            'controller_name' => 'TutoringController',
        ]);
    }
}

