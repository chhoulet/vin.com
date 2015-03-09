<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ColorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('color', 'choice', array('label'     => 'Selectionnez la couleur de votre vin:',
                                                'attr'      =>  array('class'=> 'form-control'),
                                                'choices'   =>  array('1'    => 'rouge',
                                                                      '2'    => 'rose',
                                                                      '3'    => 'blanc',
                                                                      '4'    => 'petillant',
                                                                      '5'    => 'moelleux')
        ))
            ->add('valider','submit', array('attr'=> array('class'=>'btn btn-primary')));
    }

    public function getName()
    {
        return 'vin_frontofficebundle_color';
    }
}