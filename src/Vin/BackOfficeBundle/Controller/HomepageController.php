<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\BackOfficeBundle\Form\StockType;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function homepageAction(Request $request)
    {
////      Fonction de selection des vins par etat des stocks :
//        $em = $this -> getDoctrine()->getManager();
//        $formStock = $this -> createForm(new stockType());
//
//        $formStock -> handleRequest($request);
//        if($formStock -> isValid())
//        {
//            $data = $formStock->getData();
//            $stock = $em -> getRepository('FrontOfficeBundle:Vin')->findByStock($data['stock']);
//
//            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig', array('showVins'=>$stock));
//        }
////        return $this->render('VinFrontOfficeBundle:Homepage:homepage.html.twig', array('formStock'=>$formStock->createView()));
        return $this -> render('VinBackOfficeBundle:Homepage:homepage.html.twig');
    }

    
}
