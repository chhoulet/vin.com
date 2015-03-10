<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Vin\FrontOfficeBundle\Entity\Domaine;

use Vin\FrontOfficeBundle\Form\DomaineType;

class AdminDomaineController extends Controller
{
	public function showDomaineAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$showDomaine = $em -> getRepository('VinFrontOfficeBundle:Domaine')->findAll();

		return $this -> render('VinBackOfficeBundle:AdminDomaine:showDomaine.html.twig', array('showDomaine'=>$showDomaine));
	}

	public function creationDomaineAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$creationDomaine = new Domaine();
		$form = $this -> createForm(new DomaineType(), $creationDomaine);

		$form -> handleRequest($request);

		if($form -> isValid()){
//          $creationDomaine -> setSlug($creationDomaine->getNameDomaine());
			$em -> persist($creationDomaine);
			$em -> flush();

			return $this-> redirect($this->generateUrl('vin_back_office_showDomaine'));
		}

		return $this -> render('VinBackOfficeBundle:AdminDomaine:creationDomaine.html.twig',array('form'=>$form-> createView()));
	}

	public function editionDomaineAction(Request $request,$id)
	{
		$em = $this -> getDoctrine()->getManager();
		$editionDomaine = $em -> getRepository('VinFrontOfficeBundle:Domaine')->find($id);
		$form = $this -> createForm(new DomaineType(), $editionDomaine);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($editionDomaine);
			$em -> flush();

			return $this-> redirect($this->generateUrl('vin_back_office_showDomaine'));
		}

		return $this -> render('VinBackOfficeBundle:AdminDomaine:editionDomaine.html.twig', array('form'=>$form->createView()));
	}

	public function SuppDomaineAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$SuppDomaine = $em -> getRepository('VinFrontOfficeBundle:Domaine')->find($id);
		$em -> remove($SuppDomaine);
		$em -> flush();

		return $this-> redirect($this->generateUrl('vin_back_office_showDomaine'));
	}
}