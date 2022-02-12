<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;



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
     * @var Security
     */

    private $security;


    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    public function privatePage() 
    {
        $user = $this->security->getUser();    
    }
}
