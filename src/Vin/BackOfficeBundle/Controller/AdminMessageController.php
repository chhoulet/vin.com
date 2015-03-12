<?php

namespace Vin\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminMessageController extends Controller
{
    public function showMessagesAction()
    {
        $em = $this -> getDoctrine()->getManager();
        $showMessages = $em -> getRepository('VinFrontOfficeBundle:Vin')->findAll();

        return $rhis ->render('VinBackOfficeBundle:AdminMessage:showMessage.html.twig',
            array('showMessages' => $showMessages));

    }
    public function suppMessageAction($id)
    {
        $em = $this -> getDoctrine()-> getManager();
        $suppMessage = $em -> getRepository('VinFrontOfficeBundle:Message')->find($id);
        $em -> remove($suppMessage);
        $em -> flush();

        return $this -> redirect($this->generateUrl('vin_back_office_bundle_message'));
    }
}