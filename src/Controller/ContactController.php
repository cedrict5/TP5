<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'contacts')]
    public function listeContact(ContactRepository $repo)
    {   
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',['lesContacts'=> $Contacts]);
    }
}
