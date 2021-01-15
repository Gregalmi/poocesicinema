<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Form\ActeurType;
use App\Repository\ActeurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ActeurOriginController extends AbstractController
{
    /**
     * @Route("/acteurorigin", name="index_acteurorigin")
     *
     * @return void
     */
    public function indexActeur(ActeurRepository $repo)
    {
        //$repo = $this->get(ActeurRepository::class); //avoir acces à ActeurRepository, maison peut le faire en le mettant en parametre, voir plus haut, seulement dansun controller

        $acteurList= $repo->findAll();

        return $this->render('acteurs.html.twig', [
            'acteurs' => $acteurList,
            'titleFromController' => 'Liste Acteurs'
        ] ); //nom de la vue pour le premier param, le deuxieme est un tb de param.
    }

    /**
     * @Route("/acteurorigin/createorigin", name="create_acteurorigin")
     *
     * @return Response
     */
    public function createActeur(Request $request)
    {
        $acteur = new Acteur();
        $form = $this->createForm(ActeurType::class, $acteur);

        $form->handleRequest($request); //hydrate automatiquement le formulaire avec la class

        if($form->isSubmitted() && $form->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($acteur);
            $em->flush();

            return $this->redirectToRoute('index_acteur');
        }

        return $this->render('acteur_form.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
