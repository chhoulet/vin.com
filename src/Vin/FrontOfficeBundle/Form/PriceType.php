<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PriceType extends AbstractType
{
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
           $builder ->add('price','choice', array('label'     => 'Selectionnez votre fourchette de prix :',
                                                  'attr'      => array('class'=> 'form-control'),
                                                  'choices'   => array('10'   => '10',
                                                                       '20'   => '20',
                                                                       '30'   => '30',
                                                                       '40'   => '40',
                                                                       '50'   => '50',
                                                                       '> 50' => '>50')
                                                      ))
                    ->add('valider','submit', array('attr'=> array('class'=>'btn btn-primary')));
        }

        public function getName()
        {
            return 'vin_frontofficebundle_price';
        }
}