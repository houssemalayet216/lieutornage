<?php

namespace FilterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/Liste-lieux",name="liste_Lieux")
     */
    public function indexAction(Request $request)
    {
        



       $em=$this->getDoctrine()->getManager();




    $environments=$em->getRepository('FrontBundle:Environments')->findBy(array(),array('id'=>'ASC'),4);
    $decorations=$em->getRepository('FrontBundle:Decoration')->findBy(array(),array('id'=>'ASC'),4);
    
     $equipements=$em->getRepository('FrontBundle:Equipement')->findBy(array(),array('id'=>'ASC'),4);
    $services=$em->getRepository('FrontBundle:Services')->findBy(array(),array('id'=>'ASC'),4);




  $env_maison=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 1),array('id'=>'ASC'),4);
          $env_appartement=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 2),array('id'=>'ASC'),4);
          $env_exterieur=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 3),array('id'=>'ASC'),4);
          $env_environment=$em->getRepository('FrontBundle:Environments')->findBy( array('type' => 4),array('id'=>'ASC'),4);





    $dec_epoque=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 1),array('id'=>'ASC'),4);
          $dec_style=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 2),array('id'=>'ASC'),4);
          $dec_ambiance=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 3),array('id'=>'ASC'),4);
          $dec_origine=$em->getRepository('FrontBundle:Decoration')->findBy( array('typeDecoration' => 4),array('id'=>'ASC'),4);

          
      
          $annonces =$em->getRepository('FrontBundle:Annonce')->findBy( array(),array('id'=>'DESC'));
             $ListeAnnonces=$this->get('knp_paginator')->paginate(
        $annonces,
        
        $request->query->get('page', 1),6);


        return $this->render('FilterBundle:Pages:Liste.html.twig',['Annonces'=>$ListeAnnonces]);
    }


 /**
     * @Route("/load-more-environment",name="load_more_environment")
     */
    public function loadEnvironmentAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $cle='';
       $em=$this->getDoctrine()->getManager();

       $id_env=$request->request->get('last_env_id');

       if($id_env !==null)
       {
          
          $query="SELECT e FROM FrontBundle:Environments e WHERE  e.id > :id  "; 
          $requet=$em->createQuery($query)->setParameter('id',$id_env);
            $requet->setMaxResults(4);
          $annonces=$requet->getResult();

          if(count($annonces)>0)
          
           {

          foreach ($annonces as $annonce) {
          
          $cle=$annonce->getId();
           
        $output.='


           <li>
                  


                   <div class="checkboxest">
                        <label class="container_check">'.$annonce->getTitre().'
                          <input type="checkbox" value='.$annonce->getId().' name="env[]">
                          <span class="checkmark"></span>
                        </label>
                    </div>

';

      }   


      $response=new JsonResponse(array('output'=>$output,'cle'=>$cle));

                return $response;



}else{



$msg="Aucun clé trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


}








       }
       else{


          $msg="Aucune data trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


       }



     }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }





   
 /**
     * @Route("/load-more-decoration",name="load_more_decoration")
     */
    public function loadDecorationAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $cle='';
       $em=$this->getDoctrine()->getManager();

       $id_dec=$request->request->get('last_dec_id');

       if($id_dec !==null)
       {
          
          $query="SELECT d FROM FrontBundle:Decoration d WHERE  d.id > :id  "; 
          $requet=$em->createQuery($query)->setParameter('id',$id_dec);
            $requet->setMaxResults(4);
          $annonces=$requet->getResult();

          if(count($annonces)>0)
          
           {

          foreach ($annonces as $annonce) {
          
          $cle=$annonce->getId();
           
        $output.='


           <li>
                  


                   <div class="checkboxest">
                        <label class="container_check">'.$annonce->getTitre().'
                          <input type="checkbox" value='.$annonce->getId().' name="dec[]">
                          <span class="checkmark"></span>
                        </label>
                    </div>

';

      }   


      $response=new JsonResponse(array('output'=>$output,'cle'=>$cle));

                return $response;



}else{



$msg="Aucun clé trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


}








       }
       else{


          $msg="Aucune data trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


       }



     }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }





   
 /**
     * @Route("/load-more-equipement",name="load_more_equipement")
     */
    public function loadEquipementAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $cle='';
       $em=$this->getDoctrine()->getManager();

       $id_eq=$request->request->get('last_eq_id');

       if($id_eq !==null)
       {
          
          $query="SELECT e FROM FrontBundle:Equipement e WHERE  e.id > :id  "; 
          $requet=$em->createQuery($query)->setParameter('id',$id_eq);
            $requet->setMaxResults(4);
          $annonces=$requet->getResult();

          if(count($annonces)>0)
          
           {

          foreach ($annonces as $annonce) {
          
          $cle=$annonce->getId();
           
        $output.='


           <li>
                  


                   <div class="checkboxest">
                        <label class="container_check">'.$annonce->getTitre().'
                          <input type="checkbox" value='.$annonce->getId().' name="eq[]">
                          <span class="checkmark"></span>
                        </label>
                    </div>

';

      }   


      $response=new JsonResponse(array('output'=>$output,'cle'=>$cle));

                return $response;



}else{



$msg="Aucun clé trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


}








       }
       else{


          $msg="Aucune data trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


       }



     }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }







  
 /**
     * @Route("/load-more-services",name="load_more_services")
     */
    public function loadServicesAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $cle='';
       $em=$this->getDoctrine()->getManager();

       $id_ser=$request->request->get('last_ser_id');

       if($id_ser !==null)
       {
          
          $query="SELECT s FROM FrontBundle:Services s WHERE  s.id > :id  "; 
          $requet=$em->createQuery($query)->setParameter('id',$id_ser);
            $requet->setMaxResults(4);
          $annonces=$requet->getResult();

          if(count($annonces)>0)
          
           {

          foreach ($annonces as $annonce) {
          
          $cle=$annonce->getId();
           
        $output.='


           <li>
                  


                   <div class="checkboxest">
                        <label class="container_check">'.$annonce->getTitre().'
                          <input type="checkbox" value='.$annonce->getId().' name="ser[]">
                          <span class="checkmark"></span>
                        </label>
                    </div>

';

      }   


      $response=new JsonResponse(array('output'=>$output,'cle'=>$cle));

                return $response;



}else{



$msg="Aucun clé trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


}








       }
       else{


          $msg="Aucune data trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


       }



     }else{$msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }









  
 /**
     * @Route("/afficher_categories",name="afficher_categories")
     */
    public function afficherCategorieAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
       
       $em=$this->getDoctrine()->getManager();

       $id_opt=$request->request->get('opt');

       if($id_opt !==null)
       {
          
           $options=$em->getRepository('AppBundle:sousCategories')->findBy(array('categorie'=>$id_opt),array('id'=>'ASC'));

           $output.='<option value="">Type de  Lieux</option>';
          foreach ($options as $option) {
          
          
           
        $output.='


          <option value='.$option->getId().'>'.$option->getTitre().'</option>';

      }   


      $response=new JsonResponse(array('output'=>$output));

                return $response;



}else{



$msg="Aucun clé trouver";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;


}








       }
       



     else{


      $msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }










 /**
     * @Route("/rechercher_lieux",name="recherche_lieux")
     */
    public function rechercheLieuxAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $query='';
        $page='';
        $record_per_page=6;



       
       $em=$this->getDoctrine()->getManager();

       if($request->request->get('page')!=null)
       {
         $page=$request->request->get('page');
       }else{
        $page=1;
       }


       $start_from=($page-1)*$record_per_page;

       $mot_cle=$request->request->get('mot_recherche');
       
       $ville_adresse=$request->request->get('ville_recherche');
       
       $categorie=$request->request->get('categorie_recherche');

       $sous_categorie=$request->request->get('typlieux_recherche');

      $surface_totale=$request->request->get('surface_totale_recherche');

      $surface_piece=$request->request->get('surface_piece_recherche');

       $nombre_piece=$request->request->get('nombre_piece_recherche');

       $nombre_niveau=$request->request->get('nombre_niveau_recherche');
       $whereCategory='';
       $whereSous='';


       
     $query.=" SELECT a FROM FrontBundle:Annonce a ";

     

        if($categorie!= null)
        {
          
          $query.="INNER JOIN a.categorie  c ";


          $whereCategory= " c.id = :categorie";

        
        }


        if($sous_categorie != null)
        {
          
          $query.="INNER JOIN a.sousCategorie  s ";


          $whereSous= " s.id = :sous_categorie";

        
        }





       if($ville_adresse !=null && $ville_adresse !='' )
       {

          $query.="WHERE  a.ville = :ville_adresse or a.adresse= :ville_adresse    ";  


       }







       if($surface_totale !=null && $surface_totale !='' )
       {

          $query.=" AND  a.surfaceTotale = :surface_totale     ";  


       }


       if($surface_piece !=null && $surface_piece !='' )
       {

          $query.=" AND  a.surfacePiece = :surface_piece     ";  


       }



       if($nombre_piece !=null && $nombre_piece !='' )
       {

          $query.=" AND  a.nbrPiece = :nombre_piece     ";  


       }


       if($nombre_niveau !=null && $nombre_niveau !='' )
       {

          $query.=" AND  a.nbrNiveau = :nombre_niveau    ";  


       }

        if($mot_cle !='' and $mot_cle !=null)
       {

          $query.=" AND a.titre Like  :mot_cle    ";  


       }


     if($categorie!= null)
        {

         $query .=" AND ".$whereCategory;

        }


      if($sous_categorie!= null)
        {

         $query .=" AND ".$whereSous;

        }

     





        $requet=$em->createQuery($query);


         if($ville_adresse !=null ){
          
          $requet->setParameter('ville_adresse',$ville_adresse);



         }

         if($surface_totale !=null ){
          
          $requet->setParameter('surface_totale',$surface_totale);
          


         }

         if($surface_piece !=null ){
          
          $requet->setParameter('surface_piece',$surface_piece);
          


         }

         if($nombre_piece !=null ){
          
          $requet->setParameter('nombre_piece',$nombre_piece);
          


         }

          if($nombre_niveau !=null ){
          
          $requet->setParameter('nombre_niveau',$nombre_niveau);
          


         }

          if($mot_cle !=null ){
          
          $requet->setParameter('mot_cle',$mot_cle);
          


         }



          if($categorie !=null ){
          
          $requet->setParameter('categorie',$categorie);
          


         }


            if($sous_categorie !=null ){
          
          $requet->setParameter('sous_categorie',$sous_categorie);
          


         }


           
      if( $ville_adresse != null && $categorie !=null )
      {

        $countResult=$requet->getResult();
        $total_result=$requet->setMaxResults(6)->setFirstResult($start_from);
        $resultat=$total_result->getResult();
       /* $ListeAnnonces=$this->get('knp_paginator')->paginate(
        $resultat,
        
        $request->query->get('page', 1),6)*/
        $count=count($countResult);
        
        if($count>0 )
        {
         

       foreach($resultat as $annonce)
       {
        

         
 $output.='






              <div class="col-md-6 isotope-item popular">
                <div class="box_grid">
                  <figure>
                    <a href="#0" class="wish_bt"></a>
                    <a href="'.$this->generateUrl("details_page", array("id"=>$annonce->getId())).'">';

                  
                   $path='Uploads/'.$annonce->getGallerie()->first()->getImage();

                  




            $output.='<img src= '.$this->container->get('assets.packages')->getUrl($path).' class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Voir détails</span></div></a>

                    
                    
                  </figure>
                  <div class="wrapper">
                    
                    <h3 style="margin-bottom:0;"><a href="'.$this->generateUrl("details_page", array("id"=>$annonce->getId())).'">'.$annonce->getTitre().'</a></h3>
                   
                         <a href="#"><div ><span class="card-text-color"><i class="icon-location card-icon-color">  </i>'.$annonce->getAdresse().' ,'.$annonce->getVille().' , '.$annonce->getCp().' </span></div></a>

                                        <p class="caracteristique">
                                        '.$annonce->getDescription().'
                                        </p>


                                          <div class="card-div"><span class="card-text-color"> '.$annonce->getTarif().' DT/ '.$annonce->getTypeTarification().' </span></div>

                    
                  </div>
                  <ul>
                    <li><a href="'.$this->generateUrl("profile_locataire_page", array("id"=>$annonce->getUser()->getId())).'" style="color:#888888"><i class="icon-user card-icon-color"></i> '.$annonce->getUser()->getNom().' '.$annonce->getUser()->getPrenom().'  </a></li>
                    <li><span class="card-text-color"><i class="icon-calendar-empty card-icon-color" ></i> il ya 2 jours</span></li>
                  </ul>
                </div>
              </div>




 ';


$total_pages=ceil($count/$record_per_page);
  
if($count>6)
{



$output.='<div class="text-center paginate-margin" >
         <nav aria-label="..." class="text-center">
            <ul class="pagination pagination-sm text-center">';
             for($i=1;$i<$total_pages;$i++)
             {
               $output.='<li class="page-item"><a class="page-link navigation-recherche" id='.$i.' >'.$i.'</a></li>';
             }
             
            
             
          $output.= ' </ul>
          </nav>
        </div>';




}






       }

        
          $response=new JsonResponse(array('success'=>true,'output'=>$output));

                return $response;
       }

       else{

         $msg="Aucune Annonce trouver !";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;

       

       }


     



      }else{


      $msg="données non complete !";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }





       
}


     else{


      $msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }









 /**
     * @Route("/filter-lieux",name="filter_lieux")
     */
    public function filterLieuxAction(Request $request)
    {
        if($request->isMethod('POST')  && $request->isXmlHttpRequest())
       {

        $output='';
        $query='';
        $page='';
        $record_per_page=6;



       
       $em=$this->getDoctrine()->getManager();

       if($request->request->get('page')!=null)
       {
         $page=$request->request->get('page');
       }else{
        $page=1;
       }


       $start_from=($page-1)*$record_per_page;

       $environment=$request->request->get('environment');
       
       $decoration=$request->request->get('decoration');
       
       $equipement=$request->request->get('equipement');

       $service=$request->request->get('service');
        
        $environment_filter='';
        $decoration_filter='';
        $equipement_filter='';
        $service_filter='';
       


       
     $query.=" SELECT a FROM FrontBundle:Annonce a ";

     

    if($request->request->get('environment') != null)
    {

      $environment_filter=implode("','",$request->request->get('environment'));
      $query.=" INNER JOIN a.environment e WITH e.id IN(:environment_filter)"; 




    }


      if($request->request->get('decoration') != null)
    {

      $decoration_filter=implode("','",$request->request->get('decoration'));
      $query.=" INNER JOIN a.decoration d WITH d.id IN(:decoration_filter)"; 




    }



       if($request->request->get('equipement') != null)
    {

      $equipement_filter=implode("','",$request->request->get('equipement'));
      $query.=" INNER JOIN a.equipement eq WITH eq.id IN(:equipement_filter)"; 




    }

        if($request->request->get('service') != null)
    {

      $service_filter=implode("','",$request->request->get('service'));
      $query.=" INNER JOIN a.service ser WITH ser.id IN(:service_filter)"; 




    }




     





        $requet=$em->createQuery($query);


         if($environment_filter !=null ){
          
          $requet->setParameter('environment_filter',$environment_filter);



         }

         if($decoration_filter !=null ){
          
          $requet->setParameter('decoration_filter',$decoration_filter);
          


         }

         if($equipement_filter !=null ){
          
          $requet->setParameter('equipement_filter',$equipement_filter);
          


         }

         if($service_filter !=null ){
          
          $requet->setParameter('equipement_filter',$equipement_filter);
          


         }

        


           
     
        $countResult=$requet->getResult();
        $total_result=$requet->setMaxResults(6)->setFirstResult($start_from);
        $resultat=$total_result->getResult();
       /* $ListeAnnonces=$this->get('knp_paginator')->paginate(
        $resultat,
        
        $request->query->get('page', 1),6)*/
        $count=count($countResult);
        
        if($count>0 )
        {
         

       foreach($resultat as $annonce)
       {
        

         
 $output.='






              <div class="col-md-6 isotope-item popular">
                <div class="box_grid">
                  <figure>
                    <a href="#0" class="wish_bt"></a>
                    <a href="hotel-detail.html">';

                  
                   $path='Uploads/'.$annonce->getGallerie()->first()->getImage();

                  




            $output.='<img src= '.$this->container->get('assets.packages')->getUrl($path).' class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Voir détails</span></div></a>

                    
                    
                  </figure>
                  <div class="wrapper">
                    
                    <h3 style="margin-bottom:0;"><a href="'.$this->generateUrl("details_page", array("id"=>$annonce->getId())).'">'.$annonce->getTitre().'</a></h3>
                   
                         <a href="#"><div ><span class="card-text-color"><i class="icon-location card-icon-color">  </i>'.$annonce->getAdresse().' ,'.$annonce->getVille().' , '.$annonce->getCp().' </span></div></a>

                                        <p class="caracteristique">
                                        '.$annonce->getDescription().'
                                        </p>


                                          <div class="card-div"><span class="card-text-color"> '.$annonce->getTarif().' DT/ '.$annonce->getTypeTarification().' </span></div>

                    
                  </div>
                  <ul>
                    <li><a href="'.$this->generateUrl("profile_locataire_page", array("id"=>$annonce->getUser()->getId())).'" style="color:#888888"><i class="icon-user card-icon-color"></i> '.$annonce->getUser()->getNom().' '.$annonce->getUser()->getPrenom().'  </a></li>
                    <li><span class="card-text-color"><i class="icon-calendar-empty card-icon-color" ></i> il ya 2 jours</span></li>
                  </ul>
                </div>
              </div>




 ';









       }



      $total_pages=ceil($count/$record_per_page);
  
if($count>6)
{



$output.='<div class="text-center paginate-margin" style="margin-left:250px;" >
         <nav aria-label="..." class="text-center">
            <ul class="pagination pagination-sm text-center">';
             for($i=1;$i<=$total_pages;$i++)
             {
               $output.='<li class="page-item"><a class="page-link navigation-filter" id='.$i.' >'.$i.'</a></li>';
             }
             
            
             
          $output.= ' </ul>
          </nav>
        </div>';




}










        
          $response=new JsonResponse(array('success'=>true,'output'=>$output));

                return $response;
       }

       else{

         $msg="Aucune Annonce trouver !";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;

       

       }


     








       
}


     else{


      $msg="Eureur";
                $response=new JsonResponse(['success'=>false,'message'=>$msg]);

                return $response;
              }


    }




















































    /**
     * @Route("/trouver/{{categorie}}",name="recherche_par_categorie")
     */
    public function RechercheParCategorieMenuAction(Request $request,$categorie)
    {
       

        $em=$this->getDoctrine()->getManager();
        
      
      
$query =$em->getRepository('FrontBundle:Annonce')->createQueryBuilder('a')
    ->innerJoin('a.categorie', 'c')
    ->where('c.id = :id')
    ->setParameter('id', $categorie)
    ->getQuery()->getResult();


/*SELECT a FROM Annonce a, Categorie c, ltour_categorie_annonce ac WHERE ac.categorie_id=:cat AND ac.annonce_id=a.id*/

    

    $ListeAnnonces=$this->get('knp_paginator')->paginate(
        $query,
        
        $request->query->get('page', 1),6);

       return $this->render('FilterBundle:Pages:Liste.html.twig',['Annonces'=>$ListeAnnonces]);

    }




     /**
     * @Route("/trouver/lieux/{{sous_categorie}}",name="recherche_par_sous_categorie")
     */
    public function RechercheParSousCategorieMenuAction(Request $request,$sous_categorie)
    {
        

              $em=$this->getDoctrine()->getManager();


      
$query =$em->getRepository('FrontBundle:Annonce')->createQueryBuilder('a')
    ->innerJoin('a.sousCategorie', 's')
    ->where('s.id = :id')
    ->setParameter('id', $sous_categorie)
    ->getQuery()->getResult();


/*SELECT a FROM Annonce a, Categorie c, ltour_categorie_annonce ac WHERE ac.categorie_id=:cat AND ac.annonce_id=a.id*/

    

    $ListeAnnonces=$this->get('knp_paginator')->paginate(
        $query,
        
        $request->query->get('page', 1),6);

       return $this->render('FilterBundle:Pages:Liste.html.twig',['Annonces'=>$ListeAnnonces]);









    }





private function firstImage($array)
{

$first_prop='';
if($array !=null)
{
  foreach($array as $prop) {
   $first_prop = $prop;
   break; // exits the foreach loop
}


return $first_prop;
}

else{
  return null;
}



}



































































    
}
