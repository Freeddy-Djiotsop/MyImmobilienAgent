<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;

class GetpropertyController extends AbstractController
{
    #[Route('/getproperty', name: 'getproperty.index')]
    public function index(PropertyRepository $repository): Response
    {
        $property = $repository->find(Faker\Factory::create()->numberBetween(1,50));
        
        if(!$property) return $this->redirectToRoute('home');

        return $this->render('getproperty/index.html.twig', [
            'one' => 'active',
            'property' =>  $property,
        ]);
    }
}
