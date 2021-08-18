<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FrontBundle\Entity\Reservation;
use FrontBundle\Entity\Annonce;
use FrontBundle\Entity\Gallerie;
use FrontBundle\Entity\Notification;
use FrontBundle\Form\AnnonceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HoteController extends Controller
{
    






     /**
     * @Route("/calendrier",name="calendrier_page_particulier")
     */
    public function viewcalendarAction(Request $request)
    {

         
           $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
    {

         return $this->render('BackBundle:Particulier:calendrier.html.twig');




    }else{
     
      $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('fos_user_security_login'));
    
     }


   }









      /**
     * @Route("/calendrier-particulier",name="reservation_reçues_calendar")
     */
    public function eventcalendarAction(Request $request)
    {

          $em = $this->getDoctrine()->getManager();
           $user = $this->container->get('security.token_storage')->getToken()->getUser();

           $data = array();
    
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
    {
        
      $query="SELECT r FROM FrontBundle:Reservation r WHERE  r.etat NOT IN (:etat1,:etat2)  AND r.loueur = :loueur  "; 

 $events=$em->createQuery($query)->setParameter('etat1','En attente')->setParameter('etat2','Expirer')->setParameter('loueur',$user)->getResult();
 



      foreach ($events as $event ) {
       

      

         
      

            
             // $start_string=strtotime($start_date_time);

            
              $strrr=$event->getDatedebut()->format('Y-m-d H:i:s');
           
            
              $finn=$event->getDatefin()->format('Y-m-d H:i:s'); 
           

               
          
            $title=' Reservation de  '.$event->getClient()->getNom().' '.$event->getClient()->getPrenom().' Etat:'.$event->getEtat();
           
            
            $data[]=array(
'id'=>$event->getId(),
'etat'=>$event->getEtat(),
'title'=>$title,
'start'=>$strrr,
'end'=>$finn,

);




        


























      
        
  


           
                      

      
      }
    

  $response=new JsonResponse($data);
  return $response; 

    }else{
     
      $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('fos_user_security_login'));
    
     }


   }




























      
     /**
     * @Route("/modifier-lieux-{id}" ,name="modifier_lieux")
     */
    public function ModifierLieuxAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
            {

             
            

            $annonce=$em->getRepository('FrontBundle:Annonce')->find($id); 
           $categories=$annonce->getCategorie();
$subs=$annonce->getSousCategorie();
$environments=$annonce->getEnvironment();
$decorations=$annonce->getDecoration();
$equipements=$annonce->getEquipement();
$services=$annonce->getService();
$galleries=$annonce->getGallerie();
$idannonce=$annonce->getId();

 

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







foreach ($categories as $categorie ) {
  $annonce->removeCategorie($categorie);
}

foreach ($subs as $sub ) {
  $annonce->removeSousCategorie($sub);
}


foreach ($environments as $e ) {
  $annonce->removeEnvironment($e);
}


foreach ($decorations as $d ) {
  $annonce->removeDecoration($d);
}

foreach ($equipements as $ep ) {
  $annonce->removeEquipement($ep);
}

foreach ($services as $s ) {
  $annonce->removeService($s);
}


foreach ($galleries as $g ) {
  $annonce->removeGallerie($g);
}






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
$annonce->setType($user->getTypeHote());
 $annonce->setCreateAt(new \DateTime());


   $em->persist($annonce);


      $em->flush();









  $this->get('session')->getFlashBag()->add('ModificationSuccess','Annonce modifier avec succèss !!');
       return $this->redirect( $this->generateUrl('page_mes_lieux'));






 
}


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







        return $this->render('BackBundle:Particulier:modifierlieux.html.twig',['user'=>$user,'form'=>$form->createView(),'repas'=>$ser_repas,'exigence'=>$ser_exigence,'cuisine'=>$ser_type_cuisine,'materiel'=>$ser_materielle,'costumes'=>$ser_costumes,'vehicule'=>$ser_vehicule,'domistique'=>$ser_animaux_domestique,'ferme'=>$ser_animaux_ferme,'exotique'=>$ser_animaux_exotique,'reptiles'=>$ser_animaux_reptiles,'insectes'=>$ser_animaux_insectes,'equipements'=>$equipement,'habitation'=>$cat_habitations,'commerces'=>$cat_commerces,'public'=>$cat_public,'sport'=>$cat_sport,'loisir'=>$cat_loisir,'audiovisual'=>$cat_audiovisual,'tranport'=>$cat_transport,'affaires'=>$cat_affaires,'professionel'=>$cat_professionel,'exterieurs'=>$cat_exterieur,'chateaux'=>$cat_chateaux,'env_maison'=>$env_maison,'env_appartement'=>$env_appartement,'env_exterieur'=>$env_exterieur,'env_environment'=>$env_environment,'dec_epoque'=>$dec_epoque,'dec_style'=>$dec_style,'dec_ambiance'=>$dec_ambiance,'dec_origine'=>$dec_origine,'ser_renaissance'=>$ser_renaissance,'ser_uniform'=>$ser_uniform,'ser_habit'=>$ser_habit,'subs'=>$subs,'environments'=>$environments,'decorations'=>$decorations,'equipementsselected'=>$equipements,'services'=>$services,'galleries'=>$galleries,'idannonce'=>$id]);



 


            }


            else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }









   
   






































   
     /**
     * @Route("/Reservations " ,name="reservation_hote")
     */
    public function ReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
            {

             
            

                





                return $this->render('BackBundle:Particulier:tous.html.twig');   
             



               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }






   
     /**
     * @Route("/voir-Profile-{id}" ,name="find_profile")
     */
    public function ProfileAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if(is_object($user) || $user instanceof UserInterface )
            {

             
                
              $user=$em->getRepository('AppBundle:User')->find($id);



                if ($authchecker->isGranted('ROLE_PARTICULIER'))
                 {
                   return $this->render('BackBundle:Particulier:profileProfessionel.html.twig',['user'=>$user]); 
                 }
                 elseif($authchecker->isGranted('ROLE_PROFESSIONEL')){
                    return $this->render('BackBundle:Professionel:profileHote.html.twig',['user'=>$user]);
                 }else{

                      $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');

                 }
                   
             



               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }






    /**
     * @Route("/annonce-details-{id}" ,name="annance_detail_back")
     */
    public function detailAnnoncenAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if(is_object($user) || $user instanceof UserInterface )
            {

             
                
              $annonce=$em->getRepository('FrontBundle:Annonce')->find($id);


             

                   
             
              
               if ($authchecker->isGranted('ROLE_PARTICULIER'))
                 {
                   return $this->render('BackBundle:Particulier:detail-annonce.html.twig',['annonce'=>$annonce]); 
                 }
                 elseif($authchecker->isGranted('ROLE_PROFESSIONEL')){
                    return $this->render('BackBundle:Professionel:detail-annonce.html.twig',['annonce'=>$annonce]);
                 }else{

                      $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');

                 }


               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }



   


   

    /**
     * @Route("/details-reservation-{id}" ,name="reservation_detail_back")
     */
    public function detailReservationAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if(is_object($user) || $user instanceof UserInterface )
            {

             
                
              $reservation=$em->getRepository('FrontBundle:Reservation')->find($id);


             

                   
             
              
               if ($authchecker->isGranted('ROLE_PARTICULIER'))
                 {
                   return $this->render('BackBundle:Particulier:detail-reservation.html.twig',['reservation'=>$reservation]); 
                 }
                 elseif($authchecker->isGranted('ROLE_PROFESSIONEL')){
                    return $this->render('BackBundle:Professionel:detail-reservation.html.twig',['reservation'=>$reservation]);
                 }else{

                      $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');

                 }


               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }
























 /**
     * @Route("/mes-lieux",name="page_mes_lieux")
     */
    public function PageLieuxAction(Request $request)
    {

     $user = $this->container->get('security.token_storage')->getToken()->getUser();
      $entityManager = $this->getDoctrine()->getManager();

     $authchecker= $this->container->get('security.authorization_checker');
     if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
   {
     
       

      
 return $this->render('BackBundle:Particulier:mesLieux.html.twig');

     }
   else{

 
 $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');
    
     }



}



 /**
     * @Route("/delete-lieux",name="delete_lieux")
     */
    public function deleteLieuxAction(Request $request)
    {

    
      $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $id=$request->request->get('id');
              if($id!=null)
              {

               $annonce=$em->getRepository('FrontBundle:Annonce')->find($id);

           
               $em->remove($annonce);
                $em->flush();

              $message='Annonce supprimer avec succéss';

              

               
                $response=new JsonResponse(['success'=>true,'message'=>$message]);

                return $response;




              }else{
                $msg="identifiant incorect";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }
              

           }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }

































       
   
  
     
      
 


}























































   /**
     * @Route("/afficher-lieux",name="mes_lieux")
     */
    public function mesLieuxAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
    {


     $annonces=$em->getRepository('FrontBundle:Annonce')->findBy(array("user"=>$user),array('createAt' => 'DESC'));
      $output=array('data'=>array());
    
      foreach ($annonces as $annonce) {
 $id =$annonce->getId();
 $imageurl='Uploads/'.$annonce->getGallerie()->first()->getImage(); 


                  




            $image='<a href="'.$this->get('router')->generate('annance_detail_back', array('id' => $id)).'"><img src= '.$this->container->get('assets.packages')->getUrl($imageurl).' class="img-fluid" alt="" width="50" height="50" style="border-radius:50%"></a>';

            $cat=$annonce->getCategorie()->first();

            if($cat !=null)
            {
             $categorie='<span class="label label-success">'.$cat->getTitre().'</span>'; 
            }


$tarif=$annonce->getTarif();
$TypeTarification=$annonce->getTypeTarification();
$datePublication=$annonce->getCreateAt()->format('d-m-Y');



     





$button=' <div  class="text-center">
                     


                    <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('annance_detail_back', array('id' => $id)).'" ><i class="fa fa-eye"></i> Détails</a>

                    <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('modifier_lieux', 
                        array('id' =>$id)).'" style="margin-left:5px;" ><i class="fa fa-pencil-square-o"></i> Modifier</a> 

                  <button class="btn  btn-default btn-sm"  data-toggle="modal" data-target="#supprimerAnnonceModal" onclick="supprimerAnnonce('.$id.')" style="margin-left:5px;" ><i class="fa fa-trash-o"></i> Supprimer</button></div>';



$output['data'][]=array(


 $image,
 $categorie,
 $TypeTarification,
 $tarif,
 $datePublication,
 
 $button


    );




}

 $response=new JsonResponse($output);

/*$response = new \Symfony\Component\HttpFoundation\Response(json_encode($output));
$response->headers->set('Content-Type', 'application/json');
*/return $response;














     }

 }








   /**
     * @Route("/reservations-reçues",name="Reservation_reçues")
     */
    public function ReservationsReçuesAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
    {
        $param=$request->request->get('etat');
    $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("loueur"=>$user),array('datereservation' => 'DESC')); 
    
     
     

    if($param != null && $param !=='Tous')
    {
      $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("etat"=>$param,"loueur"=>$user),array('datereservation' => 'DESC'));   
    }else{

       
       $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("loueur"=>$user),array('datereservation' => 'DESC')); 


    }
    
      $output=array('data'=>array());
      $etat='';
    
      foreach ($reservations as $reservation) {
 $id =$reservation->getId();
 $idclient=$reservation->getClient()->getId();
 $idannonce=$reservation->getAnnonce()->getId();
 $imageurl='Uploads/'.$reservation->getAnnonce()->getGallerie()->first()->getImage(); 




$client='<span>'.$reservation->getNom() .' '.$reservation->getPrenom().'</span>';
                  




            $image='<a href="'.$this->get('router')->generate('annance_detail_back', array('id' => $idannonce)).'"><img src= '.$this->container->get('assets.packages')->getUrl($imageurl).' class="img-fluid" alt="" width="50" height="50" style="border-radius:50%;"></a>';
            $cat=$reservation->getAnnonce()->getCategorie()->first();

            if($cat != null)
            {
          $categorie='<span class="label label-success">'.$cat->getTitre().'</span>';    
            }

$tarif=$reservation->getTarifTotal();
$status=$reservation->getEtat();
$du =$reservation->getDatedebut()->format('d-m-Y');
$au =$reservation->getDatefin()->format('d-m-Y');
$datePublication=$reservation->getDatereservation()->format('d-m-Y');


if($status =='En cours')
{
$etat='<span class="label label-info">'.$status.'</span>';

}elseif($status =='En attente'){

$etat='<span class="label label-warning">'.$status.'</span>';

}else{

    $etat='<span class="label label-danger">'.$status.'</span>';

}
     





$button=' <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('reservation_detail_back', array('id' => $id)).'" ><i class="fa fa-eye"></i> Détails</a>';
                    
                    if($status =='En attente' || $status == 'En cours')
                    {
                   $button.='<button class="btn  btn-default btn-sm" data-toggle="modal" data-target="#annulerReservationModal" onclick="annulerReservation('.$id.')" style="margin-left:5px;" ><i class="fa fa-times-circle-o"></i>Annuler</button>';
                    }
                    if($status =='En attente')
                    {
                         $button.='<button class="btn  btn-default btn-sm" data-toggle="modal" data-target="#confirmerReservationModal"  onclick="confirmerReservation('.$id.')" style="margin-left:5px;" ><i class="fa fa-check-circle-o"></i> Confirmer</button>';

                    }
                     
                


                  $button.='</div>';



$output['data'][]=array(


 $image,
 $client,
 $categorie,
$du,
$au,
 $tarif,
 $datePublication,
 $etat,
 
 $button


    );




}

 $response=new JsonResponse($output);

