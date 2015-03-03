<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\FrontOfficeBundle\Entity\Region;

class HomePageController extends Controller
{
    public function homePageAction()
    {
    	$em = $this -> getDoctrine()->getManager();
    	$vins = $em -> getRepository('VinFrontOfficeBundle:Vin')->findAll();
    	$showRegions = $em -> getRepository('VinFrontOfficeBundle:Region') -> findAll();
    	$vinDuMois = $em -> getRepository('VinFrontOfficeBundle:Vin') -> vinDuMois();
    	$bordeaux = $em -> getRepository('VinFrontOfficeBundle:Vin') -> bordeaux();

        return $this->render('VinFrontOfficeBundle:HomePage:homepage.html.twig', 
        	array('showRegions'=> $showRegions, 
        		  'vins'       => $vins,
        		  'vinDuMois'  => $vinDuMois,
        		  'bordeaux'   => $bordeaux));
    }
}
