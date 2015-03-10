<?php

namespace Vin\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username','text',       array('label'=>'Quel est votre nom d\'utilisateur ?',
                                                 'attr' => array('class'=>'form-control')))
            ->add('content','text',        array('label'=>'Entrez votre commentaire :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('emailMessage','text',   array('label'=>'Entrez votre mail :',
                                                 'attr' => array('class'=>'form-control')))
            ->add('valider','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vin\FrontOfficeBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vin_frontofficebundle_message';
    }
}
