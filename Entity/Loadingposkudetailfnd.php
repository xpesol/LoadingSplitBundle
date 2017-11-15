<?php

namespace LoadingSplitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loadingposkudetailfnd
 *
 * @ORM\Table(name="cp_loading_po_sku_detail_fnd")
 * @ORM\Entity(repositoryClass="LoadingSplitBundle\Repository\LoadingposkudetailfndRepository")
 */
class Loadingposkudetailfnd
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idloading_po_sku", type="integer")
     */
    private $idloadingposku;

    /**
     * @var string
     *
     * @ORM\Column(name="entrepot", type="string", length=255)
     */
    private $entrepot;

    /**
     * @var int
     *
     * @ORM\Column(name="quantites", type="integer", nullable=true)
     */
    private $quantites;

    /**
     * @var string
     *
     * @ORM\Column(name="estimated_date_arrived", type="string", length=255, nullable=true)
     */
    private $estimateddatearrived;

    /**
     * @var string
     *
     * @ORM\Column(name="sous_pays", type="string", length=255, nullable=true)
     */
    private $souspays;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idloadingposku
     *
     * @param integer $idloadingposku
     *
     * @return Loadingposkudetailfnd
     */
    public function setIdloadingposku($idloadingposku)
    {
        $this->idloadingposku = $idloadingposku;

        return $this;
    }

    /**
     * Get idloadingposku
     *
     * @return int
     */
    public function getIdloadingposku()
    {
        return $this->idloadingposku;
    }

    /**
     * Set entrepot
     *
     * @param string $entrepot
     *
     * @return Loadingposkudetailfnd
     */
    public function setEntrepot($entrepot)
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    /**
     * Get entrepot
     *
     * @return string
     */
    public function getEntrepot()
    {
        return $this->entrepot;
    }

    /**
     * Set quantites
     *
     * @param integer $quantites
     *
     * @return Loadingposkudetailfnd
     */
    public function setQuantites($quantites)
    {
        $this->quantites = $quantites;

        return $this;
    }

    /**
     * Get quantites
     *
     * @return int
     */
    public function getQuantites()
    {
        return $this->quantites;
    }

    /**
     * Set estimateddatearrived
     *
     * @param string $estimateddatearrived
     *
     * @return Loadingposkudetailfnd
     */
    public function setEstimateddatearrived($estimateddatearrived)
    {
        $this->estimateddatearrived = $estimateddatearrived;

        return $this;
    }

    /**
     * Get estimateddatearrived
     *
     * @return string
     */
    public function getEstimateddatearrived()
    {
        return $this->estimateddatearrived;
    }

    /**
     * Set souspays
     *
     * @param string $souspays
     *
     * @return Loadingposkudetailfnd
     */
    public function setSouspays($souspays)
    {
        $this->souspays = $souspays;

        return $this;
    }

    /**
     * Get souspays
     *
     * @return string
     */
    public function getSouspays()
    {
        return $this->souspays;
    }
}

