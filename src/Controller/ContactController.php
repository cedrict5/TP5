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
    #[Route('/contacts', name: 'contacts', methods: ['GET'])]
    public function listeContacts(ContactRepository $repo)
    {   
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',['lesContacts'=> $Contacts]);
    }

    #[Route('/contact/{id}', name: 'ficheContact', methods: ['GET'])]
    public function ficheContact(Contact $contact)
    {   
        
        return $this->render('contact/ficheContact.html.twig',['leContact'=> $contact]);
    }
}
