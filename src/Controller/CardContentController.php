<?php

namespace App\Controller;

use App\Entity\CardContent;
use App\Form\CardContentType;
use App\Repository\CardContentRepository;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/card/content')]
class CardContentController extends AbstractController
{
    #[Route('/', name: 'app_card_content_index', methods: ['GET'])]
    public function index(CardContentRepository $cardContentRepository): Response
    {
        return $this->render('card_content/index.html.twig', [
            'card_contents' => $cardContentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_card_content_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CardContentRepository $cardContentRepository, UniversityRepository $universityRepository,SluggerInterface $slugger): Response
    {
        $cardContent = new CardContent();
        $form = $this->createForm(CardContentType::class, $cardContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ImageFile = $form->get('card_pic')->getData();

            if ($ImageFile){
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$ImageFile->guessExtension();
                try {
                    $ImageFile->move(
                        // $this->getParameter('images_directory'),
                        "images/",
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $cardContent->setCardPic($newFilename);
                $cardContentRepository->save($cardContent, true);
                
            }

            return $this->redirectToRoute('app_card_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('card_content/new.html.twig', [
            'card_content' => $cardContent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_card_content_show', methods: ['GET'])]
    public function show(CardContent $cardContent): Response
    {
        return $this->render('card_content/show.html.twig', [
            'card_content' => $cardContent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_card_content_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CardContent $cardContent, CardContentRepository $cardContentRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CardContentType::class, $cardContent);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $ImageFile = $form->get('card_pic')->getData();

            if ($ImageFile){
                $originalFilename = pathinfo($ImageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$ImageFile->guessExtension();
                try {
                    $ImageFile->move(
                        // $this->getParameter('images_directory'),
                        "images/",
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                $cardContent->setCardPic($newFilename);
                $cardContentRepository->save($cardContent, true);
                
            }

            return $this->redirectToRoute('app_card_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('card_content/edit.html.twig', [
            'card_content' => $cardContent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_card_content_delete', methods: ['POST'])]
    public function delete(Request $request, CardContent $cardContent, CardContentRepository $cardContentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cardContent->getId(), $request->request->get('_token'))) {
            $cardContentRepository->remove($cardContent, true);
        }

        return $this->redirectToRoute('app_card_content_index', [], Response::HTTP_SEE_OTHER);
    }
}
