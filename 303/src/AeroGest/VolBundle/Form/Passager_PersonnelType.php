<?php

namespace AeroGest\VolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Passager_PersonnelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('code')
                ->add('nom')
                ->add('prenom')
                ->add('dateNaissance')
                ->add('sexe')
                ->add('description')
                ->add('ville')
                ->add('email')
                ->add('telephone')
                ->add('statut')
                ->add('compagnie')
                ->add('vol');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AeroGest\VolBundle\Entity\Passager_Personnel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aerogest_volbundle_passager_personnel';
    }


}
