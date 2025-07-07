<?php

namespace App\Controller;

use App\Entity\Pokoje;
use App\Form\PokojeForm;
use App\Repository\PokojeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/pokoje')]
final class PokojeController extends AbstractController
{
    #[Route(name: 'app_pokoje_index', methods: ['GET'])]
    public function index(PokojeRepository $pokojeRepository): Response
    {
        return $this->render('pokoje/index.html.twig', [
            'pokoje' => $pokojeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pokoje_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pokoje = new Pokoje();
        $form = $this->createForm(PokojeForm::class, $pokoje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pokoje);
            $entityManager->flush();
            $this->addFlash('success', 'Dodano pokój');
            return $this->redirectToRoute('app_pokoje_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pokoje/new.html.twig', [
            'pokoje' => $pokoje,
            'form' => $form,
        ]);

    }

    #[Route('/{id}', name: 'app_pokoje_show', methods: ['GET'])]
    public function show(Pokoje $pokoje): Response
    {
        return $this->render('pokoje/show.html.twig', [
            'pokoje' => $pokoje,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pokoje_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pokoje $pokoje, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PokojeForm::class, $pokoje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('warning', 'Zaktualizowano pokój');
            return $this->redirectToRoute('app_pokoje_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pokoje/edit.html.twig', [
            'pokoje' => $pokoje,
            'form' => $form,
        ]);

    }

    #[Route('/{id}', name: 'app_pokoje_delete', methods: ['POST'])]
    public function delete(Request $request, Pokoje $pokoje, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokoje->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($pokoje);
            $entityManager->flush();
            $this->addFlash('danger', 'Usunięto pokój');
        }

        return $this->redirectToRoute('app_pokoje_index', [], Response::HTTP_SEE_OTHER);

    }


}
