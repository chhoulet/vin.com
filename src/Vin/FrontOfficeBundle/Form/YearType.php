<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class YearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('year','choice', array('label'     => 'Selectionnez l\'année de production :',
                                              'attr'      => array('class'=> 'form-control'),
                                              'choices'   => array('2010'   => '2010',
                                                                   '2009'   => '2009',
                                                                   '2008'   => '2008',
                                                                   '2007'   => '2007',
                                                                   '2006'   => '2006',
                                                                   '2005'   => '2005',
                                                                   '2004'   => '2004',
                                                                   '2003'   => '2003',
                                                                   '2002'   => '2002',
                                                                   '2001'   => '2001',
                                                                   '<2000' => '<2000')
        ))
                 ->add('valider','submit', array('attr'=> array('class'=>'btn btn-primary')));
    }

    public function getName()
    {
        return 'vin_frontofficebundle_year';
    }
}