<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Message;

use Vin\FrontOfficeBundle\Form\MessageType;

use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller
{
    public function createmessageAction(Request $request)
    {
        $em = $this -> getDoctrine() -> getManager();
        $message = new Message();
        $form = $this -> createForm(new MessageType(),$message, ['action'=> $this-> generateUrl('vin_front_office_bundle_message')]);

        $form -> handleRequest($request);

        if($form -> isValid()){
            $message -> setDateMessage( new \DateTime('now'));
            $em -> persist($message);
            $em -> flush();

            return $this -> redirect($this-> generateUrl('vin_front_office_bundle_message'));
        }

        return $this -> render('VinFrontOfficeBundle:Message:message.html.twig',array('form'=>$form->createView()));
    }
}