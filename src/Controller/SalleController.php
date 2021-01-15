<?php

namespace App\Controller;

use App\Repository\SalleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleController extends AbstractController
{
    /**
     * @Route("/salle", name="index_salle")
     *
     * @return void
     */
    public function indexSalle(SalleRepository $repo)
    {

        $salleList= $repo->findAll();

        return $this->render('salles.html.twig', [
            'salles' => $salleList,
            'titleFromController' => 'Liste salles'
        ] ); 
    }
}