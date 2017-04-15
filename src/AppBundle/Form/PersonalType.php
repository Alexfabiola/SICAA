<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class PersonalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('ci')
        ->add('nombres')
        ->add('apellidos')
        ->add('departamento', ChoiceType::class, array('choices'  => array(
                                                        'Química'=> 'quimica',
                                                        'Matemáticas' => 'matematicas',
                                                        'Computación'=> 'computacion',
                                                        'Física' => 'fisica',
                                                        'Biología'=> 'biologia',)))

        ->add('tipo', ChoiceType::class, array('choices'  => array(
                                                'Docente'=> 'docente',
                                                'Estudiante'=>'estudiante',
                                                'Administrativo' =>'administrativo',
                                                'Obrero'=>'obrero',)))

        ->add('correo', EmailType::class)
        ->add('genero', ChoiceType::class, array('choices'  => array(
                                                'Femenino'=> 'femenino',
                                                'Masculino' => 'masculino',)))
        
        ->add('direccion')
        ->add('telefono')
        ->add('fechaNacimiento');
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
