<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'categories',methods:['GET'])]
    public function listeCategories(CategorieRepository $repo)
    {
        $categories= $repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $categories
        ]);
    }

    #[Route('/categories/{$id}', name: 'ficheCategorie',methods:['GET'])]
    public function lafficheCategories(CategorieRepository $repo)
    {
        $categories= $repo->findAll();
        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie' => $categories
        ]);
    }
}