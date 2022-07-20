<?php

namespace App\Controller;

use App\Repository\BestiaryRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bestiaires', name: 'bestiary_')]
class BestiaryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('bestiary/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
