<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetsoldController extends AbstractController
{
    #[Route('/getsold', name: 'getsold.index')]
    public function index(PropertyRepository $repository): Response
    {
        $properties = $repository->getSold();
        
        if(!$properties)
        {
            return $this->render('property/index.html.twig', [
                'sold' => 'active',
                'title' => 'sold',
                'beschreibung' => 'Wir haben noch keine Wohnung Verkauft',
            ]);
        }

        return $this->render('sell_property/index.html.twig', [
            'title' => 'sold',
            'title2' => 'Wir haben diese Wohnungen schon verkauft',
            'sold' => 'active',
            'properties' => $properties,
        ]);
    }
}
