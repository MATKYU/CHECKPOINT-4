<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Humains');
        $manager->persist($category);

        $category2 = new Category();
        $category2->setName('Chrosômes');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName('Protecteurs');
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName('Divers');
        $manager->persist($category4);

        $manager->flush();
    }
}
