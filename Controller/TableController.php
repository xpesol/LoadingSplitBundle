<?php

namespace LoadingSplitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TableController extends Controller
{
    public function indexAction()
    {
		  $repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('LoadingSplitBundle:Loading')
		  ;
          $listLoading = $repository->myFindAll();
		  
        return $this->render('LoadingSplitBundle:Table:index.html.twig', array ('listLoading' =>$listLoading));
    }
}
