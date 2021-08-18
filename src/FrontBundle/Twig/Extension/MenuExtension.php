<?php


namespace FrontBundle\Twig\Extension;
use Doctrine\ORM\EntityManagerInterface ;


class MenuExtension extends  \Twig_Extension
{
    protected $entityManager;
  

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->entityManager = $entityManager;
    
    }

    public function getMenu()
    {
      
           


           
     
        
           



          $habitations=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>1),array('id'=>'ASC'),10);

            
             $actualites=$this->entityManager->getRepository('FrontBundle:Actualite')->findBy(array(),array('datepublication'=>'DESC'),4);






          $commerces=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>3));
         

         
          $lieuxPublics=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>4));

          $lieuxSport=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>5));


            $lieuxFestif=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>6));

           $lieuxAudio=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>7));

            $lieuxAffaire=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>9));
             $lieuxExterieur=$this->entityManager->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>11));





            $environments=$this->entityManager->getRepository('FrontBundle:Environments')->findBy(array(),array('id'=>'ASC'),4);
    $decorations=$this->entityManager->getRepository('FrontBundle:Decoration')->findBy(array(),array('id'=>'ASC'),4);
    
     $equipements=$this->entityManager->getRepository('FrontBundle:Equipement')->findBy(array(),array('id'=>'ASC'),4);
    $services=$this->entityManager->getRepository('FrontBundle:Services')->findBy(array(),array('id'=>'ASC'),4);




  $env_maison=$this->entityManager->getRepository('FrontBundle:Environments')->findBy( array('type' => 1),array('id'=>'ASC'),4);
          $env_appartement=$this->entityManager->getRepository('FrontBundle:Environments')->findBy( array('type' => 2),array('id'=>'ASC'),4);
          $env_exterieur=$this->entityManager->getRepository('FrontBundle:Environments')->findBy( array('type' => 3),array('id'=>'ASC'),4);
          $env_environment=$this->entityManager->getRepository('FrontBundle:Environments')->findBy( array('type' => 4),array('id'=>'ASC'),4);





    $dec_epoque=$this->entityManager->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 1),array('id'=>'ASC'),4);
          $dec_style=$this->entityManager->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 2),array('id'=>'ASC'),4);
          $dec_ambiance=$this->entityManager->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 3),array('id'=>'ASC'),4);
          $dec_origine=$this->entityManager->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 4),array('id'=>'ASC'),4);




       $dernier=$this->entityManager->getRepository('FrontBundle:Annonce')->findBy( array(),array('createAt'=>'DESC'),6);
       $exceptionel=$this->entityManager->getRepository('FrontBundle:Annonce')->findBy( array(),array('createAt'=>'ASC'),6);













        return array (
           'habitations'=>$habitations,'commerces'=> $commerces,'lieuxPublics'=>$lieuxPublics,'sports'=>$lieuxSport,'festifs'=>$lieuxFestif,'audios'=>$lieuxAudio,'affaires'=>$lieuxAffaire,'exterieurs'=>$lieuxExterieur,'env_maison'=>$env_maison,'env_appartement'=>$env_appartement,'env_exterieur'=>$env_exterieur,'env_environment'=>$env_environment,'dec_epoque'=>$dec_epoque,'dec_style'=>$dec_style,'dec_ambiance'=>$dec_ambiance,'dec_origine'=>$dec_origine,'decorations'=>$decorations,'environments'=>$environments,'equipements'=>$equipements,'services'=>$services,'dernier'=>$dernier,'exceptionel'=>$exceptionel,'actualites'=>$actualites
        );
    }




   /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('menu', array($this,'getMenu')),
        );
    }






    public function getName()
    {
        return "FrontBundle:MenuExtension";
    }
}