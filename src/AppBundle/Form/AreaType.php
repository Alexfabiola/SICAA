<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre')
        ->add('descripcion')
        ->add('ubicacion')
        ->add('tipoArea', ChoiceType::class, array('choices'  => array(
                                                    'Oficina' => 'oficina',
                                                    'Laboratorio'=> 'laboratorio',
                                                    'Aula'=> 'aula',
                                                    'Sala' => 'sala',
                                                    'Auditorio' => 'auditorio',
                                                    'Otro' => 'otro',)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Area'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_area';
    }


}
