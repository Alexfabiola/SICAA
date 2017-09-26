<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class reportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('cedula')
        ->add('fecha', DateType::class);
        /*->add('tipo', ChoiceType::class,
                array('choices' => array('Docente'=> 'Docente',
                                        'Estudiante'=>'Estudiante',
                                        'Administrativo' =>'Administrativo',
                                        'Obrero'=>'Obrero')))
        ->add('departamento', ChoiceType::class,
        		array('choices'  => array('Química'=> 'Química',
                                            'Matemáticas' => 'Matemáticas',
                                            'Computación'=> 'Computación',
                                            'Física' => 'Física',
                                            'Biología'=> 'Biología')))
        ->add('hasta', DateType::class, array('widget' => 'single_text'));
        ->add('area', EntityType::class, array('class' => 'AppBundle:Area'));*/
    }

    /**
     * @return string
     */
    public function getName()
    {   
    	return 'report';
	}
}