<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\RegionRepository")
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nameRegion", type="string", length=255)
     */
    private $nameRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=255)
     */
    private $domaine;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionRegion", type="string", length=255)
     */
    private $descriptionRegion;


    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", mappedBy="region")
     */
    private $vin;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameRegion
     *
     * @param string $nameRegion
     * @return Region
     */
    public function setNameRegion($nameRegion)
    {
        $this->nameRegion = $nameRegion;

        return $this;
    }

    /**
     * Get nameRegion
     *
     * @return string 
     */
    public function getNameRegion()
    {
        return $this->nameRegion;
    }

    /**
     * Set domaine
     *
     * @param string $domaine
     * @return Region
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return string 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vin = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vin
     *
     * @param \Vin\FrontOfficeBundle\Vin $vin
     * @return Region
     */
    public function addVin(\Vin\FrontOfficeBundle\Entity\Vin $vin)
    {
        $this->vin[] = $vin;

        return $this;
    }

    /**
     * Remove vin
     *
     * @param \Vin\FrontOfficeBundle\Vin $vin
     */
    public function removeVin(\Vin\FrontOfficeBundle\Entity\Vin $vin)
    {
        $this->vin->removeElement($vin);
    }

    /**
     * Get vin
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set descriptionRegion
     *
     * @param string $descriptionRegion
     * @return Region
     */
    public function setDescriptionRegion($descriptionRegion)
    {
        $this->descriptionRegion = $descriptionRegion;

        return $this;
    }

    /**
     * Get descriptionRegion
     *
     * @return string 
     */
    public function getDescriptionRegion()
    {
        return $this->descriptionRegion;
    }

    public function __toString()
    {
        return $this ->nameRegion;
    }
}
