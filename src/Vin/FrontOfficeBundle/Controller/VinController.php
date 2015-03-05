<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Vin;

class VinController extends Controller
{
	public function showOneVinAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$showOneVin = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($id);

		return $this -> render('VinFrontOfficeBundle:Vin:showOneVin.html.twig',array('showOneVin'=>$showOneVin));

	}
}