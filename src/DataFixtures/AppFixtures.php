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
        $nbStages = 10;

        $stage = new Stage();
        $stage->setTitre("Un stage de développement");
        $stage->setMission("Une mission au pif lalalalalala");
        $stage->setEmail("unemail@mail.com");

        $indiceFormation = $faker->numberBetween($min = 0, $max = 7);
        $indiceEntreprise = $faker->numberBetween($min = 0, $max = 10);

        $stage->setEntreprise($indiceEntreprise);
        $stage->addFormation();
        
            
        /** FIN STAGES **/

        /** FORMATIONS **/
        //Pas de génération auto pour avoir des formations précises

        $dutInfo = new Formation();
        $dutInfo->setNomCourt("DUT Info");
        $dutInfo->setNomLong("DUT informatique");

        $dutGIM = new Formation();
        $dutGIM->setNomCourt("DUT GIM");
        $dutGIM->setNomLong("DUT Génie Industriel et Maintenance");

        $dutInfCom = new Formation();
        $dutInfCom->setNomCourt("DUT Info-Comm");
        $dutInfCom->setNomLong("DUT Information - Communication");

        $dutTC = new Formation();
        $dutTC->setNomCourt("DUT TC");
        $dutTC->setNomLong("DUT Techniques de commercialisation");

        $dutGEA = new Formation();
        $dutGEA->setNomCourt("DUT GEA");
        $dutGEA->setNomLong("DUT Gestion des Entreprises et des Administrations");

        $lpNum = new Formation();
        $lpNum->setNomCourt("LP NUM");
        $lpNum->setNomLong("Licence Professionnelle Métiers du Numérique");

        $lpProg = new Formation();
        $lpProg->setNomCourt("LP Prog-AV");
        $lpProg->setNomLong("Licence Professionnelle Programmation Avancée");

        $tabFormation = array($dutInfo, $dutGIM, $dutInfCom, 
                              $dutTC, $dutGEA, $lpNum, $lpProg);

        foreach($tabFormation as $formations)
        {
            $manager->persist($formations);
        }

        /** FIN FORMATIONS **/



        //Envoyer les données en bd
        $manager->flush();
    }
}