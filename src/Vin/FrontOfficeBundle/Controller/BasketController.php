<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vin\FrontOfficeBundle\Entity\Basket;

class BasketController extends Controller
{
	public function addAction($id)
	{
		//$em -> getDoctrine()->getManager();
		$service = $this -> get('vin_front_office.service.basket')->add($id);

		return [];
	}

	public function listAction($id)
	{
		$em = $this -> getDoctrine()->getManager();
		$tab = [];
    	
		// les id des vins
		$vins = $this -> get('vin_front_office.service.basket')->list($id);

		// on parcourt la liste des id vins que l'on a stockés en session
		foreach ($vins as $idVin) {
			// on remplace les id par les vrais objets récupérés de la BDD
			$tab[] = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($idVin);
		}

		return $tab;
	}
}