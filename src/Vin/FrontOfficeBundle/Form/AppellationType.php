<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AppellationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameAppellation', 'text',       array('label'=>'Quel est le nom d\'appellation ?',
                                                         'attr' => array('class'=>'form-control')))
            ->add('descriptionAppellation','text', array('label'=>'Décrivez l\'appellation créée :',
                                                         'attr' => array('class'=>'form-control')))
            ->add('vue','text',                    array('label'=>'Nom de l\'image associée :',
                                                         'attr' => array('class'=>'form-control')))
            ->add('region', null,                  array('label'=>'Quelle est la région de rattachement ?',
                                                         'attr' => array('class'=>'form-control')))
            ->add('valider','submit',              array('attr'=>array('class'=>'btn btn-default')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vin\FrontOfficeBundle\Entity\Appellation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vin_frontofficebundle_appellation';
    }
}
