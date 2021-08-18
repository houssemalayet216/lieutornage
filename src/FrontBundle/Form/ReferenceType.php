<?php
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

class ReferenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('image',new FileType(), array(
            'label'     => false,
            'required'  => true,
            'data_class'=>null
            
           

        ))




  ->add('type', new ChoiceType(), array(
    'choices'  => array(
        'Cinéma/Télévision' => 'Cinéma/Télévision',
        'Evenmentiel' => 'Evenmentiel',
            'Publicité'=> 'Publicité'
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Type','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))







    ->add('pays', new ChoiceType(), array(
    'choices'  => array(
        'Tunis' => 'Tunis',
        'Algérie' => 'Algérie',
        'Moroc'=> 'Moroc',
        'France'=> 'France',
        'Tukey'=> 'Tukey',
        'Egypt'=> 'Egypt',
        'America'=> 'America',
        'Canada'=> 'Canada',
        'India'=> 'India',
        'Syria'=> 'Syria',
        'Lebanon'=> 'Lebanon',
        'Autre'=> 'Autre',
       
    ),
      
     'attr' => array('class'=>'form-control','placeholder'=>'Pays','required'=>true ,'property_path' => false,
     'multiple'  => false,
      'placeholder' => '',
     

     

)

   ))















  


   



   ->add('titre',new TextType(), array('attr'=>array('class'=>'form-control' ) ) )
    ->add('description',new TextareaType(), array('attr'=>array('class'=>'form-control' ) ) );








    
    }





 












  
}