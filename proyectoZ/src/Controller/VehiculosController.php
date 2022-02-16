<?php

namespace App\Controller;

use App\Entity\Vehiculos;
use App\Entity\Marcas;
use App\Form\addVehicleType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class VehiculosController extends AbstractController
{
/**
     * @Route("/categoria/coches", name="pagina_coches")
     */
    public function inicio_coches(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response{
  
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "1"]);

        $vehiculo = new Vehiculos();
        $form = $this->createForm(addVehicleType::class, $vehiculo);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
     
                $entityManager->persist($vehiculo);
                $entityManager->flush();
            
            return $this->redirectToRoute('pagina_coches');
        }

        return $this->render('autos/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
            'addVehicle' => $form->createView()
        ]);

    }


    /**
     * @Route("/categoria/motos", name="pagina_motos")
     */
    public function inicio_motos(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "2"]);

        $vehiculo = new Vehiculos();
        $form = $this->createForm(addVehicleType::class, $vehiculo);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
     
                $entityManager->persist($vehiculo);
                $entityManager->flush();

            return $this->redirectToRoute('pagina_motos');
        }

        return $this->render('motos/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
            'addVehicle' => $form->createView()
        ]);
    }

        /**
     * @Route("/categoria/otros", name="pagina_otros")
     */
    public function inicio_otros(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {
        $repositorio = $doctrine->getRepository(Vehiculos::class);

        $vehiculos =  $repositorio->findBy(["tipos" => "3"]);

        $vehiculo = new Vehiculos();
        $form = $this->createForm(addVehicleType::class, $vehiculo);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
     
                $entityManager->persist($vehiculo);
                $entityManager->flush();

            return $this->redirectToRoute('pagina_otros');
        }

        return $this->render('otros/index.html.twig', [
            'controller_name' => 'VehiculosController',
            'vehiculos' => $vehiculos,
            'addVehicle' => $form->createView()
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


}   
