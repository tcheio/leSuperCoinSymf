<?php

namespace App\Controller;

use App\Entity\Annonce;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ManagerRegistry $orm): Response
    {
        
        $res = $orm->getRepository(Annonce::class)->findAll();

        return $this->render('accueil/index.html.twig', [
            'annonces' => $res,
            'controller_name' => 'AccueilController',
        ]);
    }
}
