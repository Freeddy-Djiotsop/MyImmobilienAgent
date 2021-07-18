<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetallController extends AbstractController
{
    #[Route('/getall', name: 'getall.index')]
    public function index(PropertyRepository $repository): Response
    {
        return $this->render('getall/index.html.twig', [
            'all' => 'active',
            'properties' => $repository->findAll(),
        ]);
    }
}
