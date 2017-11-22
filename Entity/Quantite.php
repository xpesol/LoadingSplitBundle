<?php

namespace LoadingSplitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantite
 *
 * @ORM\Table(name="quantite_by_entrepot")
 * @ORM\Entity(repositoryClass="LoadingSplitBundle\Repository\QuantiteRepository")
 */
class Quantite
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
     * @var string
     *
     * @ORM\Column(name="num_po", type="string", length=255)
     */
    private $numPo;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var int
     *
     * @ORM\Column(name="idloadingposku", type="integer", nullable=true)
     */
    private $idloadingposku;

    /**
     * @var string
     *
     * @ORM\Column(name="entrepot", type="string", length=255, nullable=true)
     */
    private $entrepot;

    /**
     * @var int
     *
     * @ORM\Column(name="quantites", type="integer", nullable=true)
     */
    private $quantites;


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
     * Set numPo
     *
     * @param string $numPo
     *
     * @return Quantite
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
     * Set ref
     *
     * @param string $ref
     *
     * @return Quantite
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set idloadingposku
     *
     * @param integer $idloadingposku
     *
     * @return Quantite
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
     * @return Quantite
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
     * @return Quantite
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
}

