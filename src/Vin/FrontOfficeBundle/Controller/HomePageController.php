<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\FrontOfficeBundle\Entity\Region;

class HomePageController extends Controller
{
    public function homePageAction()
    {
    	$em = $this -> getDoctrine()->getManager();
    	$showRegions = $em -> getRepository('VinFrontOfficeBundle:Region') -> findAll();

        return $this->render('VinFrontOfficeBundle:HomePage:homepage.html.twig', array('showRegions'=> $showRegions));
    }
}
