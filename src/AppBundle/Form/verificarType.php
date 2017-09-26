<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class verificarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('cedula')
        ->add('area', EntityType::class, array('class' => 'AppBundle:Area'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'verificar';
    }
}