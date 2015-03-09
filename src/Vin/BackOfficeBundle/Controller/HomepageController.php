<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\BackOfficeBundle\Form\StockType;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function homepageAction()
    {
//        Fonction de selection des vins par état des stocks :
        $formStock = $this -> createForm(new stockType());

        $formStock -> handleRequest($request);
        if($formStock -> isValid())
        {
            $data = getData($formStock);
            $stock = $em -> getRepository('FrontOfficeBundle:Vin')->findByStock($data);

            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig', array('showVins'=>$stock));
        }
        return $this->render('VinBackOfficeBundle:Homepage:homepage.html.twig', array('formStock'=>$formStock->createForm()));
    }

    
}
