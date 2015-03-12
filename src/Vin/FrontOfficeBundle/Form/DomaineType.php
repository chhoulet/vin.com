<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DomaineType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameDomaine', 'text',        array('label' => 'Quel est le nom du domaine ?',
                                                      'attr' => array('class' => 'form-control')))
            ->add('descriptionDomaine', 'text', array('label' => 'Décrivez le domaine créé :',
                                                      'attr' => array('class' => 'form-control')))
            ->add('appellation',null,         array('label' => 'Quelle est l\'appellation de rattachement ?',
                                                      'attr' => array('class' => 'form-control')))
            ->add('region', null,               array('label' => 'Quelle est la région de rattachement ?',
                                                      'attr' => array('class' => 'form-control')))
            ->add('valider', 'submit',          array('attr' => array('class' => 'btn btn-default')));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vin\FrontOfficeBundle\Entity\Domaine'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vin_frontofficebundle_domaine';
    }
}
