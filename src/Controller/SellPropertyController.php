<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SellPropertyController extends AbstractController
{
    #[Route('/sell', name: 'sell.index')]
    public function index(PropertyRepository $repository): Response
    {
        $properties = $repository->getUnsold();
        
        if (!$properties) 
        {
            return $this->render('property/index.html.twig', [
                'verkaufen' => 'active',
                'title' => 'verkaufen',
                'beschreibung' => 'Alle Wohnungen wurden schon Verkauft',
            ]);
        }

        return $this->render('sell_property/index.html.twig', [
            'verkaufen' => 'active',
            'title' => 'verkaufen',
            'title2' => 'Sie können jetzt verkaufen',
            'properties' => $properties,
        ]);
    }

    #[Route('/sell/{slug}/{id}', name: 'sell.sell')]
    public function sell(PropertyRepository $repository, $slug, $id): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $property = $repository->find($id);
        
        if(!$property || $property->getSlug()!==$slug)
        {
            echo '<script>alert("Error")</script>';
            return $this->redirectToRoute('home');
        }

        $property->setSold(true);
        

        $manager->flush();

        return $this->render('sell_property/showsell.html.twig', [
            'date' => date("d/m/Y"),
            'hour' => date("H:i"),
            'property' => $property,
        ]);

    }
}
