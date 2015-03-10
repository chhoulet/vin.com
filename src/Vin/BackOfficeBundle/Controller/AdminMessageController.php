<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminMessageController extends Controller
{
    public function showMessageAction()
    {
        $em = $this -> getDoctrine()->getManager();
        $showMessage = $em -> getRepository('VinFrontOfficeBundle:Message')->findAll();

        return $this -> render('VinBackOfficeBundle:AdminMessage:showMessage.html.twig',
            array('showMessage'=>$showMessage));
    }
}