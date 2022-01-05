<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $DUTinformatique = new Formation();
        $DUTinformatique->setNomCourt("DUT info");
        $DUTinformatique->setNomLong("Diplome Universitaire Techno informatique");
        $manager->persist($DUTinformatique);

        $manager->flush();
    }
}
