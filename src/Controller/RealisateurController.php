<?php

namespace App\Controller;

use App\Repository\RealisateurRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class RealisateurController extends AbstractController
{
    /**
     * @Route("/realisateur", name="index_realisateur")
     *
     * @return void
     */
    public function indexRealisateur(RealisateurRepository $repo)
    {

        $realisateurList= $repo->findAll();

        return $this->render('realisateurs.html.twig', [
            'realisateurs' => $realisateurList,
            'titleFromController' => 'Liste realisateurs'
        ] ); 
    }
}