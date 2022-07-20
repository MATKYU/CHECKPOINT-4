<?php

namespace App\DataFixtures;

use App\Entity\Bestiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BestiaryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mob = new Bestiary();
        $mob->setImage('AndrewRyan.jpeg');
        $mob->setName('Andrew Ryan');
        $mob->setDescritpion('Andrew Ryan est l\'homme qui à crée Rapture.');
        $manager->persist($mob);
        $manager->flush();
    }
}
