<?php

namespace App\DataFixtures;

use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture
{
    public const PLACES = [
        [
            'Name' => 'Rapture',
        ],
        [
            'Name' => 'Fortesse Folâtre',
        ],
        [
            'Name' => 'Fontaine Futuristics',
        ],
        [
            'Name' => 'Batisphère',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PLACES as $placesItems) {
            $place = new Place();
            $place->setName($placesItems['Name']);
            $this->addReference('place' . $placesItems['Name'], $place);
            $manager->persist($place);
        }
        $manager->flush();
    }
}
