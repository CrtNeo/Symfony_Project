<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    private $autos = [

        "Opel" => ["modelo" => "Corsa", "id" => "524142432", "piezas" => ["Frenos", "Suspensión","Carroceria"]],

        "Renault" => ["modelo" => "Megane", "id" => "88958448", "piezas" => ["Motor", "Filtros"]],

        "Peugeot" => ["modelo" => "308", "id" => "28908267", "piezas" =>  ["Sistema Eléctrico"]]
    ];

    /**
     * @Route("/categoria/{codigo}", name="autos")
     */
    public function ficha($codigo): Response
    {

        //Si no existe el elemento con dicha clave devolvemos null

        $resultado = ($this->autos[$codigo] ?? null);

        return $this->render('autos.html.twig', [

            'auto' => $resultado

        ]);
    }

    /**
     * @Route("/categoria/buscar/{texto}", name="buscar_categoria")
     */

    public function buscar($texto): Response
    {

        $resultados = array_filter($this->autos,
            function ($auto) use ($texto) {
                return strpos($auto["modelo"], $texto) !== FALSE;
            }
        );

        return $this->render("lista_.html.twig", ['autos' => $resultados]);
    }
}
