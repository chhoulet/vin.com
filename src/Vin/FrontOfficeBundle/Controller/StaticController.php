<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticController extends Controller
{
    public function showMentionsAction()
    {
        return $this -> render('VinFrontOfficeBundle:Static:mentions.html.twig');
    }
}