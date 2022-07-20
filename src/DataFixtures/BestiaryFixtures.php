<?php

namespace App\DataFixtures;

use App\Entity\Bestiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BestiaryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bestiary = new Bestiary();
        $bestiary->setImage('AndrewRyan.jpeg');
        $bestiary->setName('Andrew Ryan');
        $bestiary->setDescription('Andrew Ryan est l\'homme qui à crée Rapture.');
        $manager->persist($bestiary);
        $manager->flush();
    }
}
