<?php

namespace LoadingSplitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loading_po_sku
 *
 * @ORM\Table(name="cp_loading_po_sku")
 * @ORM\Entity(repositoryClass="LoadingSplitBundle\Repository\Loading_po_skuRepository")
 */
class Loading_po_sku
{
    /**
     * @var int
     *
     * @ORM\Column(name="idloading_po_sku", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idloading_po_sku;

    /**
     * @var int
     *
     * @ORM\Column(name="idloading", type="integer")
     */
    private $idloading;

    /**
     * @var string
     *
     * @ORM\Column(name="num_po", type="string", length=255)
     */
    private $numPo;

    /**
     * @var string
     *
     * @ORM\Column(name="sku_id", type="string", length=255)
     */
    private $skuId;

    /**
     * @var int
     *
     * @ORM\Column(name="pcs_received", type="integer", nullable=true)
     */
    private $pcsReceived;

    /**
     * @var int
     *
     * @ORM\Column(name="ctn_received", type="integer", nullable=true)
     */
    private $ctnReceived;

    /**
     * @var int
     *
     * @ORM\Column(name="pallet_received", type="integer", nullable=true)
     */
    private $palletReceived;

    /**
     * @var int
     *
     * @ORM\Column(name="stock_received", type="integer", nullable=true)
     */
    private $stockReceived;


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
     * Set idloading
     *
     * @param integer $idloading
     *
     * @return Loading_po_sku
     */
    public function setIdloading($idloading)
    {
        $this->idloading = $idloading;

        return $this;
    }

    /**
     * Get idloading
     *
     * @return int
     */
    public function getIdloading()
    {
        return $this->idloading;
    }

    /**
     * Set numPo
     *
     * @param string $numPo
     *
     * @return Loading_po_sku
     */
    public function setNumPo($numPo)
    {
        $this->numPo = $numPo;

        return $this;
    }

    /**
     * Get numPo
     *
     * @return string
     */
    public function getNumPo()
    {
        return $this->numPo;
    }

    /**
     * Set skuId
     *
     * @param string $skuId
     *
     * @return Loading_po_sku
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;

        return $this;
    }

    /**
     * Get skuId
     *
     * @return string
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Set pcsReceived
     *
     * @param integer $pcsReceived
     *
     * @return Loading_po_sku
     */
    public function setPcsReceived($pcsReceived)
    {
        $this->pcsReceived = $pcsReceived;

        return $this;
    }

    /**
     * Get pcsReceived
     *
     * @return int
     */
    public function getPcsReceived()
    {
        return $this->pcsReceived;
    }

    /**
     * Set ctnReceived
     *
     * @param integer $ctnReceived
     *
     * @return Loading_po_sku
     */
    public function setCtnReceived($ctnReceived)
    {
        $this->ctnReceived = $ctnReceived;

        return $this;
    }

    /**
     * Get ctnReceived
     *
     * @return int
     */
    public function getCtnReceived()
    {
        return $this->ctnReceived;
    }

    /**
     * Set palletReceived
     *
     * @param integer $palletReceived
     *
     * @return Loading_po_sku
     */
    public function setPalletReceived($palletReceived)
    {
        $this->palletReceived = $palletReceived;

        return $this;
    }

    /**
     * Get palletReceived
     *
     * @return int
     */
    public function getPalletReceived()
    {
        return $this->palletReceived;
    }

    /**
     * Set stockReceived
     *
     * @param integer $stockReceived
     *
     * @return Loading_po_sku
     */
    public function setStockReceived($stockReceived)
    {
        $this->stockReceived = $stockReceived;

        return $this;
    }

    /**
     * Get stockReceived
     *
     * @return int
     */
    public function getStockReceived()
    {
        return $this->stockReceived;
    }
}

