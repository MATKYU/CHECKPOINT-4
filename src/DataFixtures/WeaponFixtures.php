<?php

namespace App\DataFixtures;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture
{
    public const WEAPONS = [
        [
            'Name' => 'Clé à Molette',
        ],
        [
            'Name' => 'Lancer Chimique',
        ],
        [
            'Name' => 'Arbalète',
        ],
        [
            'Name' => 'Appareil photo de recherche',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::WEAPONS as $weaponsItems) {
            $weapon = new Weapon();
            $weapon->setName($weaponsItems['Name']);
            $this->addReference('weapon' . $weaponsItems['Name'], $weapon);
            $manager->persist($weapon);
        }
        $manager->flush();
    }
}
