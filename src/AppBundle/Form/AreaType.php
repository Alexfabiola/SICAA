<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AreaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Nombre'),
                    'required' => true,))

        ->add('descripcion', TextareaType::class,
                array(
                    'label'=>'Descripción',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Descripción'),
                    'required' => true,))

        ->add('ubicacion', TextareaType::class,
                array(
                    'label'=>'Ubicación',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Ubicación'),
                    'required' => true,))

        ->add('tipoArea', ChoiceType::class,
                array(
                    'label'=>'Tipo de Área',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group'),
                    'placeholder' => '- Seleccionar -',
                    'choices'  => array('Oficina' => 'Oficina',
                                        'Laboratorio'=> 'Laboratorio',
                                        'Aula'=> 'Aula',
                                        'Sala' => 'Sala',
                                        'Auditorio' => 'Auditorio',
                                        'Otro' => 'Otro',),
                    'required' => true,));
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
