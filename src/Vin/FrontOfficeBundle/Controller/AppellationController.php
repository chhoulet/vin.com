<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Appellation;

use Vin\FrontOfficeBundle\Entity\Region;


class AppellationController extends Controller
{
	public function showAppellationAction($slug)
	{
		$em = $this -> getDoctrine()->getManager();

		$region = $em -> getRepository('VinFrontOfficeBundle:Region')->findOneBySlug($slug);

		$showAppellation = $em -> getRepository('VinFrontOfficeBundle:Appellation')->findByRegion($region);

		return $this -> render('VinFrontOfficeBundle:Appellation:showAppellation.html.twig',
		    array('region'         => $region,
		    	  'showAppellation'=> $showAppellation)); 
	}
}