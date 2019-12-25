<?php

namespace EspritApiBundle\Controller;

use EspritApiBundle\Entity\Task;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TaskController extends Controller
{
    public function allAction()
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('EspritApiBundle:Task')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    public function findAction($id)
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('EspritApiBundle:Task')
            ->find($id);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);

    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = new Task();
        $task->getName($request->get('name'));
        $task->setStatus($request->get('status'));
        $em->persist($task);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($task);
        return new JsonResponse($formatted);

    }
}
