<?php

namespace LoadingSplitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TableController extends Controller
{
    public function indexAction()
    {
        return $this->render('LoadingSplitBundle:Table:index.html.twig');
    }
}
