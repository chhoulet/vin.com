<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Vin\FrontOfficeBundle\Form\MessageType;

class ContactController extends Controller
{
    public function contactAction(Request $request)
    {
        $em = $this -> getDoctrine()->getmanager();
        $form = $this -> createForm(new MessageType());

        $form -> handleRequest($request);

        if($form -> isValid()){
            return $this -> redirect($this -> generateUrl('vin_front_office_homepage'));
        }

        return $this ->render('VinFrontOfficeBundle:Contact:contact.html.twig', array('form'=>$form -> createView()));
    }
}