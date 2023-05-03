<?php

namespace App\Controller;

use App\Entity\Recettes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/details')]
class DetailsController extends AbstractController
{
    #[Route('/', name: 'app_details_index')]
    public function index(): Response
    {
        return $this->render('details/index.html.twig', [
        ]);
    }

    #[Route('/{id}', name: 'app_details_show')]
    public function show(Recettes $recettes): Response
    {
        return $this->render('details/index.html.twig', [
            'recettes' => $recettes
        ]);
    }
}
