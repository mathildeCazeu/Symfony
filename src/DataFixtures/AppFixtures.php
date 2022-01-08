<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Création d'un générateur de données faker
        $faker = \Faker\Factory::create('fr_FR');  //Crée des données en fr

        /** ENTREPRISES **/
        $nbEntreprises = 10;

        for ($i=0; $i < $nbEntreprises ; $i++) 
        { 
            
            $mesEntreprises = new Entreprise();
            $mesEntreprises->setNom($faker->company);
            $mesEntreprises->setAdresse($faker->address);
            $mesEntreprises->setActivite($faker->realText($maxNbChar = 50, $indexSize = 2));
            $mesEntreprises->setSiteWeb($faker->url);

            $manager->persist($mesEntreprises);
        }


        /** FIN ENTREPRISES **/

        /** STAGES **/
            
        /** FIN STAGES **/

        /** FORMATIONS **/
        /*$DUT = new Formation();
        $DUT->setNomCourt("DUT info");
        $DUT->setNomLong($faker->realText($maxNbChars = 40, $indexSize = 2));
        $manager->persist($DUT);*/
        /** FIN FORMATIONS **/

        //Envoyer les données en bd
        $manager->flush();
    }
}

/*
           $mesEntreprises = new Entreprise();
            $mesEntreprises->setNom("UneEntreprise");
            $mesEntreprises->setAdresse("12 rue du choux");
            $mesEntreprises->setActivite("Développement");
            $mesEntreprises->setSiteWeb("siteweb.org");
*/