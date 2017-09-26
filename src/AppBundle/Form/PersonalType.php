<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class PersonalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('ci', IntegerType::class,
            array(
                'attr'  => array(
                    'class' => 'form-control form-group',
                    'min' => 1,
                    'placeholder'=> 'Cédula'),
                'required' => true,
                'label'=>'Cédula',))

        ->add('nombres', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Nombres'),
                    'required' => true,))

        ->add('apellidos', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Apellidos'),
                    'required' => true,))

        ->add('departamento', ChoiceType::class,
                array(
                    'label'=>'Departamento',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group'),
                    'placeholder' => '- Seleccionar -',
                    'choices'  => array('Química'=> 'Química',
                                        'Matemáticas' => 'Matemáticas',
                                        'Computación'=> 'Computación',
                                        'Física' => 'Física',
                                        'Biología'=> 'Biología',),
                    'required' => true,))

        ->add('tipo', ChoiceType::class,
                array(
                    'label'=>'Tipo de Personal',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group'),
                    'placeholder' => '- Seleccionar -',
                    'choices'  => array('Docente'=> 'Docente',
                                        'Estudiante'=>'Estudiante',
                                        'Administrativo' =>'Administrativo',
                                        'Obrero'=>'Obrero',),
                    'required' => true,))

        ->add('correo', EmailType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'correo@ejemplo.com'),))
            

        ->add('genero', ChoiceType::class,
                array(
                    'label'=>'Género',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group'),
                    'placeholder' => '- Seleccionar -',
                    'choices'  => array('Femenino'=> 'Femenino',
                                        'Masculino' => 'Masculino',),
                    'required' => true,))


        ->add('direccion', TextareaType::class,
                array(
                    'label'=>'Dirección',
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control form-group', 
                                    'placeholder'=> 'Dirección'),
                    'required' => true,))

        ->add('telefono', IntegerType::class,
            array(
                'attr'  => array(
                    'class' => 'form-control form-group',
                    'min' => 1,
                    'placeholder'=> 'Número de Teléfono'),
                'required' => true,
                'label'=>'Teléfono',))

        ->add('fechaNacimiento', DateType::class, 
            array(
                'label'=>'Fecha de Nacimiento',
                'attr'=> array('class' => 'form-control form-group'),
                'widget' => 'single_text',));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Personal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_personal';
    }


}
