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

    public function suppMessageAction($id)
    {
        $em = $this -> getDoctrine()-> getManager();
        $suppMessage = $em -> getRepository('VinFrontOfficeBundle:Message')->find($id);
        $em -> remove($suppMessage);
        $em -> flush();

        return $this -> redirect($this->generateUrl('vin_back_office_bundle_message'));
    }
}