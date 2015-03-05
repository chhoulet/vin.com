<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Appellation;

use Vin\FrontOfficeBundle\Form\AppellationType;

use Symfony\Component\HttpFoundation\Request;

class AdminAppellationController extends Controller
{
	public function showAppellationAction()
	{
		$em = $this -> getDoctrine()->getManager();
		$showAppellation = $em -> getRepository('VinFrontOfficeBundle:Appellation')->findAll();

		return $this -> render('VinBackOfficeBundle:AdminAppellation:showAppellation.html.twig',
			array('showAppellation'=>$showAppellation));
	}

	public function creationAppellationAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$appellation = new Appellation();
		$form = $this -> createForm(new AppellationType(), $appellation);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($appellation);
			$em -> flush();

			return $this -> redirect($this -> generateUrl('vin_back_office_showAppellation'));
		}

		return $this -> render('VinBackOfficeBundle:AdminAppellation:creationAppellation.html.twig', array('form'=>$form->createView()));
	}

	public function editionAppellationAction(Request $request, $id)
	{
		$em = $this -> getDoctrine()->getManager();
		$editionAppellation = $em -> getRepository('VinFrontOfficeBundle:Appellation')->find($id);
		$form = $this -> createForm(new AppellationType, $editionAppellation);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($editionAppellation);
			$em -> flush();

			return $this -> redirect($this->generateUrl('vin_back_office_showAppellation'));
		}

		return $this->render('VinBackOfficeBundle:AdminAppellation:editionAppellation.html.twig', array('form'=>$form->createView()));
	}

	public function suppAppellationAction($id)
	{
		$em = $this ->getDoctrine()->getManager();
		$suppAppellation = $em ->getRepository('VinFrontOfficeBundle:Appellation')->find($id);
		$em ->remove($suppAppellation);
		$em -> flush();

		return $this -> redirect($this->generateUrl('vin_back_office_showAppellation'));
	}
}