<?php

namespace Mahmoud\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mahmoud\EventBundle\Entity\Event;


class HomeEventController extends Controller
{
    public function homeEventAction()
    {
        return $this->render('@MahmoudEvent/HomeEvent/home_event.html.twig', array(
            // ...
        ));
    }


    public function showEventAction()
    {

        $rep=$this->getDoctrine()->getManager()->getRepository(Event::class)->findAll();


        return $this->render('@MahmoudEvent/HomeEvent/show_event.html.twig', array(
           'listEvent'=>$rep,

        ));
    }

    public function addEventAction()
    {
        $e = new Event();
        $rep=$this->getDoctrine()->getManager()->getRepository('EventBundle:Event')->findAll();

        return $this->render('@MahmoudEvent/HomeEvent/show_event.html.twig', array(
            'listEvent'=>$rep
        ));
    }
    public function deleteEventAction()
    {
        $e = new Event();
        $rep=$this->getDoctrine()->getRepository('EventBundle:Event')->findAll();

        return $this->render('@MahmoudEvent/HomeEvent/show_event.html.twig', array(
            'listEvent'=>$rep
        ));
    }

}
