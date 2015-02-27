<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vin\FrontOfficeBundle\Entity\Couleur;

/**
 * Vin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\VinRepository")
 */
class Vin
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
     * @ORM\Column(name="nameWine", type="string", length=255)
     */
    private $nameWine;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="mealWine", type="string", length=255)
     */
    private $mealWine;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Couleur", inversedBy="vin")
     * @ORM\JoinColumn(name="id_couleur", referencedColumnName="id")
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Region", inversedBy="vin")
     * @ORM\JoinColumn(name="id_region", referencedColumnName="id")
     */
    private $region;



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
     * Set nameWine
     *
     * @param string $nameWine
     * @return Vin
     */
    public function setNameWine($nameWine)
    {
        $this->nameWine = $nameWine;

        return $this;
    }

    /**
     * Get nameWine
     *
     * @return string 
     */
    public function getNameWine()
    {
        return $this->nameWine;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Vin
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Vin
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return Vin
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Vin
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Vin
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set mealWine
     *
     * @param string $mealWine
     * @return Vin
     */
    public function setMealWine($mealWine)
    {
        $this->mealWine = $mealWine;

        return $this;
    }

    /**
     * Get mealWine
     *
     * @return string 
     */
    public function getMealWine()
    {
        return $this->mealWine;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Vin
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set couleur
     *
     * @param \Vin\FrontOfficeBundle\Entity\Couleur $couleur
     * @return Vin
     */
    public function setCouleur(\Vin\FrontOfficeBundle\Entity\Couleur $couleur = null)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return \Vin\FrontOfficeBundle\Entity\Couleur 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set region
     *
     * @param \Vin\FrontOfficeBundle\Region $region
     * @return Vin
     */
    public function setRegion(\Vin\FrontOfficeBundle\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Vin\FrontOfficeBundle\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
}
