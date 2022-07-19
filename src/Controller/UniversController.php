<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UniversController extends AbstractController
{
    #[Route('/univers', name: 'univers_index')]
    public function index(): Response
    {
        return $this->render('univers/index.html.twig', [
            'controller_name' => 'UniversController',
        ]);
    }
}
