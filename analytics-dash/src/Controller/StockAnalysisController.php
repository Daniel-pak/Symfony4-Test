<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\StockAnalysisType;
use Symfony\Component\HttpFoundation\Request;
use App\Researcher\DataResearcher;


class StockAnalysisController extends AbstractController
{
    /**
     * @Route("/stock/analysis", name="stock_analysis")
     */
    public function index(Request $request)
    {

        $form = $this->createForm(StockAnalysisType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $this->addFlash('warning', 'submitted!');
            $formData = $form->getData();
            // dump($formData);
            $dataresearcher = new DataResearcher($formData['stock_name'], $formData['analysis_type']);
            // dump($dataresearcher->generateQuery());
            $final_url = $dataresearcher->generateQuery();
            $dataresearcher->getRequest($final_url);
        }

        return $this->render('stock_analysis/index.html.twig', [
            'stock_analysis_form' => $form->createView(),
        ]);
    }
}
