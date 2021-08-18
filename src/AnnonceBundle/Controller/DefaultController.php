<?php

namespace AnnonceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FrontBundle\Form\AnnonceType;
use AppBundle\Entity\User;
use FrontBundle\Entity\Annonce;
use FrontBundle\Entity\Gallerie;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class DefaultController extends Controller
{
    /**
     * @Route("/proposer-lieu" ,name="page_proposer_lieu")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AnnonceBundle:Pages:proposerLieu.html.twig');
    }



     /**
     * @Route("/proposition/" ,name="proposer_lieu")
     */
    public function propAction(Request $request)
    {

        
   

         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

        $em=$this->getDoctrine()->getManager();
   


    if((is_object($user) || $user instanceof UserInterface) &&($authchecker->isGranted('ROLE_PARTICULIER')))
        {

           $annonce=new Annonce();

           $form = $this->createForm(new AnnonceType(),$annonce);

 $form->handleRequest($request);

 if ($form->isSubmitted() )
 {

  if ($form->isValid()) {

  $cat=$request->request->get('cat');
  $env=$request->request->get('env');
  $ser=$request->request->get('ser');
  $dec=$request->request->get('dec');
    $eq=$request->request->get('eq');


  if($cat != null && count($cat)>0)
  {

     foreach ($cat as $categorie ) {

        $sous_categorie=$em->getRepository('AppBundle:sousCategories')->find($categorie);
        
        $categories=$annonce->getCategorie();

        if(! ($this->existsInArray($sous_categorie->getCategorie(), $categories)))
        {

       $annonce->addCategorie($sous_categorie->getCategorie());

        }

        


        
        $annonce->addSousCategorie( $sous_categorie);

      
     }

  }





  
  if($env != null && count($env)>0)
  {

     foreach ($env as $environment ) {

        $Environments=$em->getRepository('FrontBundle:Environments')->find($environment);
        
        $annonce->addEnvironment($Environments);

      
     }

  }





  
  if($ser != null && count($ser)>0)
  {

     foreach ($ser as $serv ) {

        $services=$em->getRepository('FrontBundle:Services')->find($serv);
        
        $annonce->addService($services);

      
     }

  }





  
  if($dec != null && count($dec)>0)
  {

     foreach ($dec as $decor ) {

        $decoration=$em->getRepository('FrontBundle:Decoration')->find($decor);
        
        $annonce->addDecoration($decoration);

      
     }

  }



    if($eq != null && count($eq)>0)
  {

     foreach ($eq as $eqp ) {

        $equipement=$em->getRepository('FrontBundle:Equipement')->find($eqp);
        
        $annonce->addEquipement($equipement);

      
     }

  }



 if($form['image']->getData() != null )
       {
          /*$files =$form['gallerie']->getData();*/

              $attachments =$form['image']->getData() ;
           
                 
                
               
              if($attachments)
              {
              foreach($attachments as $attachment)
              {



                     
                
                
                   
                    
                
               

                       

                  $fileName = md5(uniqid()).'.'.$attachment->guessExtension();

                  

            // Move the file to the directory where brochures are stored
            $attachment->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $g=new Gallerie();
         $g->setImage($fileName);
       


            $em->persist($g);


            $em->flush();
   


            $annonce->addGallerie($g);
         
                 



              }
            }

            // Generate a unique name for the file before saving it
           




     }














$annonce->setUser($user);
 $annonce->setCreateAt(new \DateTime());
 $annonce->setType($user->getTypeHote());


   $em->persist($annonce);


      $em->flush();



      if($request->isXmlHttpRequest())
                     {

                        $msg='Votre lieux a été ajouté avec succés ! ';
                        $response=new JsonResponse(array('success'=>true,'message'=>$msg));

                     }



 }else{

if($request->isXmlHttpRequest())
             {

                $formErrors=$this->get('validator')->validate($form);
                $errorsArray=[];

                foreach ($formErrors  as $error) {
                    
                    $errorsArray[]=array(
                       'elementId'=>$error->getPropertyPath(),
                       'errorMessage'=>$error->getMessage(),

                      
                    );

                }

                $msg="Vous devez vérifier tous les champs ";
                $response=new JsonResponse(['success'=>false,'message'=>$msg,'errors'=>$errorsArray]);
             }






 }



 return $response;
}



  $ser_renaissance=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 16));
  $ser_uniform=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 17));
  $ser_habit=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 18));

         /* $services=$em->getRepository('FrontBundle:Services')->findAll();*/
    $ser_repas=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 6));
    $ser_exigence=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 7));
    $ser_type_cuisine=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 10));

     $ser_animaux_domestique=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 11));
     $ser_animaux_ferme=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 12));
     $ser_animaux_exotique=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 13));
     $ser_animaux_reptiles=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 14));
     $ser_animaux_insectes=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 15));

     $ser_materielle=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 3));
     $ser_costumes=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 4));
     $ser_vehicule=$em->getRepository('FrontBundle:Services')->findBy( array('type' => 5));



          $equipement=$em->getRepository('FrontBundle:Equipement')->findAll();
          
           $cat_habitations=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 1));
         
          $cat_commerces=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 3));
          $cat_public=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 4));
          $cat_sport=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 5));
          $cat_loisir=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 6));
          $cat_audiovisual=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 7));
          $cat_transport=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 8));
          $cat_affaires=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 9));
          $cat_professionel=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 10));
          $cat_exterieur=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 11));
          $cat_chateaux=$em->getRepository('AppBundle:sousCategories')->findBy( array('categorie' => 12));
           


         
 
  $env_maison=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 1));
          $env_appartement=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 2));
          $env_exterieur=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 3));
          $env_environment=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 4));





    $dec_epoque=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 1));
          $dec_style=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 2));
          $dec_ambiance=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 3));
          $dec_origine=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 4));







        return $this->render('AnnonceBundle:Pages:annonce.html.twig',['user'=>$user,'form'=>$form->createView(),'repas'=>$ser_repas,'exigence'=>$ser_exigence,'cuisine'=>$ser_type_cuisine,'materiel'=>$ser_materielle,'costumes'=>$ser_costumes,'vehicule'=>$ser_vehicule,'domistique'=>$ser_animaux_domestique,'ferme'=>$ser_animaux_ferme,'exotique'=>$ser_animaux_exotique,'reptiles'=>$ser_animaux_reptiles,'insectes'=>$ser_animaux_insectes,'equipements'=>$equipement,'habitation'=>$cat_habitations,'commerces'=>$cat_commerces,'public'=>$cat_public,'sport'=>$cat_sport,'loisir'=>$cat_loisir,'audiovisual'=>$cat_audiovisual,'tranport'=>$cat_transport,'affaires'=>$cat_affaires,'professionel'=>$cat_professionel,'exterieurs'=>$cat_exterieur,'chateaux'=>$cat_chateaux,'env_maison'=>$env_maison,'env_appartement'=>$env_appartement,'env_exterieur'=>$env_exterieur,'env_environment'=>$env_environment,'dec_epoque'=>$dec_epoque,'dec_style'=>$dec_style,'dec_ambiance'=>$dec_ambiance,'dec_origine'=>$dec_origine,'ser_renaissance'=>$ser_renaissance,'ser_uniform'=>$ser_uniform,'ser_habit'=>$ser_habit]);

     }else{
             
             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
        return $this->redirectToRoute('fos_user_security_login');
     }

    }












 /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }




    /**
     * @return boolean
     */
   private function existsInArray($entry, $array) {
    foreach ($array as $compare) {
        if ($compare->getId() == $entry->getId()) {
            return true;
        }
    return false;
}
}




}
