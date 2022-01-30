<?php

namespace App\Controller;

use App\Entity\Piezas;
use App\Entity\Vehiculos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotosController extends AbstractController
{
    /**
     * @Route("/categoria/motos", name="motos")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "2"]);

        return $this->render('motos/index.html.twig', [
            'controller_name' => 'MotosController',
            'vehiculos' => $vehiculos
        ]);
    }
}
