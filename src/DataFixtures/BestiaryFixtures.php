<?php

namespace App\DataFixtures;

use App\Entity\Bestiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BestiaryFixtures extends Fixture implements DependentFixtureInterface
{
    // public const VALUES = 3;

    public const BESTIARIES = [
        [
            'Image' => 'AndrewRyan.jpeg',
            'Name' => 'Andrew Ryan',
            'Description' => 'Andrew Ryan est l\'homme qui à crée Rapture.',
        ],
        [
            'Image' => 'FrankFontaine.png',
            'Name' => 'Frank Fontaine',
            'Description' => 'Frank Fontaine est l\'homme qui à ouvert le pôle Fontaine Futuristicts',
        ],
        [
            'Image' => 'SanderCohen.jpeg',
            'Name' => 'Sander Cohen',
            'Description' => 'Sander Cohen est l\'homme qui à ouvert le pôle Forteresse Folâtre',
        ],
        [
            'Image' => 'BigSister.jpeg',
            'Name' => 'Grand Soeur',
            'Description' => 'La Grande Soeur Protège les petites Soeur.',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= count(self::BESTIARIES); $i++) {
            $bestiary = new Bestiary();
            $bestiary->setImage(self::BESTIARIES[rand(0, count(self::BESTIARIES) - 1)]['Image']);
            $bestiary->setName(self::BESTIARIES[rand(0, count(self::BESTIARIES) - 1)]['Name']);
            $bestiary->setDescription(self::BESTIARIES[rand(0, count(self::BESTIARIES) - 1)]['Description']);
            $bestiary->setCategory($this->getReference('category' . CategoryFixtures::CATEGORIES[rand(0, count(CategoryFixtures::CATEGORIES) - 1)]['Name']));
            $bestiary->setPlace($this->getReference('place' . PlaceFixtures::PLACES[rand(0, count(PlaceFixtures::PLACES) - 1)]['Name']));
            $manager->persist($bestiary);
        }


        // foreach (self::BESTIARIES as $bestiariesItems) {
        //     $bestiary = new Bestiary();
        //     $bestiary->setImage($bestiariesItems['Image']);
        //     $bestiary->setName($bestiariesItems['Name']);
        //     $bestiary->setDescription($bestiariesItems['Description']);
        //     $bestiary->setCategory($this->getReference('category' . CategoryFixtures::CATEGORIES[rand(0,count(CategoryFixtures::CATEGORIES))]['Name']));
        // }
        // $manager->persist($bestiary);

        // for ($i = 0; $i <= count(self::BESTIARIES); $i++) {
        //     $bestiary = new Bestiary();
        //     $bestiary->setImage('Image');
        //     $bestiary->setName('Name');
        //     $bestiary->setDescription('Description');
        //     $bestiary->setCategory($this->getReference('category' . CategoryFixtures::CATEGORIES));
        // }
        // $manager->persist($bestiary);

        // $bestiary = new Bestiary();
        // $bestiary->setImage('AndrewRyan.jpeg');
        // $bestiary->setName('Andrew Ryan');
        // $bestiary->setDescription('Andrew Ryan est l\'homme qui à crée Rapture.');
        // $bestiary->setCategory($this->getReference('category' . CategoryFixtures::Human ));
        // $manager->persist($bestiary);

        // $bestiary2 = new Bestiary();
        // $bestiary2->setImage('FrankFontaine.png');
        // $bestiary2->setName('Frank Fontaine');
        // $bestiary2->setDescription('Frank Fontaine est l\'homme qui à ouvert le pôle Fontaine Futuristicts');
        // $bestiary2->setCategory($this->getReference('category' . CategoryFixtures::Human ));
        // $manager->persist($bestiary2);

        // $bestiary3 = new Bestiary();
        // $bestiary3->setImage('SanderCohen.jpeg');
        // $bestiary3->setName('Sander Cohen');
        // $bestiary3->setDescription('Sander Cohen est l\'homme qui à ouvert le pôle Forteresse Folâtre');
        // $bestiary3->setCategory($this->getReference('category' . CategoryFixtures::Human ));
        // $manager->persist($bestiary3);

        // $bestiary5 = new Bestiary();
        // $bestiary5->setImage('BigSister.jpeg');
        // $bestiary5->setName('Grand Soeur');
        // $bestiary5->setDescription('La Grande Soeur Protège les petites Soeur.');
        // $bestiary5->setCategory($this->getReference('category' . CategoryFixtures::Protector ));
        // $manager->persist($bestiary5);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            PlaceFixtures::class,
        ];
    }
}
