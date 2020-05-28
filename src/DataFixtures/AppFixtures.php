<?php

namespace App\DataFixtures;

use App\Entity\Epiavion;
use App\Entity\Epipassager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
           $epiavion = new Epiavion();
        $epiavion->setName('savila');
        $epiavion->setPdepart('tunis');
        $epiavion->setParrivee('sfax');
        $epiavion->setHorairedepart(new \DateTime());
        $epiavion->setHorairearrive(new \DateTime());
        $epiavion->setPrix("15.5");

    
/*
        $manager->persist($epiavion);
                    $manager->flush();
                        $epipassager = new Epipassager();
        $epipassager->setName('ahmed');
        $epipassager->setCin('125155');
        $epipassager->setAge('25');
        $epipassager->setClasse('2');
        $epipassager->setPayee('Dinar TD');
        $epipassager->setEmail("ahmed@gmail.com");

        $manager->persist($epipassager);*/
                    $manager->flush();
    }
}
