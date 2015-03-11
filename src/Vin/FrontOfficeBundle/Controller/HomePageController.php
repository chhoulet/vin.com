<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\FrontOfficeBundle\Form\PriceType;
use Vin\FrontOfficeBundle\Form\ColorType;
use Vin\FrontOfficeBundle\Form\YearType;
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

            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig',
                array('showVins' => $price));
        }

//Selection des vins par couleur:
        $formColor = $this -> createForm(new ColorType());

        $formColor ->handleRequest($request);

        if($formColor -> isValid())
        {
            $data = $formColor ->getData();
            $color = $em ->getRepository('VinFrontOfficeBundle:Vin')->findByCouleur($data['color']);

            return $this->render('VinFrontOfficeBundle:Vin:showVins.html.twig',
                array('showVins'=>$color));
        }

//Selection des vins par année:
        $formYear = $this -> createForm(new YearType());

        $formYear -> handleRequest($request);

        if($formYear -> isValid()){
            $data = $formYear ->getData($formYear);
            $year = $em -> getRepository('VinFrontOfficeBundle:Vin')->findByYear($data['year']);

            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig',
                array('showVins'=>$year));
        }



        return $this->render('VinFrontOfficeBundle:HomePage:homepage.html.twig',
        	array('showRegions'  => $showRegions,
        		  'vins'         => $vins,
        		  'vinDuMois'    => $vinDuMois,
        		  'bordeaux'     => $bordeaux,
                  'formPrice'    => $formPrice->createView(),
                  'formColor'    => $formColor->createView(),
                  'formYear'     => $formYear->createView()
                  ));
    }
}



































