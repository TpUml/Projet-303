<?php

namespace AeroGest\VolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('code')
                ->add('libelle')
                ->add('modele')
                ->add('nbrPlaces')
                ->add('etat')
                ->add('statut')
                ->add('isVisible')
                ->add('compagnie');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AeroGest\VolBundle\Entity\Avion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aerogest_volbundle_avion';
    }


}
