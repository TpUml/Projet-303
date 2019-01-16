<?php

namespace AeroGest\VolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Site_EscaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('dateEscale')
                ->add('motif')
                ->add('dateDepart')
                ->add('code')
                ->add('ville')
                ->add('statut')
                ->add('description')
                ->add('vol');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AeroGest\VolBundle\Entity\Site_Escale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aerogest_volbundle_site_escale';
    }


}
