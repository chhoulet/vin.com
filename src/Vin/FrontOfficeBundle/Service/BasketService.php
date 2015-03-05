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
		var_dump($this->session->all());
		$this->session->set('basket', $id);
		var_dump($this->session->all());
	}


}