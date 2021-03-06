<?php

namespace LoadingSplitBundle\Repository;

/**
 * PoDetailFndRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class PoDetailFndRepository extends \Doctrine\ORM\EntityRepository
{
		public function findQuantitiesOrderedByPoEntrepotMad($po, $entrepot)
		{	   
		  $query = $this->_em->createQuery(
		  'SELECT a FROM LoadingSplitBundle:PoDetailFnd a WHERE a.numPo = :numPo AND a.entrepot = :entrepot');
		  $query->setParameter('numPo', $po);
		  $query->setParameter('entrepot', $entrepot);
		  return $query ->getOneOrNullResult();
		}  
}