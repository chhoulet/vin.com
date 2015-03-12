<?php

namespace Vin\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Vin\FrontOfficeBundle\Entity\Message;
use Vin\FrontOfficeBundle\Entity\Vin;
use Vin\FrontOfficeBundle\Form\MessageType;

class VinController extends Controller
{
	public function showOneVinAction(Request $request, $id)
	{
		$em = $this -> getDoctrine()->getManager();
		$showOneVin = $em -> getRepository('VinFrontOfficeBundle:Vin')->find($id);


        $message = new Message();
        $form = $this -> createForm(new MessageType(), $message, [
            //'action'=> $this-> generateUrl('vin_front_office_bundle_message_create',['id'=>$id])
        ]);

        $form -> handleRequest($request);

        if($form -> isValid()){
            $message -> setDateMessage( new \DateTime('now'));
            $message ->setVin($showOneVin);
            $em -> persist($message);
            $em -> flush();

            return $this -> redirect($this-> generateUrl('vin_front_office_showOneVin',['id'=>$id]));
        }

        return $this -> render('VinFrontOfficeBundle:Vin:showOneVin.html.twig',array(
            'showOneVin' => $showOneVin,
            'form'       => $form->createView()
        ));
	}

    public function showVinsAppellationAction($slug)
    {
        $em = $this -> getDoctrine()->getManager();
        $appellation = $em -> getRepository('VinFrontOfficeBundle:Appellation') -> findOneBySlug($slug);

        $showVinsAppellation = $em -> getRepository('VinFrontOfficeBundle:Vin') -> findByAppellation($appellation);

        return $this -> render('VinFrontOfficeBundle:Vin:showVins.html.twig',
            array('showVins'  => $showVinsAppellation));
    }
}