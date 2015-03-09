<?php

namespace Vin\BackOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver;

class StockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder -> add('stock', 'choice', array('label'   =>'Sectionnez les vins comptant en stock moins de :',
                                                 'attr'    => array ('class'=>'form-control',
                                                                     'choices' =>  array('20'    => '20',
                                                                                         '40'    => '40',
                                                                                         '50'    => '50',
                                                                                         '100'   => '100',
                                                                                         '250'   => '250'))))
                 ->add('valider','submit', array('class'   =>'btn btn-primary'));
    }

    public function getName()
    {
        return 'vin_back_office_bundle_stock';
    }
}