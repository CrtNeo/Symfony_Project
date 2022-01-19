<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    /**
     * @Route("/categoria/{codigo}", name="ficha_categoria")
     */
    public function index($codigo): Response
    {
        return new Response("Datos de intercambio del vehiculo: $codigo");
    }
}
