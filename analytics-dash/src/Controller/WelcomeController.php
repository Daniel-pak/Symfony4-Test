<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    #routing annotation
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    #routing annotation to welcome page
    /**
     * @Route("/welcome_home", name="welcome_home")
     */
    public function welcome() {
        return $this->render('welcome_home.html.twig');
    }

    // /**
    //  * @Route("/base_api", name="baseapi")
    //  */
    // public function base_api() {
    //   return $this->render('baseapi/base_api.html.twig');
    // }
}
