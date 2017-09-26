<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Personal;

class AccesoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('estado', ChoiceType::class,
                array(
                    'label'=>'Estado',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group'),
                    'placeholder' => '- Seleccionar -',
                    'choices'  => array('Habilitado' => 'habilitado',
                                        'Inhabilitado' => 'inhabilitado',),
                    'required' => true,))

        ->add('vigenciaInicio', DateType::class, 
                    array(
                        'label'=>'Fecha Inicial',
                        'attr'=> array('class' => 'form-control form-group'),
                        'widget' => 'single_text',))

        ->add('vigenciaFin', DateType::class, 
                    array(
                        'label'=>'Fecha Final',
                        'attr'=> array('class' => 'form-control form-group'),
                        'widget' => 'single_text',))

        ->add('horaInicio', TimeType::class, 
                    array(
                        'label'=>'Hora Inicial',
                        'attr'=> array('class' => 'form-control form-group'),
                        'widget' => 'single_text',))

        ->add('horaFin', TimeType::class, 
                    array(
                        'label'=>'Hora Final',
                        'attr'=> array('class' => 'form-control form-group'),
                        'widget' => 'single_text',))


        ->add('dias', ChoiceType::class, 
            array(
                'label' => 'Dias',
                'label_attr' => array('class' => 'control-label'),
                'choices'  => array(
                       'Lunes' => 'Lunes',
                       'Martes' => 'Martes',
                       'Miercoles' => 'Miercoles',
                       'Jueves' => 'Jueves',
                       'Viernes' => 'Viernes',
                       'Sabado' => 'Sabado',
                       'Domingo' => 'Domingo',),
                'multiple' => 'yes',
                'expanded' => 'yes',
                'required' => true,))

        /*->add('persona', EntityType::class, 
            array(
                    'class' => 'AppBundle:Personal',
                    'choice_label' => 'Persona',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control select2'),
                    'required' => true,))*/
        ->add('persona')

        ->add('lugar');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Acceso'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_acceso';
    }


}
