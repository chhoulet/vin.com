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

    public function listAction()
    {
        $vins = $this-> get('vin_front_office.service.basket')->listBasket();

        return $this -> render('VinFrontOfficeBundle:Basket:list.html.twig', array('vins'=>$vins));
    }

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