<?php

namespace LoadingSplitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BDPostgres
 *
 * @ORM\Table(name="b_d_postgres")
 * @ORM\Entity(repositoryClass="LoadingSplitBundle\Repository\BDPostgresRepository")
 */
class BDPostgres
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var int
     *
     * @ORM\Column(name="madhub", type="integer")
     */
    private $madhub;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="CPname", type="string", length=255, nullable=true)
     */
    private $cPname;

    /**
     * @var int
     *
     * @ORM\Column(name="balance", type="integer")
     */
    private $balance;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return BDPostgres
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return BDPostgres
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set madhub
     *
     * @param integer $madhub
     *
     * @return BDPostgres
     */
    public function setMadhub($madhub)
    {
        $this->madhub = $madhub;

        return $this;
    }

    /**
     * Get madhub
     *
     * @return int
     */
    public function getMadhub()
    {
        return $this->madhub;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return BDPostgres
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set cPname
     *
     * @param string $cPname
     *
     * @return BDPostgres
     */
    public function setCPname($cPname)
    {
        $this->cPname = $cPname;

        return $this;
    }

    /**
     * Get cPname
     *
     * @return string
     */
    public function getCPname()
    {
        return $this->cPname;
    }

    /**
     * Set balance
     *
     * @param integer $balance
     *
     * @return BDPostgres
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }
}

