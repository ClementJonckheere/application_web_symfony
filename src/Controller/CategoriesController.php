<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Recettes;
use App\Repository\RecettesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories')]
class CategoriesController extends AbstractController
{
    #[Route('/', name: 'app_categories_index')]
    public function index(): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }

    #[Route('/{id}', name: 'app_categories_show')]
    public function show(Categories $categories): Response
    {
        return $this->render('categories/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/delete/{id}', name: 'app_categories_delete')]
    public function delete(RecettesRepository $recettesRepository, Recettes $recettes): Response
    {
        $recettesRepository->remove($recettes, true);
        return $this->redirectToRoute('app_home');
    }
}
