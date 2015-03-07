<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\FrontOfficeBundle\Form\PriceType;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends Controller
{
    public function homePageAction(Request $request)
    {
    	$em = $this -> getDoctrine()->getManager();
    	$vins = $em -> getRepository('VinFrontOfficeBundle:Vin')->findAll();
    	$showRegions = $em -> getRepository('VinFrontOfficeBundle:Region') -> findAll();
    	$vinDuMois = $em -> getRepository('VinFrontOfficeBundle:Vin') -> vinDuMois();
    	$bordeaux = $em -> getRepository('VinFrontOfficeBundle:Vin') -> bordeaux();

// Selection des vins par prix :


        $formPrice = $this -> createForm(new PriceType());

        $formPrice ->handleRequest($request);

        if($formPrice -> isValid()){
            $data = $formPrice ->getData();
            $price = $em ->getRepository('VinFrontOfficeBundle:Vin')->getVinByPrice($data['price']);
//            $appellation = $em ->getRepository('VinFrontOfficeBundle:Appellation')->findAll();

            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig',
                array(
                      'showVins'     => $price));
        }

        return $this->render('VinFrontOfficeBundle:HomePage:homepage.html.twig',
        	array('showRegions'  => $showRegions,
        		  'vins'         => $vins,
        		  'vinDuMois'    => $vinDuMois,
        		  'bordeaux'     => $bordeaux,
                  'formPrice'    => $formPrice->createView()));
    }
}
