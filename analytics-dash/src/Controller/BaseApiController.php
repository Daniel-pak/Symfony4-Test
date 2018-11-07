<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Scraper\WebScraper;

class BaseApiController extends AbstractController
{
    /**
     *
     * @Route("/base/api/{name}", name="base_api")
     */
    public function index($name = "finviz")
    {

        $webscraper = new WebScraper($name);
        // $webscraper::setUrl($name);
        $webscraper::scrapeWebsite($name);
        // $webscraper::setWebsiteHtml($whole_website);
        // $webscraper::getWebsiteHtml();

        return $this->render('base_api/index.html.twig', [
            'controller_name' => 'BaseApiController',
            'name' => $name
        ]);
        #create dynamic endpoint

        #make api call to "dynamic endpoint"

        #return page or said data

    }

}
