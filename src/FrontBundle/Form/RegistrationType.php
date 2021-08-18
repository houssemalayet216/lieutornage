<?php
// src/AppBundle/Form/RegistrationType.php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
class RegistrationType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
    {

      
        $builder 



























      ->add('civilite', new ChoiceType(), array( 'placeholder' => '--Choisir une option--',
    'choices'  => array(
        'M.' => 'M.',
        'Mme.' => 'Mme.',
        'Mlle.' => 'Mlle.'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Civilite','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => 'Civilite',
     

     

)

   ))



    ->add('typeCompte', new  ChoiceType (), array(
    'choices'  => array(
        'Particulier' => 'Un particulier /un professionel',
        'Professionel' => 'Professionel de cinéma, de la publicité ou des évenements'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Type du compte','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => 'Type du compte',
     

     

)

   ))




      ->add('typeHote', new  ChoiceType (), array(
    'choices'  => array(
        'Particulier' => 'Je suis un propriétaire',
        'Professionel' => 'Je suis un professionel'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Type','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => 'Type',
     

     

)

   ))




/*
   ->add('ville', ChoiceType::class, array(
    'choices'  => array(
        'Tunis' => 'Tunis',
        'Manouba' => 'Manouba',
        'Ariana' => 'Ariana',
        'Ben arous' => 'Ben arous'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Ville','required'=>true ,'property_path' => false),

     'multiple'  => false,
      'placeholder' => 'Ville'

     

))*/













    ->add('prenom', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Prénom' ) ) )
    ->add('nom', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Nom')))    

     



->add('fonction', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Fonction')))


 ->add('societe', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Nom société')))



   ->add('ville',new  ChoiceType(), array(
    'choices'  => array(
         'Tunis' => 'Tunis',
        'Sfax' => 'Sfax',
        'Sousse' => 'Sousse',
        'Kairouen' => 'Kairouen',
        'Bizerte'=>'Bizerte',
        'Gabès'=>'Gabès',
        'Ariana'=>'Ariana',
        'Gafsa'=>'Gafsa',
        'Monastir'=>'Monastir',
        'Ben arous'=>'Ben arous',
        'Kasserine'=>'Kasserine',
        'Mednine'=>'Mednine',
        'Nabeul'=>'Nabeul',
        'Tataouine'=>'Tataouine',
        'Bèja'=>'Bèja',
        'Kef'=>'Kef',
        'Mahdia'=>'Mahdia',
        'Sidi bouzid'=>'Sidi bouzid',
        'Jandouba'=>'Jandouba',
        'Tozeur'=>'Tozeur',
        'Manouba'=>'Manouba',
        'Siliana'=>'Siliana',
        'Zghouan'=>'Zghouan',
        'Kébili'=>'Kébili'
      
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Ville','required'=>true ,'property_path' => false,
    
      'placeholder' => 'Ville',
     

     

)

   ))
   
   ->add('adresse', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Adresse')))
    ->add('cp', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Cp')))

     ->add('telephone', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Telephone')));









 
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }	




















}