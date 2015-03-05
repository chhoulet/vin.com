<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Domaine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\DomaineRepository")
 */
class Domaine
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
     * @Assert\Length(
     *      min = "2",
     *      max = "60",
     *      minMessage = "Votre nom de domaine doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom de domaine ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="nameDomaine", type="string", length=255)
     */
    private $nameDomaine;

    /**
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "1000",
     *      minMessage = "Votre description de domaine doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description de domaine ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="descriptionDomaine", type="text")
     */
    private $descriptionDomaine;

    
    /**
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "30",
     *      minMessage = "Votre slug doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre slug ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

     /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", mappedBy="domaine")
     */
    private $vin;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Appellation", inversedBy="domaine")
     * @ORM\JoinColumn(name="appellation_id", referencedColumnName="id")
     */
    private $appellation;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Region", inversedBy="domaine")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
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
     * Set nameDomaine
     *
     * @param string $nameDomaine
     * @return Domaine
     */
    public function setNameDomaine($nameDomaine)
    {
        $this->nameDomaine = $nameDomaine;

        return $this;
    }

    /**
     * Get nameDomaine
     *
     * @return string 
     */
    public function getNameDomaine()
    {
        return $this->nameDomaine;
    }

    /**
     * Set descriptionDomaine
     *
     * @param string $descriptionDomaine
     * @return Domaine
     */
    public function setDescriptionDomaine($descriptionDomaine)
    {
        $this->descriptionDomaine = $descriptionDomaine;

        return $this;
    }

    /**
     * Get descriptionDomaine
     *
     * @return string 
     */
    public function getDescriptionDomaine()
    {
        return $this->descriptionDomaine;
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
     * @param \Vin\FrontOfficeBundle\Entity\Vin $vin
     * @return Domaine
     */
    public function addVin(\Vin\FrontOfficeBundle\Entity\Vin $vin)
    {
        $this->vin[] = $vin;

        return $this;
    }

    /**
     * Remove vin
     *
     * @param \Vin\FrontOfficeBundle\Entity\Vin $vin
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
     * Set appellation
     *
     * @param \Vin\FrontOfficeBundle\Entity\Appellation $appellation
     * @return Domaine
     */
    public function setAppellation(\Vin\FrontOfficeBundle\Entity\Appellation $appellation = null)
    {
        $this->appellation = $appellation;

        return $this;
    }

    /**
     * Get appellation
     *
     * @return \Vin\FrontOfficeBundle\Entity\Appellation 
     */
    public function getAppellation()
    {
        return $this->appellation;
    }

    /**
     * Set region
     *
     * @param \Vin\FrontOfficeBundle\Entity\Region $region
     * @return Domaine
     */
    public function setRegion(\Vin\FrontOfficeBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Vin\FrontOfficeBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    public function __toString()
    {
        return $this ->nameDomaine;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Domaine
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
