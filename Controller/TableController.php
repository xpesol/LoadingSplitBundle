<?php

namespace LoadingSplitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TableController extends Controller
{

    private static $quantitiesRemaining = 0;
	private static $orderedQuantities = 0;
	
	public function selectAction($po) 
    {
		
		$em = $this->getDoctrine()->getManager();
		
		# Get List entrepot, quantity ordered and mad form po_detail_fnd
		$listEntrepot= array();
        $repositoryPoDetailFnd = $em->getRepository('LoadingSplitBundle:PoDetailFnd');	
        $listEntrepot = $repositoryPoDetailFnd->findBy(array('numPo' => $po));	
        self::$orderedQuantities =  $listEntrepot ->getQuantites();
		if (null === $listEntrepot) {
			throw new NotFoundHttpException ( " Pas de repartition trouvée pour la commande ".$po);
		}
		
		# Get Cp ref and id_loading_po_sku list	from cp_loading and cp_loading_po_sku detail
		$repositorySku = $em->getRepository('LoadingSplitBundle:Loadingsplitsku');
        $listLoading = $repositorySku->findBy(
		array('numpo' => $po))
		;	
		if (null === $listLoading) {
			throw new NotFoundHttpException ( " Pas de repartition trouvée pour la commande ".$po);
		}
		$listCp = array();
		$listCpId = array();
       
		foreach ( $listLoading as $Loading) {
		array_push($listCp, $Loading->getLoading()->getRef());
		array_push($listCpId, $Loading->getIdloadingposku());
		}	
	
        # Define quantitesLoaded use in quantitesLoaded.html.twig
        $quantitesLoaded = '';
		
        return $this->render('LoadingSplitBundle:Table:select.html.twig', array ('listCp' =>$listCp, 'listCpId' =>$listCpId,'po' => $po, 'listEntrepot' =>$listEntrepot, 'quantitesLoaded' => $quantitesLoaded));	
    }
	
	public function getQuantitiesByLoadAction($entrepot, $idloadingposku) # Call in select.html.twig to get quantites by CP ref, Entrepot and ID cp_loading_po_sku
    {
		$em = $this->getDoctrine()->getManager();	
		$repositorySkuDetailFnd = $em->getRepository('LoadingSplitBundle:Loadingposkudetailfnd');
        $listEntrepotByIdLoadingSku = $repositorySkuDetailFnd->findQuantitesByCpEntrepotIdLoadingPoSku($entrepot, $idloadingposku);
		if (empty($listEntrepotByIdLoadingSku)) {
			$quantitesLoaded = '';
			}
		else{
			$quantitesLoaded = $listEntrepotByIdLoadingSku->getQuantites();
			self::$quantitiesRemaining = self::$quantitiesRemaining + $quantitesLoaded;
			}
			
        return $this->render('LoadingSplitBundle:Table:quantitesLoaded.html.twig', array ('quantitesLoaded' => $quantitesLoaded, 'entrepot' => $entrepot));
    }
	
	public function getQuantitiesRemainingsAction() # Call in select.html.twig to get quantites remaining
    {
		$quantitiesRemainingOutput = 0;
		$quantitiesRemainingOutput = self::$quantitiesRemaining;
		echo $quantitiesRemainingOutput;
		self::$quantitiesRemaining = 0;
        return $this->render('LoadingSplitBundle:Table:quantitesRemaining.html.twig', array ('quantitiesRemainingOutput' => $quantitiesRemainingOutput));
    }
}
