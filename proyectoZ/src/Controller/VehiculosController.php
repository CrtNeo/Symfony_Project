<?php

namespace App\Controller;

use App\Entity\Vehiculos;
use App\Entity\Marcas;
use App\Entity\Tipos;
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
public function ficha(ManagerRegistry $doctrine, $codigo, Request $request, EntityManagerInterface $entityManager): Response
{

    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculo =  $repositorio->find($codigo);

    $vehiculo = new Vehiculos();
    $form = $this->createForm(addVehicleType::class, $vehiculo);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
 
            $entityManager->persist($vehiculo);
            $entityManager->flush();

        return $this->redirectToRoute('pagina_otros');
    }

    return $this->render('vehiculos.html.twig', [

        'vehiculo' => $vehiculo,
        'addVehicle' => $form->createView()


    ]);
}

/**
 * @Route("/categoria/buscar/{texto}", name="buscar_vehiculo")
 */

public function buscar(ManagerRegistry $doctrine, $texto,Request $request, EntityManagerInterface $entityManager): Response
{
    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculos =  $repositorio->findByName($texto);

    $vehiculo = new Vehiculos();
    $form = $this->createForm(addVehicleType::class, $vehiculo);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
 
            $entityManager->persist($vehiculo);
            $entityManager->flush();

        return $this->redirectToRoute('pagina_otros');
    }

    return $this->render("lista_autos.html.twig", ['vehiculos' => $vehiculos, 'addVehicle' => $form->createView()]);
}

      /**
 * @Route("/vehiculo/borrar/{nombre}/{id}", name="ficha_vehiculo")
 */
public function borrarCoche(ManagerRegistry $doctrine, $id): Response
{

    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculo =  $repositorio->find($id);

    $entityManager = $doctrine->getManager();
    $piezas = $vehiculo->getPiezas();
    foreach ($piezas as $pieza){
        $entityManager->remove($pieza);
    }
    //$vehiculo->piezas->delete();
    $entityManager->remove($vehiculo);
    $entityManager->flush();
    
    return $this->redirectToRoute('pagina_coches');
}

      /**
 * @Route("/vehiculo/borrar/{nombre}/{id}", name="ficha_vehiculo")
 */
public function borrarMoto(ManagerRegistry $doctrine, $id): Response
{

    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculo =  $repositorio->find($id);

    $entityManager = $doctrine->getManager();
    $piezas = $vehiculo->getPiezas();
    foreach ($piezas as $pieza){
        $entityManager->remove($pieza);
    }
    //$vehiculo->piezas->delete();
    $entityManager->remove($vehiculo);
    $entityManager->flush();
    
    return $this->redirectToRoute('pagina_motos');
}

      /**
 * @Route("/vehiculo/borrar/{nombre}/{id}", name="ficha_vehiculo")
 */
public function borrarOtro(ManagerRegistry $doctrine, $id): Response
{

    $repositorio = $doctrine->getRepository(Vehiculos::class);

    $vehiculo =  $repositorio->find($id);

    $entityManager = $doctrine->getManager();
    $piezas = $vehiculo->getPiezas();
    foreach ($piezas as $pieza){
        $entityManager->remove($pieza);
    }
    //$vehiculo->piezas->delete();
    $entityManager->remove($vehiculo);
    $entityManager->flush();
    
    return $this->redirectToRoute('pagina_otros');
}


}   
