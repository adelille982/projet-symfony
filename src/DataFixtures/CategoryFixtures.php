<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $travels = new Category();
        $travels->setName('Voyages');
        $manager->persist($travels);

        $donkeys = new Category();
        $donkeys->setName('Avec des anes modifié');
        $donkeys->setParent($travels);
        $manager->persist($donkeys);

        $toys = new Category();
        $toys->setName('Jouets');
        $manager->persist($toys);
        $this->addReference('TOYS', $toys);

        $manager->flush();
    }
}
