<?php

namespace App\Controller;

use App\Entity\Annonce;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'app_annonce')]
    public function index(): Response
    {

        
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }

    #[Route('/annonce/{id}', name: 'app_annonce_show')]
    public function show(ManagerRegistry $orm, $id){
        
        $res = $orm->getRepository(Annonce::class)->find($id);
        return $this->render('annonce/show.html.twig', [
            'produit' => $res,
        ]);

    }
}
