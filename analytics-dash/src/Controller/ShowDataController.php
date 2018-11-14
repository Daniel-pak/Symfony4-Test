<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ShowDataController extends AbstractController
{
    /**
     * @Route("/show/data", name="show_data")
     */
    public function index(SessionInterface $session)
    {
        return $this->render('show_data/index.html.twig', [
            'controller_name' => 'ShowDataController',
            'name' => $session->get('result')
        ]);
    }
}
