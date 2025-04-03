<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager):void 
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker=Factory::create("fr_FR");

        $categories=[];
        $categorie = new Categorie();
        $categorie  ->setLibelle("Professionnel")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categories/professionnel.jpg");
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie  ->setLibelle("Sports")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categories/sport.jpg");
        $manager->persist($categorie);
        $categories[] = $categorie;
        $categorie = new Categorie();
        $categorie  ->setLibelle("Privé")
                    ->setDescription($faker->sentence(50))
                    ->setImage("images/categories/prive.png");
        $manager->persist($categorie);
        $categories[] = $categorie;
        

        $genres=["male","female"];


        
        for($i=0;$i<100; $i++){
            $sexe=mt_rand(0,1);
            if($sexe==0){
                $type="men";
            }else{
                $type="women";
            }
            $contact = new Contact();
            $contact->setNom($faker->lastName())
                        ->setPrenom($faker->firstname($genres[$sexe]))
                        ->setRue($faker->streetAddress())
                        ->setCp($faker->numberBetween(75000,92000))
                        ->setVille($faker->city())
                        ->setSexe($sexe)
                        ->setMail($faker->email())
                        ->setCategorie($categories[mt_rand(0,2)])
                        ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
            $manager->persist($contact);
        }
        $manager->flush();

    }
}
