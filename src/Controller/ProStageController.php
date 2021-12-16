<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage_accueil")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    /**
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function entreprises(): Response
    {
        return $this->render('pro_stage/entreprises.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function formations(): Response
    {
        return $this->render('pro_stage/formations.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="pro_stage_stages")
     */
    public function stages($id): Response
    {
        return $this->render('pro_stage/stages.html.twig',
        ['controller_name' => 'ProStageController' , 'idStage' => $id]);
    }

    /**
     * @Route("/ressources/{id}", name="pro_stage_ressources12")
     */
    public function afficherRessources($id)
    {
        return $this->render('pro_stage/affichageRessources.html.twig',
        ['idRessource' => $id]);
    }

}
