<?php

namespace App\DataFixtures;

use App\Entity\Bestiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BestiaryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $bestiary = new Bestiary();
        $bestiary->setImage('AndrewRyan.jpeg');
        $bestiary->setName('Andrew Ryan');
        $bestiary->setDescription('Andrew Ryan est l\'homme qui à crée Rapture.');
        $bestiary->setCategory($this->getReference('category' . CategoryFixtures::Human ));
        $manager->persist($bestiary);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
