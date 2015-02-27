<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vin\FrontOfficeBundle\Entity\Vin;

/**
 * Couleur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\CouleurRepository")
 */
class Couleur
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
     * @ORM\Column(name="nameColor", type="string", length=255)
     */
    private $nameColor;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", mappedBy="couleur")
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
     * Set nameColor
     *
     * @param string $nameColor
     * @return Couleur
     */
    public function setNameColor($nameColor)
    {
        $this->nameColor = $nameColor;

        return $this;
    }

    /**
     * Get nameColor
     *
     * @return string 
     */
    public function getNameColor()
    {
        return $this->nameColor;
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
     * @param \Vin\FrontOfficeBundle\Entity\VinFrontOfficeBundle $vin
     * @return Couleur
     */
    public function addVin(\Vin\FrontOfficeBundle\Entity\VinFrontOfficeBundle $vin)
    {
        $this->vin[] = $vin;

        return $this;
    }

    /**
     * Remove vin
     *
     * @param \Vin\FrontOfficeBundle\Entity\VinFrontOfficeBundle $vin
     */
    public function removeVin(\Vin\FrontOfficeBundle\Entity\VinFrontOfficeBundle $vin)
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
}
