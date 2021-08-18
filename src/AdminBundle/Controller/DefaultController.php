<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FrontBundle\Entity\Reservation;
use FrontBundle\Entity\Annonce;
use FrontBundle\Entity\Actualite;
use FrontBundle\Form\ActualiteType;
use FrontBundle\Entity\Reference;
use FrontBundle\Entity\Contact;
use FrontBundle\Form\ReferenceType;
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
     * @Route("/admin/dassbord" ,name="admin_page")
     */
    public function adminDashbordAction(Request $request)
    {



         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

        $em=$this->getDoctrine()->getManager();
   


    if((is_object($user) || $user instanceof UserInterface) &&($authchecker->isGranted('ROLE_SUPER_ADMIN')   ))
        {


         
$reservations=$em->getRepository('FrontBundle:Reservation')->findAll();
$countRes=count($reservations);

 $lieux=$em->getRepository('FrontBundle:Annonce')->findAll();
$Clieux=count($lieux);

 $users=$em->getRepository('AppBundle:User')->findAll();
$Cusers=count($users);


          
          return $this->render('AdminBundle:Pages:content.html.twig',['countRes'=>$countRes,'Clieux'=>$Clieux,'Cusers'=>$Cusers]);

        }if((is_object($user) || $user instanceof UserInterface) &&( !$authchecker->isGranted('ROLE_SUPER_ADMIN')))
        {
           
            return $this->redirectToRoute('redirect_user');


          }

        else{

        	return  $this->redirectToRoute('admin_login'); 

        }



}






     /**
     * @Route("/admin/actualite" ,name="admin_actualite_page")
     */
    public function adminActualiteAction(Request $request)
    {



         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

        $em=$this->getDoctrine()->getManager();
   


    if((is_object($user) || $user instanceof UserInterface) &&($authchecker->isGranted('ROLE_SUPER_ADMIN')   ))
        {

          
          return $this->render('AdminBundle:Pages:actualite.html.twig');

        }if((is_object($user) || $user instanceof UserInterface) &&( !$authchecker->isGranted('ROLE_SUPER_ADMIN')))
        {
           
            return $this->redirectToRoute('redirect_user');


          }

        else{

        	return  $this->redirectToRoute('admin_login'); 

        }



}

 /**
     * @Route("/admin/reference" ,name="admin_reference_page")
     */
    public function adminReferenceAction(Request $request)
    {



         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

        $em=$this->getDoctrine()->getManager();
   


    if((is_object($user) || $user instanceof UserInterface) &&($authchecker->isGranted('ROLE_SUPER_ADMIN')   ))
        {

          
          return $this->render('AdminBundle:Pages:reference.html.twig');

        }if((is_object($user) || $user instanceof UserInterface) &&( !$authchecker->isGranted('ROLE_SUPER_ADMIN')))
        {
           
            return $this->redirectToRoute('redirect_user');


          }

        else{

        	return  $this->redirectToRoute('admin_login'); 

        }



}






 /**
     * @Route("/admin/message" ,name="admin_message_page")
     */
    public function adminMessageAction(Request $request)
    {



         $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $authchecker= $this->container->get('security.authorization_checker');

        $em=$this->getDoctrine()->getManager();
   


    if((is_object($user) || $user instanceof UserInterface) &&($authchecker->isGranted('ROLE_SUPER_ADMIN')   ))
        {



          
          return $this->render('AdminBundle:Pages:messages.html.twig');

        }if((is_object($user) || $user instanceof UserInterface) &&( !$authchecker->isGranted('ROLE_SUPER_ADMIN')))
        {
           
            return $this->redirectToRoute('redirect_user');


          }

        else{

          return  $this->redirectToRoute('admin_login'); 

        }



}






















   /**
     * @Route("/admin/liste-actualite",name="liste_actualite")
     */
    public function listeActualiteAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
    {


     $actualites=$em->getRepository('FrontBundle:Actualite')->findBy(array(),array('datepublication' => 'DESC'));
      $output=array('data'=>array());
    
      foreach ($actualites as $actualite) {
 $id =$actualite->getId();
 $imageurl='Uploads/'.$actualite->getImage(); 


                  




            $image='<img src= '.$this->container->get('assets.packages')->getUrl($imageurl).' class="img-fluid" alt="" width="50" height="50" style="border-radius:50%">';

$categorie='<span class="label label-success">'.$actualite->getType().'</span>';

$datePublication=$actualite->getDatepublication()->format('d-m-Y');



     





$button=' <div  class="text-center">
                     


                    

                    <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('modifier_actualite', 
                        array('id' =>$id)).'" ><i class="fa fa-pencil-square-o"></i> Modifier</a> 

                  <button class="btn  btn-default btn-sm"  data-toggle="modal" data-target="#supprimerActualiteModal" onclick="supprimerActualite('.$id.')" style="margin-left:5px;"><i class="fa fa-trash-o"></i> Supprimer</button></div>';



$output['data'][]=array(


 $image,
 $categorie,
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
     * @Route("/admin/liste-reference",name="liste_reference")
     */
    public function listeReferenceAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
    {


     $references=$em->getRepository('FrontBundle:Reference')->findBy(array(),array('datepublication' => 'DESC'));
      $output=array('data'=>array());
    
      foreach ($references as $reference) {
 $id =$reference->getId();
 $imageurl='Uploads/'.$reference->getImage(); 


                  




            $image='<img src= '.$this->container->get('assets.packages')->getUrl($imageurl).' class="img-fluid" alt="" width="50" height="50" style="border-radius:50%">';

$categorie='<span class="label label-success">'.$reference->getType().'</span>';

$pays=$reference->getPays();
$dateSortie=$reference->getPremiersortie()->format('d-m-Y');
$datePublication=$reference->getDatepublication()->format('d-m-Y');



     





$button=' <div  class="text-center">
                     


                    

                    <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('modifier_reference', 
                        array('id' =>$id)).'" ><i class="fa fa-pencil-square-o"></i> Modifier</a> 

                  <button class="btn  btn-default btn-sm"  data-toggle="modal" data-target="#supprimerReferenceModal" onclick="supprimerReference('.$id.')" style="margin-left:5px;"><i class="fa fa-trash-o"></i> Supprimer</button></div>';



$output['data'][]=array(


 $image,
 $categorie,
 $dateSortie,
 $pays,

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
     * @Route("/admin/liste-message",name="liste_message")
     */
    public function listeMessageAction(Request $request)
    {

      $em = $this->getDoctrine()->getManager();
      $output='';
      $status='';

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
    {


     $contacts=$em->getRepository('FrontBundle:Contact')->findBy(array(),array('datepublication' => 'DESC'));
      $output=array('data'=>array());
    
      foreach ($contacts as $contact) {
 $id =$contact->getId();
 $info='<a href="#">'.$contact->getNom().' '.$contact->getPrenom().'</a>';

$objet=$contact->getObjet();

$datePublication=$contact->getDatepublication()->format('d-m-Y');
$etat=$contact->getEtat();


if($etat=='Nouveau') 
{
  $status='<sapn class="label label-danger">'.$etat.'</span>';
}elseif($etat=='Répondu')                 
{
$status='<sapn class="label label-success">'.$etat.'</span>';
}else{
  $status='<sapn class="label label-info">'.$etat.'</span>';
}






     





$button=' <div  class="text-center">
                     


                    

                    <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('modifier_reference', 
                        array('id' =>$id)).'" ><i class="fa fa-eye"></i></a> 

                     <a class="btn  btn-default btn-sm"  href="'.$this->get('router')->generate('modifier_reference', 
                        array('id' =>$id)).'" style="margin-left:5px;"><i class="fa fa-reply"></i></a>

                 </div>';



$output['data'][]=array(


 $info,
 $objet,
 $datePublication,
 $status,
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
     * @Route("/admin/contacter",name="contacter_admin")
     */
    public function contacterAdminAction(Request $request)
    {

    
      $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $nom=$request->request->get('nom');
              $prenom=$request->request->get('prenom');
              $objet=$request->request->get('objet');
              $email=$request->request->get('email');
              $telephone=$request->request->get('telephone');
              $message=$request->request->get('message');

               $contact=new Contact();
               $contact->setNom($nom);
                $contact->setPrenom($prenom);
                 $contact->setObjet($objet);
                  $contact->setEmail($email);
                   $contact->setTelephone($telephone);
                   $contact->setMessage($message);

                   $contact->setEtat('Nouveau');
                   $contact->setDatepublication(new \DateTime());
              

           
               $em->persist($contact);
                $em->flush();

              $message='Message envoyer avec succèss';

              

               
                $response=new JsonResponse(['success'=>true,'message'=>$message]);

                return $response;




             
              

           }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }




      
 


}

































 /**
     * @Route("/admin/delete-actualite",name="delete_actualite")
     */
    public function deleteActualiteAction(Request $request)
    {

    
      $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $id=$request->request->get('id');
              if($id!=null)
              {

               $annonce=$em->getRepository('FrontBundle:Actualite')->find($id);

           
               $em->remove($annonce);
                $em->flush();

              $message='Actualite supprimer avec succéss';

              

               
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
     * @Route("/admin/delete-reference",name="delete_reference")
     */
    public function deleteReferenceAction(Request $request)
    {

    
      $em=$this->getDoctrine()->getManager();


                 if($request->isMethod('POST')  && $request->isXmlHttpRequest())
             {


              $id=$request->request->get('id');
              if($id!=null)
              {

               $reference=$em->getRepository('FrontBundle:Reference')->find($id);

           
               $em->remove($reference);
                $em->flush();

              $message='Réference supprimer avec succéss';

              

               
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
     * @Route("/admin/ajouter-actualite",name="ajouter_actualite")
     */
    public function ajouterActualiteAction(Request $request)
    {

      $entityManager = $this->getDoctrine()->getManager();

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
    {
     
          $actualite = new Actualite();


    $form = $this->createForm(new ActualiteType(),$actualite);
        
    $form->handleRequest($request);

    if ($form->isSubmitted()) {

       if  ($form->isValid())
         {

       if($form['image']->getData() != null)
       {
          $file =$form['image']->getData();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $actualite->setImage($fileName);




     }

     

 $actualite->setDatepublication(new \DateTime());




      $entityManager->persist($actualite);


      $entityManager->flush();



     

      if($request->isXmlHttpRequest())
                     {

                        $msg='Actualite ajouter avec succéss ! ';
                        $response=new JsonResponse(array('success'=>true,'message'=>$msg));

                     }


}

     else{

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

                $msg="vouillez rensigner tous les champs";
                $response=new JsonResponse(['success'=>false,'message'=>$msg,'errors'=>$errorsArray]);
             }

          }




      return $response;
    


    }
       



    return $this->render('AdminBundle:Pages:addActualite.html.twig', [
        'form' => $form->createView()
    ]);  


    }
    else{
       $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('admin_login'));
    
    }



}




     /**
     * @Route("/admin/ajouter-reference",name="ajouter_reference")
     */
    public function ajouterReferenceAction(Request $request)
    {

      $entityManager = $this->getDoctrine()->getManager();

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    
   
    $authchecker= $this->container->get('security.authorization_checker');
    if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
    {
     
          $reference = new Reference();


    $form = $this->createForm(new ReferenceType(),$reference);
        
    $form->handleRequest($request);

    if ($form->isSubmitted()) {

       if  ($form->isValid())
         {

       if($form['image']->getData() != null)
       {
          $file =$form['image']->getData();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $reference->setImage($fileName);




     }
  $datesortie=$request->request->get('premier-sortie');

  $newDate = \DateTime::createFromFormat('d/m/Y',$datesortie) ;
  $reference->setPremiersortie($newDate);
     

 $reference->setDatepublication(new \DateTime());




      $entityManager->persist($reference);


      $entityManager->flush();



     

      if($request->isXmlHttpRequest())
                     {

                        $msg='Référence ajouter avec succéss ! ';
                        $response=new JsonResponse(array('success'=>true,'message'=>$msg));

                     }


}

     else{

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

                $msg="vouillez rensigner tous les champs";
                $response=new JsonResponse(['success'=>false,'message'=>$msg,'errors'=>$errorsArray]);
             }

          }




      return $response;
    


    }
       



    return $this->render('AdminBundle:Pages:addReference.html.twig', [
        'form' => $form->createView()
    ]);  


    }
    else{
       $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('admin_login'));
    
    }



}
















































    
     /**
     * @Route("/admin/modifier-actualite-{id}" ,name="modifier_actualite")
     */
    public function ModifierActualiteAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
            {

             
            

            $actualite=$em->getRepository('FrontBundle:Actualite')->find($id); 
            $ancienimage=$actualite->getImage();
            $idactualite=$actualite->getId();
          

 

           $form = $this->createForm(new ActualiteType(),$actualite);

 $form->handleRequest($request);

 if ($form->isSubmitted() )
 {

  if ($form->isValid()) {



 if($form['image']->getData() != null )
       {
         

         


         $file =$form['image']->getData();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $actualite->setImage($fileName);










           




     }














 $actualite->setDatepublication(new \DateTime());


   $em->persist($actualite);


      $em->flush();









  $this->get('session')->getFlashBag()->add('ModificationSuccess','Annonce modifier avec succèss !!');
       return $this->redirect( $this->generateUrl('admin_actualite_page'));






 
}


}





        return $this->render('AdminBundle:Pages:modifierActualite.html.twig',['form'=>$form->createView(),'image'=>$ancienimage,'id'=>$idactualite]);



 


            }


            else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('admin_login');



            }





    }






    
     /**
     * @Route("/admin/modifier-reference-{id}" ,name="modifier_reference")
     */
    public function ModifierReferenceAction(Request $request,$id)
    {

         $em=$this->getDoctrine()->getManager();
              $user = $this->container->get('security.token_storage')->getToken()->getUser();
  
   
    $authchecker= $this->container->get('security.authorization_checker');
            
            if((is_object($user) || $user instanceof UserInterface) &&  ($authchecker->isGranted('ROLE_SUPER_ADMIN')))
            {

             
            

            $reference=$em->getRepository('FrontBundle:Reference')->find($id); 
            $ancienimage=$reference->getImage();
            $idreference=$reference->getId();
            $datesortie=$reference->getPremiersortie()->format('d-m-Y');

 

           $form = $this->createForm(new ReferenceType(),$reference);

 $form->handleRequest($request);

 if ($form->isSubmitted() )
 {

  if ($form->isValid()) {



 if($form['image']->getData() != null )
       {
         

         


         $file =$form['image']->getData();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );

         $reference->setImage($fileName);










           




     }






$datesorties=$request->request->get('premier-sortie');

  $newDate = \DateTime::createFromFormat('d/m/Y',$datesorties) ;
  $reference->setPremiersortie($newDate);







 $reference->setDatepublication(new \DateTime());


   $em->persist($reference);


      $em->flush();









  $this->get('session')->getFlashBag()->add('ModificationSuccess','Annonce modifier avec succèss !!');
       return $this->redirect( $this->generateUrl('admin_reference_page'));






 
}


}





        return $this->render('AdminBundle:Pages:modifierReference.html.twig',['form'=>$form->createView(),'image'=>$ancienimage,'id'=>$idreference,'datesortie'=>$datesortie]);



 


            }


            else{

             $this->get('session')->set('reffer',$request->attributes->get('_route'));
           
            $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté  !!!');
            return $this->redirectToRoute('admin_login');



            }





    }






































































































}