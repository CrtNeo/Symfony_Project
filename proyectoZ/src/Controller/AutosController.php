<?php

namespace App\Controller;

use App\Entity\Piezas;
use App\Entity\Vehiculos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutosController extends AbstractController
{
/**
     * @Route("/categoria/coches", name="pagina_coches")
     */
    public function inicio(ManagerRegistry $doctrine): Response{
  
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "1"]);

        /*
        $repositorio2 = $doctrine->getRepository(Piezas::class);

        $piezas =  $repositorio2->findAll();
        */

        return $this->render('autos/index.html.twig', [
            'controller_name' => 'AutosController',
            'vehiculos' => $vehiculos,
 
        ]);
    }

}
