<?php

namespace DevTRW\LbFindBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DevTRWLbFindBundle:Default:index.html.twig', array('name' => $name));
    }
}
