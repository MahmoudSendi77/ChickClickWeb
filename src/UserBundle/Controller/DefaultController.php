<?php

namespace UserBundle\Controller;
use AppBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $membre=$this->container->get('security.token_storage')->getToken()->getUser();
        $id=$membre->getId();
        $role=$membre->getRoles();
        if($this->container->get('security.authorization_checker')->isGranted('ROLE_CLIENT')){
            return $this->redirectToRoute("forum_rechercheC");
        }
        else{
            return $this->redirectToRoute("forum_recherche");
        }


    }
}
