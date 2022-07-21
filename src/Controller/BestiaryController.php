<?php

namespace App\Controller;

use App\Repository\BestiaryRepository;
use App\Repository\CapacityRepository;
use App\Repository\CategoryRepository;
use App\Repository\PlaceRepository;
use App\Repository\WeaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bestiaires', name: 'bestiary_')]
class BestiaryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository, PlaceRepository $placeRepository, WeaponRepository $weaponRepository, CapacityRepository $capacityRepository): Response
    {
        $categories = $categoryRepository->findAll();
        $places = $placeRepository->findAll();
        $weapons = $weaponRepository->findAll();
        $capacities = $capacityRepository->findAll();
        return $this->render('bestiary/index.html.twig', [
            'categories' => $categories,
            'places' => $places,
            'weapons' => $weapons,
            'capacities' => $capacities,
        ]);
    }
}