/*$response = new \Symfony\Component\HttpFoundation\Response(json_encode($output));
$response->headers->set('Content-Type', 'application/json');
*/return $response;














     }

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






  /**
     * @Route("/voir-reservation-calendar",name="detail_reservation_calendar_particulier")
     */
    public function voirReservationCalendarAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
    {
     

    $output='';

     
     if($request->isXmlHttpRequest())
       {

        $id=$request->request->get('id');
       
     
      
      $reservation=$em->getRepository('FrontBundle:Reservation')->find($id);

     $output.=" <div class='table-responsive'>
            <table class='table'>";


     




       
          
   
     
 
      
       

      



                $output.="<tr>
                <th >Client : </th>
                <td >".$reservation->getClient()->getNom()." ".$reservation->getClient()->getPrenom()." </td></tr>
              
                ";

                  
                  if($reservation->getClient()->getFonction() != null)
                  {

                      $output.=" <tr>
                <th style='width:50%'>Fonction </th>
                <td >".$reservation->getClient()->getFonction()." </td></tr>";

                  }

                  if($reservation->getClient()->getSociete() != null)
                  {

                      $output.=" <tr>
                <th style='width:50%'>Societe </th>
                <td >".$reservation->getClient()->getSociete()." </td></tr>";

                  }
                


                 $output.=" <tr>
                <th style='width:50%'>Adresse </th>
                <td >".$reservation->getClient()->getVille()." ".$reservation->getClient()->getAdresse()." ".$reservation->getClient()->getCp()." </td></tr>";

                 $output.=" <tr>
                <th style='width:50%'>Info </th>
                <td > <span>Téléphone</span>".$reservation->getClient()->getTelephone()." </br>
                 <span>Email</span>".$reservation->getClient()->getEmail()." </td>

                </tr>";



                if(count($reservation->getAnnonce()->getSousCategorie())>0)
       {
         $output.=" <tr>
                <th style='width:50%'>Lieux : </th>
                <td > ";
          foreach ($reservation->getAnnonce()->getSousCategorie() as $cat ) {
         
          $output.=" ".$cat->getTitre()." <br/>";


          }

          $output.="</td></tr>";


       }


         $output.=" <tr>
                <th style='width:50%'>Adresse de lieux </th>
                <td >".$reservation->getAnnonce()->getVille()." ".$reservation->getAnnonce()->getAdresse()." ".$reservation->getAnnonce()->getCp()." </td></tr>";




      
                if(count($reservation->getAnnonce()->getEnvironment())>0)
       {
         $output.=" <tr>
                <th style='width:50%'>Environment : </th>
                <td > ";
          foreach ($reservation->getAnnonce()->getEnvironment() as $env ) {
         
          $output.=" ".$env->getTitre()." <br/>";


          }

          $output.="</td></tr>";


       }




                if(count($reservation->getAnnonce()->getDecoration())>0)
       {
         $output.=" <tr>
                <th style='width:50%'>Décoration : </th>
                <td > ";
          foreach ($reservation->getAnnonce()->getDecoration() as $dec ) {
         
          $output.=" ".$dec->getTitre()." <br/>";


          }

          $output.="</td></tr>";


       }

           





      $output.=" <tr>
                <th style='width:50%'>Réservation : </th>
                <td > <span>Du</span> ".$reservation->getDatedebut()->format('d/m/Y')." <br>
                <span>Au</span> ".$reservation->getDatefin()->format('d/m/Y')." <br>
                <span>Tarif Totale</span> ".$reservation->getTarifTotal()." DT  <br>";

if($reservation->getEtat()=='En cours')
{
  $output.=" <span class='label label-info'>".$reservation->getEtat()."</span> "; 
}else{
    $output.=" <span class='label label-danger'>".$reservation->getEtat()."</span>  "; 
}



                $output.="</td></tr>";






                if(count($reservation->getEquipement())>0)
       {
         $output.=" <tr>
                <th style='width:50%'>Equipements : </th>
                <td > ";
          foreach ($reservation->getEquipement() as $eq ) {
         
          $output.=" ".$eq->getTitre()." <br/>";


          }

          $output.="</td></tr>";


       }


                 if(count($reservation->getService())>0)
       {
         $output.=" <tr>
                <th style='width:50%'>Services : </th>
                <td > ";
          foreach ($reservation->getService() as $ser ) {
         
          $output.=" ".$ser->getTitre()." <br/>";


          }

          $output.="</td></tr>";


       }











         







        
       


      











  $output.=' 
            </table>
            </div>

            ';
     
           
     




             
             $response=new JsonResponse(['success'=>true,'output'=>$output]);
             return $response;
        




        

       }else{
           $msg="Erreur requete";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;

       }

       
    }else{

         
    $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
    return $this->redirect( $this->generateUrl('fos_user_security_login'));
    }
    
   }     































































}
