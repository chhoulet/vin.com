<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Vin\FrontOfficeBundle\Entity\Message;

use Vin\FrontOfficeBundle\Form\MessageType;

use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller
{
    public function createmessageAction(Request $request, $id)
    {
        $em = $this -> getDoctrine() -> getManager();
        $message = new Message();
        $vin = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($id);
        $form = $this -> createForm(new MessageType(),$message,
            ['action'=> $this-> generateUrl('vin_front_office_bundle_message',['id'=>$id])]);

        $form -> handleRequest($request);

        if($form -> isValid()){
            $message -> setDateMessage( new \DateTime('now'));
            $message ->setVin($vin);
            $em -> persist($message);
            $em -> flush();

            return $this -> redirect($this-> generateUrl('vin_front_office_showOneVin',['id'=>$id]));
        }

        return $this -> render('VinFrontOfficeBundle:Message:message.html.twig',array('form'=>$form->createView()));
    }
}