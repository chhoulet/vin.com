<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Vin\FrontOfficeBundle\Entity\Vin;

class VinType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameWine')
            ->add('title')
            ->add('year')
            ->add('format')
            ->add('available')
            ->add('description')
            ->add('mealWine')
            ->add('stock')
            ->add('price')
            ->add('couleur', 'choice', array(
                /*Définition du choix de la couleur en appellant une méthode statique, getCouleurs()*/
                'choices'   => Vin::getCouleurs()
            ))
            ->add('region')
            ->add('domaine')
            ->add('appellation')
            ->add('valider','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vin\FrontOfficeBundle\Entity\Vin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vin_frontofficebundle_vin';
    }
}
