<?php

namespace App\Controller;

use App\Entity\Auteurs;
use App\Form\AuteursType;
use App\Repository\AuteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/auteurs')]
class AuteursController extends AbstractController
{
    #[Route('/', name: 'app_auteurs_index', methods: ['GET'])]
    public function index(AuteursRepository $auteursRepository): Response
    {
        return $this->render('auteurs/index.html.twig', [
            'auteurs' => $auteursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_auteurs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AuteursRepository $auteursRepository): Response
    {
        $auteur = new Auteurs();
        $form = $this->createForm(AuteursType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $auteursRepository->save($auteur, true);

            return $this->redirectToRoute('app_auteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteurs/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_auteurs_show', methods: ['GET'])]
    public function show(Auteurs $auteur): Response
    {
        return $this->render('auteurs/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_auteurs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auteurs $auteur, AuteursRepository $auteursRepository): Response
    {
        $form = $this->createForm(AuteursType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $auteursRepository->save($auteur, true);

            return $this->redirectToRoute('app_auteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('auteurs/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_auteurs_delete', methods: ['POST'])]
    public function delete(Request $request, Auteurs $auteur, AuteursRepository $auteursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->request->get('_token'))) {
            $auteursRepository->remove($auteur, true);
        }

        return $this->redirectToRoute('app_auteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
