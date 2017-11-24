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

		# Get List entrepot form cp_loading_po_sku_detail
		foreach ( $listIdLoading as $IdLoading) {
        $listEntrepotByIdLoadingSku = $repositorySkuDetailFnd->findEntrepotByIdLoadingPoSku($IdLoading);
		$listEntrepotLoading = array_merge($listEntrepotLoading, $listEntrepotByIdLoadingSku);
		}
        $quantitesLoaded = '';
		$quantitesOrdered = '';
		$dateMadRt = '';
        return $this->render('LoadingSplitBundle:Table:select.html.twig', array ('listCp' =>$listCpLoading, 'listCpId' =>$listIdLoading,'po' => $po, 'listEntrepot' =>$listEntrepotLoading, 'quantitesLoaded' => $quantitesLoaded, 'quantitesOrdered' => $quantitesOrdered, 'dateMadRt' => $dateMadRt));	
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
			}
        return $this->render('LoadingSplitBundle:Table:quantitesLoaded.html.twig', array ('quantitesLoaded' => $quantitesLoaded));
    }
	
	public function getQuantitiesOrderedAction($po, $entrepot, $mad) # Call in select.html.twig to get quantites ordered by Entrepot, num_po and mad
    {
		$em = $this->getDoctrine()->getManager();	
		$repositoryPoDetailFnd = $em->getRepository('LoadingSplitBundle:PoDetailFnd');
        $listQuantitiesOrdered = $repositoryPoDetailFnd->findQuantitiesOrderedByPoEntrepotMad($po, $entrepot);
	    if (empty($listQuantitiesOrdered)){
		$quantitesOrdered = '';}
        else{		
		$quantitesOrdered = $listQuantitiesOrdered->getQuantites();
		}
        return $this->render('LoadingSplitBundle:Table:quantitesOrdered.html.twig', array ('quantitesOrdered' => $quantitesOrdered));
    }
	
	public function getDateMadRtAction($po, $entrepot) # Call in select.html.twig to get mad by Entrepot and num_po in po_detail_fnd
    {
		$em = $this->getDoctrine()->getManager();	
		$repositoryPoDetailFnd = $em->getRepository('LoadingSplitBundle:PoDetailFnd');
        $listDateMadRt = $repositoryPoDetailFnd->findQuantitiesOrderedByPoEntrepotMad($po, $entrepot);	
	    if (empty($listDateMadRt)){
			$dateMadRt = '';
			}
        else{
			$dateMadRt = $listDateMadRt->getDateMadRt();
			}
        return $this->render('LoadingSplitBundle:Table:dateMadRt.html.twig', array ('dateMadRt' => $dateMadRt));
    }
}
