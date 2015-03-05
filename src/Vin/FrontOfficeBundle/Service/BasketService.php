<?php

namespace Vin\FrontOfficeBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;

class BasketService 
{
	/*Récupération de la session de l'user pour ensuite lui attribuer son panier */
	/**
	 * @var Session
	 */
	private $session;

	/*le construct sert à construire la classe 'basket', on lui injecte la classe session*/
	public function __construct(Session $session)
	{
		$this->session = $session;
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

        // On défini le nouveau panier
		$this->session->set('basket', $basket);
	}

    public function count()
    {
        return count($this->session->get('basket'));
    }


}