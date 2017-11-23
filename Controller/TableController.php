<?php

namespace LoadingSplitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TableController extends Controller
{
    public function indexAction() # Test Function 
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
		$repositorySku = $em->getRepository('LoadingSplitBundle:Loadingsplitsku');
        $listLoading = $repositorySku->findBy(
		array('numpo' => $po))
		;
		
		if (null === $listLoading) {
			throw new NotFoundHttpException ( " Pas de repartition trouvée pour la commande ".$po);
		}
		
		$listCpLoading = array();
		$listIdLoading = array();
		
        # Get Cp ref and id_loading_po_sku list	from cp_loading and cp_loading_po_sku detail
		foreach ( $listLoading as $Loading) {
		array_push($listCpLoading, $Loading->getLoading()->getRef());
		array_push($listIdLoading, $Loading->getIdloadingposku());
		}	
		
		
		if (null === $listCpLoading) {
			throw new NotFoundHttpException ( 'Pas de repartition trouvée pour cette commande');
		}
		
		$repositorySkuDetailFnd = $em->getRepository('LoadingSplitBundle:Loadingposkudetailfnd');
		$listEntrepotLoading = array();
		$listQantiteByCpLoading = array();
		$listIdLoadingAvailable = array();

		# Get List entrepot form cp_loading_po_sku_detail
		foreach ( $listIdLoading as $IdLoading) {
        $listEntrepotByIdLoadingSku = $repositorySkuDetailFnd->findEntrepotByIdLoadingPoSku($IdLoading);
		
		foreach ( $listEntrepotByIdLoadingSku as $EntrepotByIdLoadingSku) {
		 array_push($listIdLoadingAvailable, $EntrepotByIdLoadingSku->getLoadingsplitsku()->getIdloading());
		}
		$listEntrepotLoading = array_merge($listEntrepotLoading, $listEntrepotByIdLoadingSku);
		}
			
        $quantitesLoaded = '';
		$quantitesOrdered = '';
        return $this->render('LoadingSplitBundle:Table:select.html.twig', array ('listCp' =>$listCpLoading, 'listCpId' =>$listIdLoading,'po' => $po, 'listEntrepot' =>$listEntrepotLoading, 'quantitesLoaded' => $quantitesLoaded, 'quantitesOrdered' => $quantitesOrdered));	
    }
	
	public function getQuantitiesByLoadAction($entrepot, $idloadingposku) # Call in select.html.twig to get quantites by CP ref, Entrepot and ID cp_loading_po_sku
    {
		$em = $this->getDoctrine()->getManager();	
		$repositorySkuDetailFnd = $em->getRepository('LoadingSplitBundle:Loadingposkudetailfnd');
        $listEntrepotByIdLoadingSku = $repositorySkuDetailFnd->findQuantitesByCpEntrepotIdLoadingPoSku($entrepot, $idloadingposku);
		
		if (null === $listEntrepotByIdLoadingSku) {
			throw new NotFoundHttpException ( 'Pas de quantitées pour ce Cp trouvées');
		}
        $quantitesLoaded = $listEntrepotByIdLoadingSku->getQuantites();
        return $this->render('LoadingSplitBundle:Table:quantitesLoaded.html.twig', array ('quantitesLoaded' => $quantitesLoaded));
    }
	
		public function getQuantitiesOrderedAction($po, $entrepot, $mad) # Call in select.html.twig to get quantites ordered by Entrepot, num_po and mad
    {
		$em = $this->getDoctrine()->getManager();	
		$repositoryPoDetailFnd = $em->getRepository('LoadingSplitBundle:PoDetailFnd');
        $listQuantitiesOrdered = $repositoryPoDetailFnd->findQuantitiesOrderedByPoEntrepotMad($po, $entrepot, $mad);
		

	    if (empty($listQuantitiesOrdered)){
		$quantitesOrdered = '';}
        else{		
		$quantitesOrdered = $listQuantitiesOrdered->getQuantites();
		}
	
        return $this->render('LoadingSplitBundle:Table:quantitesOrdered.html.twig', array ('quantitesOrdered' => $quantitesOrdered));
    }
}
