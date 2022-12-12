<?php

namespace App\Controller;

use App\Entity\University;
use App\Form\UniversityType;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/university')]
class UniversityController extends AbstractController
{
    #[Route('/', name: 'app_university_index', methods: ['GET'])]
    public function index(UniversityRepository $universityRepository): Response
    {
        return $this->render('university/index.html.twig', [
            'universities' => $universityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_university_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UniversityRepository $universityRepository): Response
    {
        $university = new University();
        $form = $this->createForm(UniversityType::class, $university);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $universityRepository->save($university, true);

            return $this->redirectToRoute('app_university_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('university/new.html.twig', [
            'university' => $university,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_university_show', methods: ['GET'])]
    public function show(University $university): Response
    {
        return $this->render('university/show.html.twig', [
            'university' => $university,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_university_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, University $university, UniversityRepository $universityRepository): Response
    {
        $form = $this->createForm(UniversityType::class, $university);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $universityRepository->save($university, true);

            return $this->redirectToRoute('app_university_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('university/edit.html.twig', [
            'university' => $university,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_university_delete', methods: ['POST'])]
    public function delete(Request $request, University $university, UniversityRepository $universityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$university->getId(), $request->request->get('_token'))) {
            $universityRepository->remove($university, true);
        }

        return $this->redirectToRoute('app_university_index', [], Response::HTTP_SEE_OTHER);
    }
}
