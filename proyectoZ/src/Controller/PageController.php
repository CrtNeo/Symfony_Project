<?php

namespace App\Controller;

use App\Entity\Marcas;
use App\Entity\Piezas;
use App\Entity\Vehiculos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    

    /**
     * @Route("/", name="inicio")
     */
    public function inicio(): Response{
        
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
 * @Route("/categoria/{codigo<\d+>?1}", name="autos")
 */
public function ficha(ManagerRegistry $doctrine, $codigo): Response
{

    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculo =  $repositorio->find($codigo);

    return $this->render('vehiculos.html.twig', [

        'vehiculo' => $vehiculo

    ]);
}

/**
 * @Route("/categoria/buscar/{texto}", name="buscar_auto")
 */

public function buscar(ManagerRegistry $doctrine, $texto): Response
{
    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculos =  $repositorio->findByName($texto);

    return $this->render("lista_autos.html.twig", ['vehiculos' => $vehiculos]);
}
}
