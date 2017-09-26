<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control'),
                )
            )
        ->add('firstName', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control'),
                )
            )
        ->add('displayName', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control'),
                )
            )
        ->add('gender', ChoiceType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control'),
                    'choices' => array('Masculino' => '1', 'Femenino' => '0'),
                    'required' => false,
                )
            )
        ->add('mobilePhone', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),
                    'required' => false
                )
            )
        ->add('address', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),
                    'required' => false
                )
            )
        ->add('city', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),
                    'required' => false
                )
            )
        ->add('stateOrProvince', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),'required' => false
                )
            )
        ->add('postalCode', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),'required' => false
                )
            )
        ->add('countryOrRegion', TextType::class,
                array(
                    'label_attr' => array('class' => 'control-label'),
                    'attr'=> array('class' => 'form-control','required' => false),'required' => false
                )
            )
        ->add('profilePhotoFile', FileType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'adminbundle_user';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'admin_user_registration';
    }

}
