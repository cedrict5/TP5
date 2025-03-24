<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'accueil')]
    public function index(): Response
    {
        $noms=["Cédric","Jovan","Vladilen","Axel"];
        $age=17;
        return $this->render('accueil/index.html.twig',[
            'lesNoms' => $noms,
            'age' => $age
        ]);
    }

}