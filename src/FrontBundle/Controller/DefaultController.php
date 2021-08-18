<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FrontBundle\Entity\Reservation;
use FrontBundle\Entity\Annonce;
use FrontBundle\Entity\Avis;

class DefaultController extends Controller
{
    /**
     * @Route("/" ,name="home_page")
     */
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:content.html.twig');
    }



    /**
     * @Route("/contacter" ,name="contacter_page")
     */
    public function contacterAction()
    {
        return $this->render('FrontBundle:Pages:contact.html.twig');
    }



      /**
     * @Route("/faq" ,name="faq_page")
     */
    public function faqAction()
    {
        return $this->render('FrontBundle:Pages:faq.html.twig');
    }

     
    
    /**
     * @Route("/details-{id}" ,name="details_page")
     */
    public function detailsAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
       $annonce=$em->getRepository('FrontBundle:Annonce')->find($id);
       $avis=$em->getRepository('FrontBundle:Avis')->findBy(array('annonce'=>$annonce),array('datepublication'=>'DESC'),3);

        return $this->render('FrontBundle:Pages:detailes.html.twig',['annonce'=>$annonce,'avis'=>$avis]);
    }




    /**
     * @Route("/avis" ,name="avis_annonce")
     */
    public function avisAnnoceAction(Request $request)
    {

          $em=$this->getDoctrine()->getManager();
          $message='';
          $output='';
          
            



        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {


        $avis =new Avis();

        $nom=$request->request->get('nom');
        $email=$request->request->get('email');
        $aviss=$request->request->get('avis');
        $message=$request->request->get('message');
        $idannonce=$request->request->get('id');
        $annonce=$em->getRepository('FrontBundle:Annonce')->find($idannonce);

        $avis->setNomcomplete($nom);
        $avis->setEmail($email);
        $avis->setAvis($aviss);
        $avis->setMessage($message);
        $avis->setAnnonce($annonce);
        $avis->setDatepublication(new \DateTime() );

        $em->persist($avis);
        $em->flush();

     

        
 $reviews=$em->getRepository('FrontBundle:Avis')->findBy(array('annonce'=>$annonce),array('datepublication'=>'DESC'),3);
      

        
       foreach($reviews as $rev )
       {
         

$output='<div class="review-box clearfix">
                  <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                  </figure>
                  <div class="rev-content">
                    <div class="rating">';


 if($rev->getAvis()>4)
 {

$output.='<i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i>';


 }else{
$a=$rev->getAvis();
for($j=0;$j<count($a);$j++)
{

$output.='<i class="icon-star voted"></i>';

}



 }


                      
                    $output.='</div>
                    <div class="rev-info">
                      '.$rev->getNomcomplete().' – '.$rev->getDatepublication()->format("d/m/Y").'
                    </div>
                    <div class="rev-text">
                      <p>
                       '.$rev->getMessage().'
                      </p>
                    </div>
                  </div>
                </div>';






   










       }
        
         


        
       

      $response=new JsonResponse(array('output'=>$output,'success'=>true));

                return $response;
      


     



        }else{


      $msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }



    }











































  /**
     * @Route("/verifier-disponibilite" ,name="verifier_disponibilite")
     */
    public function verifierDisponibiliteAction(Request $request)
    {

          $em=$this->getDoctrine()->getManager();
          $message='';
          $dispo=true;
            



        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {
        $id=$request->request->get('id');
        $debut=$request->request->get('debut');
        $fin=$request->request->get('fin');

        $datedebut= \DateTime::createFromFormat("d/m/Y H:i",$debut);
        $datefin=\DateTime::createFromFormat("d/m/Y H:i",$fin);



        $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array('annonce'=>$id));

       foreach($reservations as $reserv)
       {
      /*  $db= \DateTime::createFromFormat("d/m/Y H:i",$reserv->getDatedebut());
        $df=\DateTime::createFromFormat("d/m/Y H:i",$reserv->getDatefin());*/
        $db=$reserv->getDatedebut();
        $df=$reserv->getDatefin();


          if((($db==$datedebut )|| ($df == $datefin ) ) && $resrv->getEtat()=='En cours' )
          {

          $dispo=false;
            
            break;

          }

       }


      


      if($dispo==true)
      {
          $message='Lieux disponible vous pouvez le réservez .';
         $response=new JsonResponse(array('success'=>true,'message'=>$message));

                return $response;

      }else{

       $message='Lieux non disponible pour cette date !!';
         $response=new JsonResponse(array('success'=>true,'message'=>$message));

                return $response;



      }



        }else{


      $msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }



    }



    
  /**
     * @Route("/add-in-session" ,name="add_in_session")
     */
    public function addInSessionAction(Request $request)
    {

          $em=$this->getDoctrine()->getManager();
          $message='';
        
            



        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {
        $id=$request->request->get('id');
        $debut=$request->request->get('debut');
        $fin=$request->request->get('fin');

       

          $this->get('session')->set('id',$id);
         $this->get('session')->set('debut',$debut);
         $this->get('session')->set('fin',$fin);




      

      


      
          
         $response=new JsonResponse(array('success'=>true));

                return $response;

      



        }else{


      $msg="Vérifier date début et date fin .";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }



    }









 /**
     * @Route("/reserver" ,name="reservation_page")
     */
    public function reserverAction(Request $request)
    {

            

           $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {

          $id=$this->get('session')->get('id');
         $debut=$this->get('session')->get('debut');
         $fin=$this->get('session')->get('fin');



         $annonce=$em->getRepository('FrontBundle:Annonce')->find($id);

          return $this->render('FrontBundle:Pages:reservation.html.twig' ,['annonce'=>$annonce,'debut'=>$debut,'fin'=>$fin]);



            
            }
            else{
            

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');

            }

        


       
    }




