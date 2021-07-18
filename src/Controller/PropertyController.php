<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

    #[Route('/property/{slug}/{id}', name: 'property.index')]
    public function index(PropertyRepository $repository, string $slug, int $id): Response
    {
        $pro = $repository->find($id);
        if(!$pro || $pro->getSlug()!==$slug)
        {
            echo '<script>alert("Error")</script>';
            return $this->redirectToRoute('home.index');
        }
        return $this->render('getproperty/index.html.twig', [
            'current_menu_item' => 'active',
            'property' =>  $pro,
        ]);
    }

    #[Route('/property/allesverkaufen', name: 'property.allesverkaufen')]
    public function allesverkaufen(PropertyRepository $repository): Response
    {
        $this->getDoctrine()->getManager()->flush($repository->allesverkaufen());
        return $this->redirectToRoute('home.index');
    }

    #[Route('/property/zuruecksetzen', name: 'property.zuruecksetzen')]
    public function zuruecksetzen(PropertyRepository $repository): Response
    {
        $this->getDoctrine()->getManager()->flush($repository->zuruecksetzen());
        return $this->redirectToRoute('home.index');
    }

}
