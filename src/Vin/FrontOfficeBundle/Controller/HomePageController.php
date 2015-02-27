<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    public function homePageAction()
    {
        return $this->render('VinFrontOfficeBundle:HomePage:homepage.html.twig');
    }
}
