<?php

namespace LoadingSplitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loading
 *
 * @ORM\Table(name="loading")
 * @ORM\Entity(repositoryClass="LoadingSplitBundle\Repository\LoadingRepository")
 */
class Loading
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
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var int
     *
     * @ORM\Column(name="idloading", type="integer", unique=true)
     */
    private $idloading;


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
     * Set ref
     *
     * @param string $ref
     *
     * @return Loading
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
     * Set idloading
     *
     * @param integer $idloading
     *
     * @return Loading
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
}

