<?php

namespace App\Controller;

use App\Entity\Marcas;
use App\Entity\Tipos;
use App\Entity\Vehiculos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculosController extends AbstractController
{
/**
     * @Route("/categoria/coches", name="pagina_coches")
     */
    public function inicio_coches(ManagerRegistry $doctrine): Response{
  
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "1"]);

        return $this->render('autos/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
        ]);
    }

    /**
     * @Route("/categoria/motos", name="pagina_motos")
     */
    public function inicio_motos(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "2"]);

        return $this->render('motos/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
        ]);
    }

        /**
     * @Route("/categoria/otros", name="pagina_otros")
     */
    public function inicio_otros(ManagerRegistry $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "3"]);

        return $this->render('otros/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
        ]);
    }

      /**
 * @Route("/categoria/{codigo<\d+>?1}", name="ficha_vehiculo")
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
 * @Route("/categoria/buscar/{texto}", name="buscar_vehiculo")
 */

public function buscar(ManagerRegistry $doctrine, $texto): Response
{
    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculos =  $repositorio->findByName($texto);

    return $this->render("lista_autos.html.twig", ['vehiculos' => $vehiculos]);
}

/**
 * @Route("/categoria/añadir/{tipo}/{marca}/{nombre}/{pieza}", name="añadir_vehiculo")
 */

public function addVehiculo(ManagerRegistry $doctrine, $tipo, $marca, $nombre, $pieza): Response
{
    $entityManager = $doctrine->getManager();

    $repositorio = $doctrine->getRepository(Tipos::class);

    $tipo =  $repositorio->find($tipo);

    $repositorio2 = $doctrine->getRepository(Marcas::class);

    $marca =  $repositorio2->find($marca);

    $vehiculo = new Vehiculos();

    $vehiculo->setTipos($tipo);
    
    $vehiculo->setMarca($marca);

    $vehiculo->setNombre($nombre);

    $vehiculo->addPieza($pieza);
    
    $entityManager->persist($vehiculo);    

    try{
        $entityManager->flush();
        return new Response("Vehiculo añadido correctamente!");
    }catch(\Exception $e){
        throw new \Exception ($e->getMessage(), "\n");
    }
}
}
