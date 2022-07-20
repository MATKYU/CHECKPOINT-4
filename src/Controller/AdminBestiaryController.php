<?php

namespace App\Controller;

use App\Entity\Bestiary;
use App\Form\BestiaryType;
use App\Repository\BestiaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/bestiaires', name: 'admin_bestiary_')]
class AdminBestiaryController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(BestiaryRepository $bestiaryRepository): Response
    {
        return $this->render('admin/admin_bestiary/index.html.twig', [
            'bestiaries' => $bestiaryRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function new(Request $request, BestiaryRepository $bestiaryRepository): Response
    {
        $bestiary = new Bestiary();
        $form = $this->createForm(BestiaryType::class, $bestiary, [
            'validation_groups' => ['add']
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bestiaryRepository->add($bestiary, true);

            return $this->redirectToRoute('admin_bestiary_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_bestiary/new.html.twig', [
            'bestiary' => $bestiary,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'admin_bestiary_show', methods: ['GET'])]
    // public function show(Bestiary $bestiary): Response
    // {
    //     return $this->render('admin_bestiary/show.html.twig', [
    //         'bestiary' => $bestiary,
    //     ]);
    // }

    #[Route('/{id}/modifier', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bestiary $bestiary, BestiaryRepository $bestiaryRepository): Response
    {
        $form = $this->createForm(BestiaryType::class, $bestiary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bestiaryRepository->add($bestiary, true);

            return $this->redirectToRoute('admin_bestiary_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/admin_bestiary/edit.html.twig', [
            'bestiary' => $bestiary,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Bestiary $bestiary, BestiaryRepository $bestiaryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bestiary->getId(), $request->request->get('_token'))) {
            $bestiaryRepository->remove($bestiary, true);
        }

        return $this->redirectToRoute('admin_bestiary_index', [], Response::HTTP_SEE_OTHER);
    }
}
