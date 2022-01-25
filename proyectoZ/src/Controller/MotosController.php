<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotosController extends AbstractController
{

    private $motos = [

        "Aprilia" => ["modelo" => "RS", "id" => "524142432", "piezas" => ["Motor", "Bujía de encendido","Cadenas"]],
    
        "Honda" => ["modelo" => "CBR", "id" => "88958448", "piezas" => ["Filtro de aire", "Suspensión"]],
    
        "Yamaha" => ["modelo" => "R1", "id" => "28908267", "piezas" =>  ["Lámpara de faro"]]
    ];

    /**
     * @Route("/categoria/motos", name="motos")
     */
    public function index(): Response
    {
        return $this->render('motos/index.html.twig', [
            'controller_name' => 'MotosController',
            'motos' => $this->motos
        ]);
    }
}
