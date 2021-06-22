<?php

namespace App\Controller;

use App\Entity\Customer\Categorie;
use App\Entity\Main\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {

        $chien = new Animal();
        $chien->setName('titi');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager = $this->getDoctrine()->getManager('default');
        //$entityManager = $this->get('doctrine.orm.default_entity_manager');
        $entityManager->persist($chien);
        $entityManager->flush();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home/categorie", name="home_cat")
     */
    public function  index2(){
        //dd('titi');
        $cat =new Categorie();
        $cat->setName('politik');

        $customerEntityManager = $this->getDoctrine()->getManager('customer');
        $customerEntityManager->persist($cat);
        $customerEntityManager->flush();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);

    }
}
