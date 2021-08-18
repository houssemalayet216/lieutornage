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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FrontBundle\Entity\Notification;


class ProfessionelController extends Controller
{
    




     /**
     * @Route("/mes-reservations/calendrier",name="calendrier_page_professionel")
     */
    public function viewcalendarAction(Request $request)
    {

         
           $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
    {

         return $this->render('BackBundle:Professionel:calendrier.html.twig');




    }else{
     
      $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('fos_user_security_login'));
    
     }


   }









      /**
     * @Route("/calendrier-professionel",name="reservation_envoyer_calendar")
     */
    public function eventcalendarAction(Request $request)
    {

          $em = $this->getDoctrine()->getManager();
           $user = $this->container->get('security.token_storage')->getToken()->getUser();

           $data = array();
    
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
    {
        
      $query="SELECT r FROM FrontBundle:Reservation r WHERE  r.etat != :etat  AND r.client = :client  "; 

 $events=$em->createQuery($query)->setParameter('etat','En attente')->setParameter('client',$user)->getResult();
 



      foreach ($events as $event ) {
       

      

         
      

            
             // $start_string=strtotime($start_date_time);

            
              $strrr=$event->getDatedebut()->format('Y-m-d H:i:s');
           
            
              $finn=$event->getDatefin()->format('Y-m-d H:i:s'); 
           
$cat=$event->getAnnonce()->getCategorie()->first();
               
          
            $title='Loueur : '. $event->getLoueur()->getNom().' '.$event->getLoueur()->getPrenom().' Categorie: '.$cat->getTitre().'  Etat: '.$event->getEtat();
           
            
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

    }


   }







































/**
     * @Route("/mes-reservations/nouveaux " ,name="nouveaux_reservation_professionel")
     */
    public function nouveauReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {

                 $ListeReservations =$em->getRepository('FrontBundle:Reservation')->findBy( array('client'=>$user,'etat'=>'En attente'),array('datereservation'=>'DESC'));
             $reservations=$this->get('knp_paginator')->paginate(
        $ListeReservations,
        
        $request->query->get('page', 1),4);

                return $this->render('BackBundle:Professionel:Enattente.html.twig',['reservations'=>$reservations]);


               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }





     /**
     * @Route("/mes-reservations/active " ,name="active_reservation_professionel")
     */
    public function activeReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {

            
              $ListeReservations =$em->getRepository('FrontBundle:Reservation')->findBy( array('client'=>$user,'etat'=>'En cours'),array('datereservation'=>'DESC'));
             $reservations=$this->get('knp_paginator')->paginate(
        $ListeReservations,
        
        $request->query->get('page', 1),4);

                return $this->render('BackBundle:Professionel:active.html.twig',['reservations'=>$reservations]);














               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }





     /**
     * @Route("/mes-reservations/annuler " ,name="annuler_reservation_professionel")
     */
    public function annulerReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {


              $ListeReservations =$em->getRepository('FrontBundle:Reservation')->findBy( array('client'=>$user,'etat'=>'Annuler'),array('datereservation'=>'DESC'));
             $reservations=$this->get('knp_paginator')->paginate(
        $ListeReservations,
        
        $request->query->get('page', 1),4);

                return $this->render('BackBundle:Professionel:Annuler.html.twig',['reservations'=>$reservations]);   
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }




     /**
     * @Route("/mes-reservations/expirer " ,name="expirer_reservation_professionel")
     */
    public function expirerReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {

             
              $ListeReservations =$em->getRepository('FrontBundle:Reservation')->findBy( array('client'=>$user,'etat'=>'Expirer'),array('datereservation'=>'DESC'));
             $reservations=$this->get('knp_paginator')->paginate(
        $ListeReservations,
        
        $request->query->get('page', 1),4);

                return $this->render('BackBundle:Professionel:Annuler.html.twig',['reservations'=>$reservations]);   
             



               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }










   
     /**
     * @Route("/mes-reservations " ,name="reservation_professionel")
     */
    public function ReservationAction(Request $request)
    {

    	 $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {

             
              

                





                return $this->render('BackBundle:Professionel:tous.html.twig');   
             



               
             


            }else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');



            }





    }







   /**
     * @Route("/mes-reservations-envoyer",name="mes_reservation_envoyer")
     */
    public function ReservationsReçuesAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
    {


      $param=$request->request->get('etat');
    $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("client"=>$user),array('datereservation' => 'DESC')); 
    
     
     

    if($param != null && $param !=='Tous')
    {
      $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("etat"=>$param,"client"=>$user),array('datereservation' => 'DESC'));   
    }else{

       
       $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array("client"=>$user),array('datereservation' => 'DESC')); 


    }








      $output=array('data'=>array());
      $etat='';
    
      foreach ($reservations as $reservation) {
 $id =$reservation->getId();
 $idannonce=$reservation->getAnnonce()->getId();
 $imageurl='Uploads/'.$reservation->getAnnonce()->getGallerie()->first()->getImage(); 

$client='<span>'.$reservation->getLoueur()->getNom().' '.$reservation->getLoueur()->getPrenom().'</span>';
                  




            $image='<a href="'.$this->get('router')->generate('annance_detail_back', array('id' => $idannonce)).'"><img src= '.$this->container->get('assets.packages')->getUrl($imageurl).' class="img-fluid" alt="" width="50" height="50" style="border-radius:50%;"></a>';
            $cat=$reservation->getAnnonce()->getCategorie()->first();

$categorie='<span class="label label-success">'.$cat->getTitre().'</span>';
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
     





$button=' <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('reservation_detail_back', array('id' => $id)).'" ><i class="fa fa-eye"></i>Détails</a>';
                    
                    if($status =='En attente' || $status == 'En cours')
                    {
                   $button.='<button class="btn  btn-default btn-sm" data-toggle="modal" data-target="#annulerReservationModal" onclick="annulerReservationProfessionel('.$id.')" style="margin-left:5px;"  ><i class="fa fa-times-circle-o"></i>Annuler</button>';
                    }
               
                


                  $button.='</div>';



$output['data'][]=array(


  $image,
 $client,
 $categorie,
$du,
$au,
 $datePublication,
 $tarif,

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
     * @Route("/test " ,name="test-page")
     */
    public function testAction(Request $request)
    {

 return $this->render('BackBundle:Particulier:detail-annonce.html.twig');   

    }















  /**
     * @Route("/reservation-calendar",name="detail_reservation_calendar_professionel")
     */
    public function voirReservationCalendarAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
    {
     

    $output='';

     
     if($request->isXmlHttpRequest())
       {

        $id=$request->request->get('id');
       
     
      
      $reservation=$em->getRepository('FrontBundle:Reservation')->find($id);

     $output.=" <div class='table-responsive'>
            <table class='table'>";


     




       
          
   
     
 
      
       

      



                $output.="<tr>
                <th >Loueur : </th>
                <td >".$reservation->getLoueur()->getNom()." ".$reservation->getLoueur()->getPrenom()." </td></tr>
              
                ";

                 $output.="<tr>
                <th >Loueur : </th>
                <td >".$reservation->getLoueur()->getTypeHote()." </td></tr>
              
                ";


                  
                  if($reservation->getLoueur()->getFonction() != null)
                  {

                      $output.=" <tr>
                <th style='width:50%'>Fonction </th>
                <td >".$reservation->getLoueur()->getFonction()." </td></tr>";

                  }

                  if($reservation->getLoueur()->getSociete() != null)
                  {

                      $output.=" <tr>
                <th style='width:50%'>Societe </th>
                <td >".$reservation->getLoueur()->getSociete()." </td></tr>";

                  }
                


                 $output.=" <tr>
                <th style='width:50%'>Adresse </th>
                <td >".$reservation->getLoueur()->getVille()." ".$reservation->getLoueur()->getAdresse()." ".$reservation->getLoueur()->getCp()." </td></tr>";

                 $output.=" <tr>
                <th style='width:50%'>Info </th>
                <td > <span>Téléphone</span>".$reservation->getLoueur()->getTelephone()." </br>
                 <span>Email</span>".$reservation->getLoueur()->getEmail()." </td>

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