<?php

namespace App\Controller;

use App\Entity\TutUnit;
use App\Form\TutUnitType;
use App\Repository\TutUnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tut/unit')]
class TutUnitController extends AbstractController
{
    #[Route('/', name: 'app_tut_unit_index', methods: ['GET'])]
    public function index(TutUnitRepository $tutUnitRepository): Response
    {
        return $this->render('tut_unit/index.html.twig', [
            'tut_units' => $tutUnitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tut_unit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TutUnitRepository $tutUnitRepository): Response
    {
        $tutUnit = new TutUnit();
        $form = $this->createForm(TutUnitType::class, $tutUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tutUnitRepository->save($tutUnit, true);

            return $this->redirectToRoute('app_tut_unit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tut_unit/new.html.twig', [
            'tut_unit' => $tutUnit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tut_unit_show', methods: ['GET'])]
    public function show(TutUnit $tutUnit): Response
    {
        return $this->render('tut_unit/show.html.twig', [
            'tut_unit' => $tutUnit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tut_unit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TutUnit $tutUnit, TutUnitRepository $tutUnitRepository): Response
    {
        $form = $this->createForm(TutUnitType::class, $tutUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tutUnitRepository->save($tutUnit, true);

            return $this->redirectToRoute('app_tut_unit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tut_unit/edit.html.twig', [
            'tut_unit' => $tutUnit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tut_unit_delete', methods: ['POST'])]
    public function delete(Request $request, TutUnit $tutUnit, TutUnitRepository $tutUnitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tutUnit->getId(), $request->request->get('_token'))) {
            $tutUnitRepository->remove($tutUnit, true);
        }

        return $this->redirectToRoute('app_tut_unit_index', [], Response::HTTP_SEE_OTHER);
    }
}
