<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route('/categories/{id<\d+>}', name: 'ficheCategorie',methods:['GET'])]
    public function lafficheCategories(Categorie $categorie)
    {
        return $this->render('categorie/ficheCategorie.html.twig', [
            'laCategorie' => $categorie
        ]);
    }

    #[Route('/categories/nbContactsParCat', name: 'nbContactsParCat',methods:['GET'])]
    public function nbContactsParCat(CategorieRepository $repo)
    {
        $categories= $repo->nbContactsParCat();
        return $this->render('categorie/nbContactsParCat.html.twig', [
            'lesCategories' => $categories
        ]);
    }
}