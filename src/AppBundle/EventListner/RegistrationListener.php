<?php

namespace AppBundle\EventListner;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegistrationListener implements EventSubscriberInterface
{
    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationConfirmed',
        );
    }
  
    public function onRegistrationConfirmed(FilterUserResponseEvent $event)
    {
        //Redirects to edit profile
        return new RedirectResponse($this->router->generate('proposer_lieu'));
    }
}
