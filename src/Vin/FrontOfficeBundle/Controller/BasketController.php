<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vin\FrontOfficeBundle\Entity\Basket;

class BasketController extends Controller
{
	public function addAction(Request $request, $id)
	{
		$this -> get('vin_front_office.service.basket')->add($id);

        // Le referer est l'addresse URL d'où l'utilisateur provient
        $referer = $request->headers->get('referer');

		return $this->redirect($referer); // On redirige l'utilisateur vers le referer
	}

//	public function listAction($id)
//	{
//		$em = $this -> getDoctrine()->getManager();
//		$tab = [];
//
//		// les id des vins
//		$vins = $this -> get('vin_front_office.service.basket')->list($id);
//
//		// on parcourt la liste des id vins que l'on a stockés en session
//		foreach ($vins as $idVin) {
//			// on remplace les id par les vrais objets récupérés de la BDD
//			$tab[] = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($idVin);
//		}
//
//		return $tab;
//	}

    /**
     * Page sans routing!!
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function countAction()
    {
        $count = $this -> get('vin_front_office.service.basket')->count();

        return $this -> render('VinFrontOfficeBundle:Basket:count.html.twig', array('basketCount' => $count));
    }
}