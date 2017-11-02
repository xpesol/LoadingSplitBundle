<?php

namespace LoadingSplitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LoadingSplitBundle:Default:index.html.twig');
    }
}
