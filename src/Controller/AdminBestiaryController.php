<?php

namespace App\Controller;

use App\Repository\BestiaryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/bestiaires', name: 'admin_bestiary_')]
class AdminBestiaryController extends AbstractController
{
    // #[Route('/admin/bestiaires', name: 'admin_bestiary_')]
    // public function index(): Response
    // {
    //     return $this->render('admin_bestiary/index.html.twig', [
    //         'controller_name' => 'AdminBestiaryController',
    //     ]);
    // }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(BestiaryRepository $bestiaryRepository): Response
    {
        return $this->render('admin/admin_bestiary/index.html.twig', [
            'bestiaries' => $bestiaryRepository->findAll(),
        ]);
    }
}
