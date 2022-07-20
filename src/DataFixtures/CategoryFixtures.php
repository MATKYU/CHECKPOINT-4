<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public const Human = 'Humains';
    public const Chrosomes = 'Chrosômes';
    public const Protector = 'Protecteurs';
    public const Divers = 'Divers';

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName(self::Human);
        $this->addReference('category' . self::Human, $category);
        $manager->persist($category);

        $category2 = new Category();
        $category2->setName(self::Chrosomes);
        $this->addReference('category' . self::Chrosomes, $category);
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName(self::Protector);
        $this->addReference('category' . self::Protector, $category);
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName(self::Divers);
        $this->addReference('category' . self::Divers, $category);
        $manager->persist($category4);
        
        $manager->flush();
    }
}
