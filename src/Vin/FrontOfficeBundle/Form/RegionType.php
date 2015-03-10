<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameRegion', 'text',         array('label'=>'Quel est le nom de la région créée ?',
                                                      'attr' => array('class'=>'form-control')))
            ->add('descriptionRegion', 'text',  array('label'=>'Description de la région :',
                                                      'attr' => array('class'=>'form-control')))
            ->add('vue','text',                 array('label'=>'Quel est le nom de la vue ?',
                                                      'attr' => array('class'=>'form-control')))
            ->add('valider','submit',           array('attr' => array('class'=>'btn btn-default')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vin\FrontOfficeBundle\Entity\Region'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vin_frontofficebundle_region';
    }
}
