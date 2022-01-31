<?php

namespace App\Controller;

use App\Entity\Mensaje;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\MensajeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    /**
     * @Route("/contacto", name="contacto")
     */
    public function index(): Response
    {
        return $this->render('contacto/contact.html.twig', [
            'controller_name' => 'ContactoController',
        ]);
    }

    /*
    public function enviarMensaje(Request $request)
    {
        $mensaje = new Mensaje();
        $form = $this->createForm(MensajeType::class, $mensaje);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mensaje);
            $entityManager->flush();

            return $this->redirectToRoute('contacto/contact.html.twig');
        }

        return $this->render(
            'contacto/contact.html.twig',
            array('form' => $form)
        );
        
    }
    */

}
