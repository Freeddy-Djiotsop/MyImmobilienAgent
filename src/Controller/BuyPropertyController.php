<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyPropertyController extends AbstractController
{
    #[Route('/buy', name: 'buy.index')]
    public function index(): Response
    {
        return $this->render('buy_property/index.html.twig', [
            'kaufen' => 'active',
            'controller_name' => 'BuyPropertyController',
        ]);
    }
}
