<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowDataController extends AbstractController
{
    /**
     * @Route("/show/data", name="show_data")
     */
    public function index()
    {
        return $this->render('show_data/index.html.twig', [
            'controller_name' => 'ShowDataController',
        ]);
    }
}
