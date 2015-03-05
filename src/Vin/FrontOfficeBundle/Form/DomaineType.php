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
            ->add('nameDomaine')
            ->add('descriptionDomaine')
            ->add('slug')
            ->add('appellation')
            ->add('region')
            ->add('valider','submit')
        ;
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
