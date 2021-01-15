<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends AbstractController
{
    /**
     * @Route("/film", name="index_film")
     *
     * @return void
     */
    public function indexFilm(FilmRepository $repo)
    {

        $filmList= $repo->findAll();

        return $this->render('films.html.twig', [
            'films' => $filmList,
            'titleFromController' => 'Liste films'
        ] ); 
    }
}
