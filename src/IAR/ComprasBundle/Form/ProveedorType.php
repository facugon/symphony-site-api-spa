<?php

namespace IAR\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigoCe')
            ->add('nombreCe')
            ->add('email')
            ->add('telefono')
            ->add('nombreResponsable')
            ->add('apellidoResponsable')
            ->add('provincia')
            ->add('localidad')
            ->add('zona')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IAR\ComprasBundle\Entity\Proveedor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iar_comprasbundle_proveedor';
    }
}
