<?php

namespace BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FrontBundle\Entity\Notification;

class NotificationController extends Controller
{
  






   /**    
     * @Route("/notification/fetch",name="fetch_notification_page")
     */

   public function fetchNotificationAction(Request $request)
    {
     

    if (isset($_POST["view"]))
{

	 $em=$this->getDoctrine()->getManager();
	 $currentUser=$this->container->get('security.token_storage')->getToken()->getUser();

      if ($_POST["view"]!= '')
   {

     $qb = $em->createQueryBuilder();
$q = $qb->update('FrontBundle:Notification', 'n')
        ->set('n.status', '?1')
       
        ->where('n.status = ?2')
        ->andWhere('n.user = ?3')
        ->setParameter(1, 1)
        ->setParameter(2, 0)
        ->setParameter(3, $currentUser)
        ->getQuery();
$p = $q->execute();



   }

	  $notifications=$em->getRepository('FrontBundle:Notification')->findBy(array("user"=> $currentUser),array('id' => 'desc'),4,0);
	

	$output='';
  $date=array();

	if(count($notifications)>0) 
	{
        foreach ($notifications as $notification ) 
        
        {

          $str = $notification->getCreatedAt()->format('Y-m-d H:i:s');

          if($notification->getStatus()==0)
          {
                   $output.=    '<li style="background:#f4f4f4;">
    <a href="#">
     <small class="pull-right"><i class="fa fa-clock-o"></i> '.$this->get_timeago(strtotime($str)).'</small><br/>
     <strong>'.$notification->getSubject().'</strong> <br />
     <small><em>'.$notification->getNotificationText().'</em></small>
    </a>
   </li>  
   ' ;

          }else{

             
              $output.=    '<li>
    <a href="#">
     <small class="pull-right"><i class="fa fa-clock-o"></i> '.$this->get_timeago(strtotime($str)).'</small><br/>
     <strong>'.$notification->getSubject().'</strong> <br />
     <small><em>'.$notification->getNotificationText().'</em></small>
    </a>
   </li>  
   ' ;
         
}





	}
}

	else
	{

          $output.='  <li>
                    <a href="#">
                     <p> Aucune notification trouver</p>
                    </a>
                  </li>';

		
	}
	
 $notif=$em->getRepository('FrontBundle:Notification')->findBy(array("status"=>0,"user"=>$currentUser));
	
	
	$count=count($notif);

	$data=array('notification'=>$output,'unseen_notification' =>$count);

	 $response=new JsonResponse(array('notification'=>$output,'unseen_notification' =>$count));

return $response;


}


 }







 /**
     * @Route("/notifications",name="all_notifications")
     */
    public function allnotificationAction(Request $request)
    {

           $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if((is_object($user) || $user instanceof UserInterface))
            {
     
             $em = $this->getDoctrine()->getManager();    
             
           
             $notifications =$em->getRepository('FrontBundle:Notification')->findBy(array('user'=>$user),array('createdAt' => 'DESC'));
             $notificationpaginator=$this->get('knp_paginator')->paginate(
        $notifications,
        
        $request->query->get('page', 1),8);
             
            return $this->render('BackBundle:Default:notifications.html.twig',['notifications'=>$notificationpaginator]); 
    }else{


        $this->get('session')->getFlashBag()->add('noticeErreur','Vous devez  connecté !!');
         return $this->redirect( $this->generateUrl('fos_user_security_login'));
  }


}































private function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}

}