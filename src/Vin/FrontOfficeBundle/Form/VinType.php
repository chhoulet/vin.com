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
            ->add('nameWine','text',       array('label'=>'Quel est le nom du vin ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('title', 'text',         array('label'=>'Quel est son classement ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('year', 'integer',       array('label'=>'Quel est l\'année ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('format', 'text',        array('label'=>'Format de la bouteille ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('available','text',      array('label'=>'Disponibilité ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('description', 'text',   array('label'=>'Description du vin :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('mealWine', 'text',      array('label'=>'Description des accords mets-vin :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('stock', 'integer',      array('label'=>'Nombre de bouteilles sourcées :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('price', 'integer',      array('label'=>'Prix unitaire :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('couleur', 'choice',     array(
                /*Définition du choix de la couleur en appellant une méthode statique, getCouleurs()*/
                                                 'choices'   => Vin::getCouleurs()
            ))
            ->add('region', null,          array('label'=>'Région de production :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('domaine', null,       array('label'=>'Domaine de production :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('appellation', null,   array('label'=>'Appellation de production :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('valider','submit',      array('attr' => array('class'=>'btn btn-default')))
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
