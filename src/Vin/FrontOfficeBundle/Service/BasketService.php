<?php

namespace Vin\FrontOfficeBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

class BasketService 
{
	/*Récupération de la session de l'user pour ensuite lui attribuer son panier */
	/**
	 * @var Session
	 */
	private $session;
    private $em;

	/*le construct sert à construire la classe 'basket', on lui injecte la classe session et EntityManager en parametres*/
	public function __construct(Session $session, EntityManager $em)
	{
		$this->session = $session;
        $this->em      = $em;
	}

	public function add($id)
	{
        // on vérifie si le panier existe
        if (!$this->session->has('basket')) {
            // Si basket n'existe pas, on le créé en le rattachant à la session
            $this->session->set('basket', array()); // alors on créé un tableau vide
        }

        // On récupère le contenu du panier
        $basket = $this->session->get('basket');

        //array_push($basket, $id);
        // On empile l'id du vin a la fin du tableau
        $basket[] = $id;

        // On définit le nouveau panier
		$this->session->set('basket', $basket);
	}

    public function listBasket()
    {
//        On recupere le contenu du tableau, qui est un tableau d'id : [4, 54, 23]
        $basket = $this -> session -> get('basket');
        $vins = array();

        foreach($basket as $item)
        {
//            Recuperation des noms des vins par l'id, on utilise l'em injecte dans services.yml en parametre general, definit dans le construct(Entity Manager())
            $vins[] = $this -> em ->getRepository('VinFrontOfficeBundle:Vin')->find($item);
        }

        return $vins;
    }

    public function count()
    {
        return count($this->session->get('basket'));
    }
}