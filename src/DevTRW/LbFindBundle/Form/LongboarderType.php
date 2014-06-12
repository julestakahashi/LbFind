<?php

namespace DevTRW\LbFindBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LongboarderType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('location')
            ->add('discipline')
            ->add('age')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DevTRW\LbFindBundle\Entity\Longboarder'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'devtrw_lbfindbundle_longboarder';
    }
}
