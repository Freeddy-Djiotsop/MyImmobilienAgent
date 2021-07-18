<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetunsoldController extends AbstractController
{
    #[Route('/getunsold', name: 'getunsold.index')]
    public function index(PropertyRepository $repository): Response
    {
        $properties = $repository->getUnsold();

        if(!$properties)
        {
            return $this->render('property/index.html.twig', [
                'unsold' => 'active',
                'title' => 'unsold',
                'beschreibung' => 'Alle Wohnungen wurden schon Verkauft',
            ]);
        }

        return $this->render('getall/index.html.twig', [
            'title' => 'unsold',
            'title2' => 'Ungekaufte Immobilien',
            'unsold' => 'active',
            'properties' => $properties,
        ]);
    }
}
