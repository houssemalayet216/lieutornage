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
use FrontBundle\Entity\Notification;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class DefaultController extends Controller
{
    /**
     * @Route("/Tableau-de-bord " ,name="tableau_de_bord_page")
     */
    public function tableauDeBordAction(Request $request)
    {
     
        $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');

   

            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PROFESSIONEL')))
            {
                  
 $reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array('client'=>$user),array('datereservation'=>'DESC'),5);

                  $reservationEffectues=$em->getRepository('FrontBundle:Reservation')->findBy(array('client'=>$user));
$countResEfectue=count($reservationEffectues);

 $reservationEnAttente=$em->getRepository('FrontBundle:Reservation')->findBy(array('client'=>$user,'etat'=>'En attente'));
$countResEnAttente=count($reservationEnAttente);

 $reservationEnCours=$em->getRepository('FrontBundle:Reservation')->findBy(array('client'=>$user,'etat'=>'En cours'));
$countResEnCours=count($reservationEnCours);
           
               return $this->render('BackBundle:Professionel:dashbord.html.twig',['countResEfectue'=>$countResEfectue,'reservationEnAttente'=>$reservationEnAttente,'countResEnCours'=>$countResEnCours,'reservations'=>$reservations]);


            }elseif((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER'))){
              


$reservations=$em->getRepository('FrontBundle:Reservation')->findBy(array('loueur'=>$user),array('datereservation'=>'DESC'),5);

                 $reservationEffectues=$em->getRepository('FrontBundle:Reservation')->findBy(array('loueur'=>$user));
$countResEfectue=count($reservationEffectues);

 $lieux=$em->getRepository('FrontBundle:Annonce')->findBy(array('user'=>$user));
$Clieux=count($lieux);

 $reservationEnCours=$em->getRepository('FrontBundle:Reservation')->findBy(array('loueur'=>$user,'etat'=>'En cours'));
$countResEnCours=count($reservationEnCours);





               return $this->render('BackBundle:Particulier:dashbord.html.twig',['countResEfectue'=>$countResEfectue,'Clieux'=>$Clieux,'countResEnCours'=>$countResEnCours,'reservations'=>$reservations]);
        


            }else{


            	 $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');


            }
      



        
    }




   /**
     * @Route("/Profile " ,name="profile_page")
     */
    public function profileAction(Request $request)
    {
     
        $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
              $anciennlogo=$user->getPhoto();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || ($user instanceof UserInterface)))

              {
                




$form=$this->createFormBuilder($user)
->add('nom',new TextType())
->add('prenom',new TextType())
->add('username',new TextType())
->add('email',new TextType())
->add('telephone',new TextType())
->add('adresse',new TextType())
->add('cp',new TextType())
 ->add('ville', new TextType())
->add('fonction', new TextType())
->add('societe', new TextType())
->add('telephone', new NumberType())

->add('civilite', new ChoiceType(),
            [
                'label' => 'Civilité:',
                'required' => true,
                'choices' => array(
                    'M.' => 'M.',
                    'Mme.' => 'Mme.',
                    'Mlle.'=>'Mlle'
                    
                   
                )
            ]
        )


->add('photo', new FileType(), array('label' => 'Votre Image','data_class' => null))
->getForm();
$form->handleRequest($request);
if($form->isSubmitted() ){
if( $form->isValid()){

           if($form['photo']->getData() != null)
       {
          $file =$form['photo']->getData();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $user->setPhoto($fileName);
     }else{

     $user->setPhoto($anciennlogo);
 }

//$userManager = $container->get('fos_user.user_manager');
 $this->get('fos_user.user_manager')->updateUser($user, false);

        // make more modifications to the database

        $this->getDoctrine()->getManager()->flush();



    if($request->isXmlHttpRequest())
                     {

                        $msg='Compte Modifier Successfely';
                        $response=new JsonResponse(array('success'=>true,'message'=>$msg));

                     }


                  

    }elseif($request->isXmlHttpRequest())
             {

                $formErrors=$this->get('validator')->validate($form);
                $errorsArray=[];

                foreach ($formErrors  as $error) {
                    
                    $errorsArray[]=array(
                       'elementId'=>$error->getPropertyPath(),
                       'errorMessage'=>$error->getMessage(),

                      
                    );

                }

                $msg="vouillez rensigner tous les champs";
                $response=new JsonResponse(['success'=>false,'message'=>$msg,'errors'=>$errorsArray]);
             }

      return $response;
    }

















            if($authchecker->isGranted('ROLE_PROFESSIONEL') ){

           
          return $this->render('BackBundle:Professionel:profile.html.twig',['form'=>$form->createView(),'user'=>$user]);


            }elseif($authchecker->isGranted('ROLE_PARTICULIER')){
              



            
           return $this->render('BackBundle:Particulier:profile.html.twig',['form'=>$form->createView(),'user'=>$user]);


            }else{


                 $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');


            }


              } else{


                 $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');


            }
      



        
    }





   
   /**
     * @Route("/publier-lieux " ,name="publier_lieux_page")
     */
    public function publierLieuxAction(Request $request)
    {
     
        $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_PARTICULIER')))
            {

           
               return $this->render('BackBundle:Professionel:proposerLieu.html.twig');


           }else{


                 $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('fos_user_security_login');


            }
      



        
    }






     /**
     * @Route("/annuler-reservation " ,name="annuler_reservation")
     */
    public function annulerReservationAction(Request $request)
    {
     

     
       $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $id=$request->request->get('id');
              if($id!=null)
              {

               $reservation=$em->getRepository('FrontBundle:Reservation')->find($id);

           
              $reservation->setEtat('Annuler');
              $em->persist($reservation);
              $em->flush();



              
                 $requestAttributes = $this->container->get('request')->attributes;

                 if ($requestAttributes->get('_route') == 'reservation_hote') {

                    
                   $usernotif=$reservation->getClient();
                   $loueur=$reservation->getLoueur();

                     $notification=new Notification();
     $notification->setSubject('Annulation  du reservation');
     $text=$loueur->getCivilite().' '.$loueur->getNom().' '.$loueur->getPrenom().' a annuler la réservation du '.$reservation->getDatereservation()->format("d/m/Y");
     $notification->setNotificationText($text);
     $notification->setStatus(0);
     $notification->setCreatedAt(new \DateTime());
     $notification->setUser($usernotif);
     $em->persist($notification);
     $em->flush();

                    

                 }else{



                 $usernotif=$reservation->getLoueur();
                   $client=$reservation->getClient();

                     $notification=new Notification();
     $notification->setSubject('Annulation  du reservation');
     $text=$client->getCivilite().' '.$client->getNom().' '.$client->getPrenom().' a annuler la réservation du '.$reservation->getDatereservation()->format("d/m/Y");
     $notification->setNotificationText($text);
     $notification->setStatus(0);
     $notification->setCreatedAt(new \DateTime());
     $notification->setUser($usernotif);
     $em->persist($notification);
     $em->flush();






                 }















              $message='Reservation annuler succesfely ';








              

               
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
     * @Route("/confirmer-reservation " ,name="confirmer_reservation")
     */
    public function confirmerReservationAction(Request $request)
    {
     

     
       $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $id=$request->request->get('id');
              if($id!=null)
              {

               $reservation=$em->getRepository('FrontBundle:Reservation')->find($id);

           
              $reservation->setEtat('En cours');
              $em->persist($reservation);
              $em->flush();


                     $usernotif=$reservation->getClient();
                   $loueur=$reservation->getLoueur();

                     $notification=new Notification();
     $notification->setSubject('Confirmation  du reservation');
     $text=$loueur->getCivilite().' '.$loueur->getNom().' '.$loueur->getPrenom().' a confirmer la réservation du '.$reservation->getDatereservation()->format("d/m/Y");
     $notification->setNotificationText($text);
     $notification->setStatus(0);
     $notification->setCreatedAt(new \DateTime());
     $notification->setUser($usernotif);
     $em->persist($notification);
     $em->flush();





              $message='Reservation confirmer successfuly ';

              

               
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























}
