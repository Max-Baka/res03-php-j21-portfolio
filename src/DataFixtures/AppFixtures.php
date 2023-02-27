<?php

namespace App\DataFixtures;
use App\Entity\Project1;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $cookie = new Project1();
        $cookie->setName('test');
        $cookie->setFirsttechno('test');
        $cookie->setSecondtechno('test');
        $cookie->setDescription('test');
        

        $manager->persist($cookie);
        $manager->flush();
    }
}
