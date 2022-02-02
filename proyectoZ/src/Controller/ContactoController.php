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
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $mensaje = new Mensaje();
        $form = $this->createForm(MensajeType::class, $mensaje);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $doctrine->getManager();
            $entityManager->persist($mensaje);
            $entityManager->flush();

            return $this->redirectToRoute('contacto');
        }
        return $this->render(
            'contacto/contact.html.twig',
            ['form' => $form->createView()]
        );
    }
}
