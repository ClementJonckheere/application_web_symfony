<?php

namespace App\Controller;

use App\Entity\Recettes;
use App\Form\RecettesType;
use App\Repository\RecettesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, RecettesRepository $recettesRepository): Response
    {
        $recette = new Recettes();
        $form = $this->createForm(RecettesType::class, $recette);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $recettesRepository->save($recette, true);
            $this->addFlash('succes', 'Recette enregistré !');
        }
        

        return $this->render('home/index.html.twig', [
            'form'=> $form
        ]);
    }

    
    #[Route('/edit/{id}', name: 'app_edit')]
    public function edit(Request $request,Recettes $recettes, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(RecettesType::class, $recettes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $recettes = $form->getData();
            $em->persist($recettes);
            $em->flush();
            $this->addFlash('succes', 'Recette modifié !');
        }
        

        return $this->render('home/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
