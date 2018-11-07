<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\StockAnalysisType;
use Symfony\Component\HttpFoundation\Request;
use App\Researcher\DataResearcher;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class StockAnalysisController extends AbstractController
{
    /**
     * @Route("/stock/analysis", name="stock_analysis")
     */
    public function index(Request $request, SessionInterface $session)
    {

        $form = $this->createForm(StockAnalysisType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $dataresearcher = new DataResearcher($formData['stock_name'], $formData['analysis_type']);
            $final_url = $dataresearcher->generateQuery();
            $result = $dataresearcher->getRequest($final_url);
            $session->set("result", $result);
            // dump($session->get('result'));
            return $this->redirectToRoute('show_data');
        }

        return $this->render('stock_analysis/index.html.twig', [
            'stock_analysis_form' => $form->createView(),
        ]);
    }
}
