<?php
// src/AppBundle/Form/RegistrationType.php

namespace FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BackBundle\Entity\Categories;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AnnonceType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
    {

      
        $builder 

























 




  ->add('typeTarification',new  ChoiceType(), array(
    'choices'  => array(
         'Par heure' => 'Par heure',
        'Par jour' => 'Par jour',
        'Par semaine' => 'Par semaine',
        'Par mois' => 'Par mois'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Type de tarification ','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))




  ->add('surfaceTotale',new ChoiceType(), array(
    'choices'  => array(
        'Inférieur à 100 m2' => 'Inférieur à 100 m2',
        'Entre 101 et 149 m2' => 'Entre 101 et 149 m2',
        'Entre 201 et 300 m2' => 'Entre 201 et 300 m2',
        'Entre 150 et 200 m2' => 'Entre 150 et 200 m2',
        'Entre 301 et 500 m2' => 'Entre 301 et 500 m2',
        'Entre 501 et 1000 m2' => 'Entre 501 et 1000 m2',
        'Supérieur à 1000 m2' => 'Supérieur à 1000 m2'
    
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'surface Totale','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))




  ->add('surfacePiece',new  ChoiceType(), array(
    'choices'  => array(
        'Inférieur à 60 m2' => 'Inférieur à 60 m2',
        'Supérieur à 60 m2' => 'Supérieur à 60 m2',
        'Supérieur à 100 m2' => 'Supérieur à 100 m2'
        

    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'vous êtes','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))




    
  ->add('nbrPiece',new ChoiceType(), array(
    'choices'  => array(
        '1 à 5' => '1 à 5',
        '6 à 10' => '6 à 10',
        '11 à 20' => '11 à 20',
        'Supérieur à 20' => 'Supérieur à 20'
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'nbrPiece','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))



->add('nbrNiveau',new NumberType(), array('attr'=>array('class'=>'form-control')))
->add('tarif',new  TextType(), array('attr'=>array('class'=>'form-control')))













  


     ->add('titre',new TextType(), array('attr'=>array('class'=>'form-control' ) ) )
    ->add('description',new TextareaType(), array('attr'=>array('class'=>'form-control' ) ) )
     
    ->add('adresse',new TextType(), array('attr'=>array('class'=>'form-control' ) ) )

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
      

    /*    ->add('gallerie', new GallerieType(),array('data_class'=>null))*/

             ->add('image',new FileType(), array(
              'mapped'=>false,
            'label'     => false,
            'required'  => true,
            'multiple'=>'multiple',
            'data_class'=>null
           

        ))
              
    ->add('cp',new TextType(), array('attr'=>array('class'=>'form-control')));
    



  
      



















 
    }

   




















}