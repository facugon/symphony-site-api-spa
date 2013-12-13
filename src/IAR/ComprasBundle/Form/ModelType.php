<?php

namespace IAR\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModelType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('synonym')
            ->add('slug')
            ->add('shortName')
            ->add('picFilename')
            ->add('disabled')
            ->add('brand')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IAR\ComprasBundle\Entity\Model'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'iar_comprasbundle_model';
    }
}
