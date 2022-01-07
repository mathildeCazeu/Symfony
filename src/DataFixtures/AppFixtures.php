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

        for ($i=0; $i <= $nbEntreprises; $i++) 
        { 
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setAdresse($faker->address);
            $entreprise->setActivite($faker->realText($maxNbChars = 50, $indexSize = 2));
            $entreprise->setSiteWeb($faker->url);

            $tabEntreprises[] = $entreprise;
            $manager->persist($entreprise);
        }

        /** FIN ENTREPRISES **/

        /** STAGES **/
            
        /** FIN STAGES **/

        /** FORMATIONS **/
        $DUT = new Formation();
        $DUT->setNomCourt("DUT info");
      //$DUT->setNomLong($faker->realText($maxNbChars = 40, $indexSize = 2));
        $manager->persist($DUT);
        /** FIN FORMATIONS **/

        //Envoyer les données en bd
        $manager->flush();
    }
}
