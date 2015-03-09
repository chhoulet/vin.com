<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Vin;

use Vin\FrontOfficeBundle\Form\VinType;

use Symfony\Component\HttpFoundation\Request;

class AdminVinController extends Controller
{
	/*Liste des vins proposés à la vente*/
	public function showVinAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$showVin = $em -> getRepository('VinFrontOfficeBundle:Vin')->findAll();

		return $this -> render('VinBackOfficeBundle:AdminVin:showVin.html.twig',array('showVin'=>$showVin));
	}

	/*Ajoût d'un vin en BDD*/
	public function creationVinAction (Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$vin = new Vin();
		$form = $this -> createForm(new VinType(),$vin);
		$form -> handleRequest($request);

		if($form -> isValid()){
            //$vin->setSlug($vin->getNameWine());
		   $em -> persist($vin);
		   $em -> flush();

		   return $this -> redirect($this -> generateUrl('vin_back_office_creationVin'));
		}

		return $this -> render('VinBackOfficeBundle:AdminVin:creationVin.html.twig', array('form'=>$form->createView()));
	}

	/*Edition d'un vin*/
	public function editionVinAction(Request $request,$id)
	{
		$em = $this -> getDoctrine() -> getManager();
		$vin = $em -> getRepository('VinFrontOfficeBundle:Vin') -> find($id);
		$form = $this -> createForm(new VinType(),$vin);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($vin);
			$em -> flush();

			return $this -> redirect($this->generateUrl('vin_back_office_showVin'));
		}

		return $this -> render('VinBackOfficeBundle:AdminVin:editionVin.html.twig',array('form'=>$form->createView()));
	}

	/*Suppression d'un vin*/
	public function suppVinAction($id)
	{
		$em = $this -> getDoctrine() ->getManager();
		$suppVin = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($id);
		$em ->remove($suppVin);
		$em -> flush();

		return $this ->redirect($this -> generateUrl('vin_back_office_showVin'));
	}
}