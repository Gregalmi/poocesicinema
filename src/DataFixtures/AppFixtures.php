<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Acteur;
use App\Entity\Film;
use App\Entity\Realisateur;
use App\Entity\Salle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        for ($i=0; $i < 20; $i++) { 
            $acteur = new Acteur();
            $acteur
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
            ;
            $manager->persist($acteur);

            $realisateur = new Realisateur();
            $realisateur
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
            ;
            $manager->persist($realisateur);

            $film = new Film();
            $film
                ->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true)) //sentence($nbWords = 6, $variableNbWords = true)realText($maxNbChars = 100, $indexSize = 2)
                ->setDuree($faker->biasedNumberBetween($min = 80, $max = 240, $function = 'sqrt'))
            ;
            $manager->persist($film);

            $salle = new Salle();
            $salle
                ->setNom($faker->sentence($nbWords = 2, $variableNbWords = true))
            ;
            $manager->persist($salle);
        }
        
        $manager->flush();
    }
}
