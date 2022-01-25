<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OtrosController extends AbstractController
{

    private $otros = [

        "Barco" => ["modelo" => "Barco Moody Decksaloon 41", "id" => "62542356", "piezas" => ["Aireadores", "Polea","Ancla"]],
    
        "Tren" => ["modelo" => "Tren S-106", "id" => "2634267", "piezas" => ["Pantógrafo", "Caja de humo"]],
    
        "Camion" => ["modelo" => "Volvo Gama FH", "id" => "5679567", "piezas" =>  ["Amortiguador de gas"]]
    ];

    /**
     * @Route("/categoria/otros", name="otros")
     */
    public function index(): Response
    {
        return $this->render('otros/index.html.twig', [
            'controller_name' => 'OtrosController',
            'otros' => $this->otros
        ]);
    }
}
