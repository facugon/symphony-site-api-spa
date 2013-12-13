<?php

namespace IAR\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AutoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modelo')
            ->add('marca')
            ->add('puertas')
            ->add('observaciones')
            ->add('combustible')
            ->add('comentarios')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IAR\ComprasBundle\Entity\Auto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iar_comprasbundle_auto';
    }
}
