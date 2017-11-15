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
			->getRepository('LoadingSplitBundle:Loadingsplitsku')
		  ;
          $listLoading = $repository->findAll();
  
        return $this->render('LoadingSplitBundle:Table:index.html.twig', array ('listLoading' =>$listLoading));
    }
	
	public function selectAction($po)
    {
		$em = $this->getDoctrine()->getManager();	
		$repositorysku = $em->getRepository('LoadingSplitBundle:Loadingsplitsku');
        $listLoading = $repositorysku->findBy(
		array('numpo' => $po))
		;
		
		if (null === $listLoading) {
			throw new NotFoundHttpException ( " Pas de repartition trouvée pour la commande ".$po);
		}
		
		$listCpLodading = array();
		foreach ( $listLoading as $Loading) {
			array_push($listCpLodading, $Loading->getLoading()->getRef());
		}	
		
		if (null === $listCpLodading) {
			throw new NotFoundHttpException ( " Pas de repartition trouvée pour la commande ".$po);
		}

        return $this->render('LoadingSplitBundle:Table:select.html.twig', array ('listCp' =>$listCpLodading, 'po' => $po));	
    }
}
