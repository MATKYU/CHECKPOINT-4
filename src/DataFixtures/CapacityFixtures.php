<?php

namespace App\DataFixtures;

use App\Entity\Capacity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CapacityFixtures extends Fixture
{
    public const PLASMIDES = [
        [
            'Name' => 'Nuée d\'insecte',
        ],
        [
            'Name' => 'incinération',
        ],
        [
            'Name' => 'Piège à vortex',
        ],
        [
            'Name' => 'StentorSonic',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PLASMIDES as $capacitiesItems) {
            $capacity = new Capacity();
            $capacity->setName($capacitiesItems['Name']);
            $this->addReference('plasmide' . $capacitiesItems['Name'], $capacity);
            $manager->persist($capacity);
        }
        $manager->flush();
    }
}
