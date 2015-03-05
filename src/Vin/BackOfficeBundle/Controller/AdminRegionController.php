<?php 

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Region;

use Vin\FrontOfficeBundle\Form\RegionType;

use Symfony\Component\HttpFoundation\Request;

class AdminRegionController extends Controller
{
	public function showRegionAction()
	{
		$em = $this ->getDoctrine()->getManager();
		$showRegion = $em -> getRepository('VinFrontOfficeBundle:Region')->findAll();

		return $this -> render('VinBackOfficeBundle:AdminRegion:showRegion.html.twig', array('showRegion'=>$showRegion));
	}

	public function creationRegionAction(Request $request)
	{
		$em = $this -> getDoctrine()->getManager();
		$region = new Region();
		$form = $this -> createForm(new RegionType(),$region);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($region);
			$em -> flush();

			return $this->redirect($this->generateUrl('vin_back_office_creationRegion'));
		}

		return $this -> render('VinBackOfficeBundle:AdminRegion:creationRegion.html.twig',array('form'=>$form->createView()));
	}

	public function editionRegionAction(Request $request, $id)
	{
		$em = $this -> getDoctrine() -> getManager();
		$editionRegion = $em -> getRepository('VinFrontOfficeBundle:Region')->find($id);
		$form = $this -> createForm(new RegionType(), $editionRegion);

		$form -> handleRequest($request);

		if($form -> isValid()){
			$em -> persist($editionRegion);
			$em -> flush();

			return $this -> redirect($this->generateUrl('vin_back_office_editionRegion'));
		}

		return $this -> render('VinBackOfficeBundle:AdminRegion:editionRegion.html.twig', array('form'=>$form->createView()));
	}

	public function suppRegionAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$suppRegion = $em -> getRepository('VinFrontOfficeBundle:Region')->find($id);
		$em -> remove($suppRegion);
		$em -> flush();

		return $this -> redirect($this->generateUrl('vin_back_office_showRegion'));
	}

}

	

