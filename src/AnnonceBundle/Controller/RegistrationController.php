<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AnnonceBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Controller\RegistrationController as baseController ;
use FrontBundle\Form\RegistrationType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends Controller
{
   

    /**
     * @Route("/register-lieu",name="register_lieu_page")
     */
    public function registrationAction(Request $request)
    {


    $formFactory=$this->get('form.factory');
    $userManager=$this->get('fos_user.user_manager');
    $eventDispatcher=$this->get('event_dispatcher');




        $user = $userManager->createUser();
        $user->setEnabled(true);
     

        $event = new GetResponseUserEvent($user, $request);
        $eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);





        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }
           
           $form=$formFactory->create(new RegistrationType(),$user);
       /* $form =$formFactory->create(new ClientRegistrationType($this->container->getParameter('fos_user.model.user.class')));*/
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {


            
                $type_comte=$form['typeCompte']->getData() ;

                 if($type_comte=='Particulier')
                 {
                     
                   $user->addRole('ROLE_PARTICULIER'); 
                   
                 }else{
                   $user->addRole('ROLE_PROFESSIONEL'); 
                 }









                $event = new FormEvent($form, $request);
                $eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                
        return  $this->authenticateUser($user);


    
             





            }


             $event = new FormEvent($form, $request);
           /* $eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);*/

            if (null !== $response = $event->getResponse()) {
                return $response;
            }   


      }









        return $this->render('@Annonce/Pages/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

  




  protected function authenticateUser(UserInterface $user)
    {
    
            $this->container->get('fos_user.user_checker')->checkPostAuth($user);
              
        
 
        $providerKey = $this->container->getParameter('fos_user.firewall_name');
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        
           $this->container->get('security.token_storage')->setToken($token);
      /* $this->container->get('security.context')->setToken($token);*/
        return $this->redirectToRoute( 'proposer_lieu');
        

    }











}