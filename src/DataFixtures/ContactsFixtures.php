<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker=Factory::create("fr_FR");
        $genres=["male","female"];
        $contact = new Contact();
        $contact->setNom($faker->lastName());
                 ->setPrenom($faker-firstname(0,1))
        $manager->flush();
    }
}
