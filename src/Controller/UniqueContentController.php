<?php

namespace App\Controller;

use App\Entity\UniqueContent;
use App\Form\UniqueContentType;
use App\Repository\UniqueContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/unique/content')]
class UniqueContentController extends AbstractController
{
    #[Route('/', name: 'app_unique_content_index', methods: ['GET'])]
    public function index(UniqueContentRepository $uniqueContentRepository): Response
    {
        return $this->render('unique_content/index.html.twig', [
            'unique_contents' => $uniqueContentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_unique_content_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UniqueContentRepository $uniqueContentRepository): Response
    {
        $uniqueContent = new UniqueContent();
        $form = $this->createForm(UniqueContentType::class, $uniqueContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uniqueContentRepository->save($uniqueContent, true);

            return $this->redirectToRoute('app_unique_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('unique_content/new.html.twig', [
            'unique_content' => $uniqueContent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unique_content_show', methods: ['GET'])]
    public function show(UniqueContent $uniqueContent): Response
    {
        return $this->render('unique_content/show.html.twig', [
            'unique_content' => $uniqueContent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_unique_content_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UniqueContent $uniqueContent, UniqueContentRepository $uniqueContentRepository): Response
    {
        $form = $this->createForm(UniqueContentType::class, $uniqueContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uniqueContentRepository->save($uniqueContent, true);

            return $this->redirectToRoute('app_unique_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('unique_content/edit.html.twig', [
            'unique_content' => $uniqueContent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unique_content_delete', methods: ['POST'])]
    public function delete(Request $request, UniqueContent $uniqueContent, UniqueContentRepository $uniqueContentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uniqueContent->getId(), $request->request->get('_token'))) {
            $uniqueContentRepository->remove($uniqueContent, true);
        }

        return $this->redirectToRoute('app_unique_content_index', [], Response::HTTP_SEE_OTHER);
    }
}
