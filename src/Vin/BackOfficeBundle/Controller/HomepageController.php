<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function homepageAction()
    {
        return $this->render('VinBackOfficeBundle:Homepage:homepage.html.twig');
    }

    
}
