<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Vol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avions = $em->getRepository('AeroGestVolBundle:Avion')->findAll();
        $user = $this->getUser();
        return $this->render('AeroGestVolBundle:Default:index.html.twig', array(
            "user" => $user,
            "avions" => $avions
        ));
    }
}