/**
     * @Route("/lieux-reserver" ,name="confirmer-reservation")
     */
    public function confirmerReservationAction(Request $request)
    {

              $user = $this->container->get('security.token_storage')->getToken()->getUser();
           $em=$this->getDoctrine()->getManager();

           $idAnnoce=$request->request->get('annonce-id');
           $annonce=$em->getRepository('FrontBundle:Annonce')->find($idAnnoce);
           $idClient=$request->request->get('user-id');
           $client=$em->getRepository('AppBundle:User')->find($idClient);
           $loueur=$annonce->getUser();
           $prixTotal=$request->request->get('tarif-total');
           $dateDebut=$request->request->get('dates-debut');
           $dateFin=$request->request->get('dates-fin');
           $nom=$request->request->get('nom');
           $prenom=$request->request->get('prenom');
           $email=$request->request->get('email');
           $telephone=$request->request->get('telephone');
           $ville=$request->request->get('ville');
           $adresse=$request->request->get('adresse');
           $cp=$request->request->get('cp');
           $societe=$request->request->get('societe');
           $services=$request->request->get('ser');
           $equipements=$request->request->get('eq');

           $reservation =new Reservation();

           $reservation->setClient($client);
           $reservation->setAnnonce($annonce);
           $reservation->setLoueur($loueur);
           $reservation->setTarifTotal($prixTotal);
           $reservation->setNom($nom);
           $reservation->setPrenom($prenom);
           $reservation->setEmail($email);
           $reservation->setTelephone($telephone);
           $reservation->setVille($ville);
           $reservation->setAdresse($adresse);
           $reservation->setCp($cp);
           $reservation->setNomsociete($societe);
           $reservation->setEtat('En attente');
            $reservation->setDatereservation(new \DateTime());

    if($services != null && count($services)>0)
  {

     foreach ($services as $serv ) {

        $s=$em->getRepository('FrontBundle:Services')->find($serv);
        
        $reservation->addService($s);

      
     }

  }




    if($equipements != null && count($equipements)>0)
  {

     foreach ($equipements as $eqp ) {

      $eq=$em->getRepository('FrontBundle:Equipement')->find($eqp);
        
        $reservation->addEquipement($eq);

      
     }

  }
 


$newDateDate = \DateTime::createFromFormat('d/m/Y',$dateDebut) ;
$newDateFin= \DateTime::createFromFormat('d/m/Y',$dateFin);

$reservation->setDatedebut($newDateDate);
$reservation->setDateFin($newDateFin);


  $em->persist($reservation);


  $em->flush();
   


         $this->get('session')->set('id','');
         $this->get('session')->set('debut','');
         $this->get('session')->set('fin','');

       
       $message='Votre réservation a été effectuée avec succés ! '; 




             $listeDesReservation=$em->getRepository('FrontBundle:Reservation')->findBy(array('client'=>$user),array('datereservation'=>'DESC'));

                $reservations=$this->get('knp_paginator')->paginate(
        $listeDesReservation,
        
        $request->query->get('page', 1),6);


        return $this->render('FrontBundle:Pages:Lieux-reserver.html.twig',['message'=> $message,'reservations'=>$reservations]);
    }


















































    /**
     * @Route("/annuaire" ,name="annuaire_page")
     */
    public function annuaireAction(Request $request)
    {


$em=$this->getDoctrine()->getManager();

$query=" SELECT u FROM AppBundle:User u where   u.typeHote!= :Particulier AND u.societe IS NOT NULL ";


$requet=$em->createQuery($query)->setParameter('Particulier','Particulier');
 $listeannuaires=$requet->getResult();

  $annuaires=$this->get('knp_paginator')->paginate(
        $listeannuaires,
        
        $request->query->get('page', 1),9);






        return $this->render('FrontBundle:Pages:annuaires.html.twig',['annuaires'=>$annuaires]);
    }






    /**
     * @Route("/services" ,name="services_page")
     */
    public function servicesAction()
    {
        return $this->render('FrontBundle:Pages:services.html.twig');
    }



    /**
     * @Route("/nos-prestataires" ,name="nosprestataire_page")
     */
    public function nosprestatairesAction()
    {
        return $this->render('FrontBundle:Pages:prestataire.html.twig');
    }



      /**
     * @Route("/démarches" ,name="references_page")
     */
    public function referencesAction(Request $request)
    {


        /*  $em=$this->getDoctrine()->getManager();
        $listereferences =$em->getRepository('FrontBundle:Reference')->findBy( array(),array('premiersortie'=>'DESC'));
             $references=$this->get('knp_paginator')->paginate(
        $listereferences,
        
        $request->query->get('page', 1),6);
*/


        return $this->render('FrontBundle:Pages:demarches.html.twig');
    }



    

        /**
     * @Route("/detail-reference-{id}" ,name="detail_reference_page")
     */
    public function detailReferenceAction(Request $request,$id)
    {


       $em=$this->getDoctrine()->getManager();

      $reference=$em->getRepository('FrontBundle:Reference')->find($id);
      $type=$reference->getType();

      $references=$em->getRepository('FrontBundle:Reference')->findBy(array('type'=>$type),array('premiersortie'=>'DESC'),4);

          

        return $this->render('FrontBundle:Pages:details-references.html.twig',['reference'=>$reference,'references'=>$references]);
    }







    
        /**
     * @Route("/profile-locataire-{id}" ,name="profile_locataire_page")
     */
    public function profileLocataireAction(Request $request,$id)
    {


       $em=$this->getDoctrine()->getManager();

      $user=$em->getRepository('AppBundle:User')->find($id);
      

      $listeannonces=$em->getRepository('FrontBundle:Annonce')->findBy(array('user'=>$user),array('createAt'=>'DESC'));



       $annonces=$this->get('knp_paginator')->paginate(
        $listeannonces,
        
        $request->query->get('page', 1),6);
          

        return $this->render('FrontBundle:Pages:profile.html.twig',['user'=>$user,'annonces'=>$annonces]);
    }
























       /**
     * @Route("/chercher" ,name="recherche_lieux_front_page")
     */
    public function rechercheFrontAction(Request $request)
    {


       $em=$this->getDoctrine()->getManager();

       $ville=$request->request->get('ville');
       $mot_cle=$request->request->get('mot_cle');
       $categorie=$request->request->get('categorie');

      $query='';
      
  
      $em=$this->getDoctrine()->getManager();

$query=" SELECT a FROM FrontBundle:Annonce a WHERE a.ville = :ville ";





if($mot_cle!=null)
{
$query.="AND a.titre LIKE % :mot_cle % "; 

}
if($categorie != null)
{


$query.=" INNER JOIN a.categorie c WITH c.id = :categorie ";


}

 $requet=$em->createQuery($query);


if($ville!=null)
{
 $requet->setParameter('ville',$ville);
}



if($mot_cle!=null)
{
 $requet->setParameter('mot_cle',$mot_cle);
}

if($categorie!=null)
{

 $requet->setParameter('categorie',$categorie);

}


 $listeannonces=$requet->getResult();

  $annonces=$this->get('knp_paginator')->paginate(
        $listeannonces,
        
        $request->query->get('page', 1),6);

        return $this->render('FilterBundle:Pages:Liste.html.twig',['Annonces'=>$annonces]);
    }




















      


          /**
     * @Route("/particulier/comment_ça_marche" ,name="particulier_guide_page")
     */
    public function particulierAction()
    {
        return $this->render('FrontBundle:Pages:coment_ca_marche_particulier.html.twig');
    }





    
          /**
     * @Route("/professionel/comment_ça_marche" ,name="professionel_guide_page")
     */
    public function proAction()
    {
        return $this->render('FrontBundle:Pages:coment_ca_marche_pro.html.twig');
    }



          /**
     * @Route("/actualite" ,name="actualite_page")
     */
    public function actualiteAction(Request $request)
    {

       $em=$this->getDoctrine()->getManager();


        $actualites =$em->getRepository('FrontBundle:Actualite')->findBy( array(),array('datepublication'=>'DESC'));
             $annonces=$this->get('knp_paginator')->paginate(
        $actualites,
        
        $request->query->get('page', 1),6);


        return $this->render('FrontBundle:Pages:actualite.html.twig',['annonces'=>$annonces]);
    }


         /**
     * @Route("/detail-actualite-{id}" ,name="detail_actualite_page")
     */
    public function detailActualiteAction(Request $request,$id)
    {


       $em=$this->getDoctrine()->getManager();

      $actualite=$em->getRepository('FrontBundle:Actualite')->find($id);
      $type=$actualite->getType();

      $actualites=$em->getRepository('FrontBundle:Actualite')->findBy(array('type'=>$type),array('datepublication'=>'DESC'),4);



        return $this->render('FrontBundle:Pages:details-actualites.html.twig',['actualite'=>$actualite,'actualites'=>$actualites]);
    }





   
    /**
     * @Route("/user/home" ,name="redirect_user")
     */
    public function redirectionAction(Request $request)
    {
         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

           $reffer=$this->get('session')->get('reffer');
        



if($reffer != null)
{

     $this->get('session')->set('reffer','');

     
     return $this->redirect($this->generateUrl($reffer));
  
}else{

 return $this->render('@Front/Default/content.html.twig');

}



  /*  else{*/

        
 /*   }
*/



}






}
