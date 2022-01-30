<?php

namespace App\Controller;

use App\Entity\Piezas;
use App\Entity\Vehiculos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OtrosController extends AbstractController
{
    /**
     * @Route("/categoria/otros", name="otros")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "3"]);

        return $this->render('otros/index.html.twig', [
            'controller_name' => 'OtrosController',
            'vehiculos' => $vehiculos
        ]);
    }
}
