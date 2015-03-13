<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\BackOfficeBundle\Form\StockType;
use Symfony\Component\HttpFoundation\Request;

class HomepageController extends Controller
{
    public function homepageAction(Request $request)
    {
        $em = $this -> getDoctrine()->getManager();

        $nbAppellation = $em -> getRepository('VinFrontOfficeBundle:Appellation')->nbAppellation();
        $nbVins = $em -> getRepository('VinFrontOfficeBundle:Vin')->nbVins();
        $vinLowPrice = $em -> getRepository('VinFrontOfficeBundle:Vin')->vinLowPrice();
        $getStockByRegion = $em -> getRepository('VinFrontOfficeBundle:Vin')->getStockByRegion();
        $nbPomerol = $em -> getRepository('VinFrontOfficeBundle:Vin')->nbPomerol();
        $countBourgogne = $em ->getRepository('VinFrontOfficeBundle:Vin')->countRegion('Bourgogne');
        $countBordeaux = $em ->getRepository('VinFrontOfficeBundle:Vin')->countRegion('Bordeaux');
        $countMessages = $em ->getRepository('VinFrontOfficeBundle:Message')->countMessages();


//      Fonction de selection des vins par etat des stocks :
        $formStock = $this -> createForm(new stockType());

        $formStock -> handleRequest($request);
        if($formStock -> isValid())
        {
            $data = $formStock->getData();
            $stock = $em -> getRepository('VinFrontOfficeBundle:Vin')->stockVin($data['stock']);

            return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig', array('showVins'=>$stock));
        }

        return $this -> render('VinBackOfficeBundle:Homepage:homepage.html.twig',
            array('nbAppellation'    => $nbAppellation,
                  'nbVins'           => $nbVins,
                  'vinLowPrice'      => $vinLowPrice,
                  'getStockByRegion' => $getStockByRegion,
                  'nbPomerol'        => $nbPomerol,
                  'countBourgogne'   => $countBourgogne,
                  'countBordeaux'    => $countBordeaux,
                  'countMessages'    => $countMessages,
                  'formStock'        => $formStock ->createView()));
    }

}
