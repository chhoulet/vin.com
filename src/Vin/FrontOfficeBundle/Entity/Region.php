<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(
     *      min = "2",
     *      max = "60",
     *      minMessage = "Votre nom de région doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom de région ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="nameRegion", type="string", length=255)
     */
    private $nameRegion;

    /**
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "1000",
     *      minMessage = "Votre description de région doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description de région ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="descriptionRegion", type="text")
     */
    private $descriptionRegion;

     /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="vue", type="text", length=255)
     */
    private $vue;


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
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", mappedBy="region")
     */
    private $vin;

     /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Appellation", mappedBy="region")
     */
    private $appellation;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Domaine", mappedBy="region")
     */
    private $domaine;


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

    /**
     * Add appellation
     *
     * @param \Vin\FrontOfficeBundle\Entity\Appellation $appellation
     * @return Region
     */
    public function addAppellation(\Vin\FrontOfficeBundle\Entity\Appellation $appellation)
    {
        $this->appellation[] = $appellation;

        return $this;
    }

    /**
     * Remove appellation
     *
     * @param \Vin\FrontOfficeBundle\Entity\Appellation $appellation
     */
    public function removeAppellation(\Vin\FrontOfficeBundle\Entity\Appellation $appellation)
    {
        $this->appellation->removeElement($appellation);
    }

    /**
     * Get appellation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAppellation()
    {
        return $this->appellation;
    }

    /**
     * Add domaine
     *
     * @param \Vin\FrontOfficeBundle\Entity\Domaine $domaine
     * @return Region
     */
    public function addDomaine(\Vin\FrontOfficeBundle\Entity\Domaine $domaine)
    {
        $this->domaine[] = $domaine;

        return $this;
    }

    /**
     * Remove domaine
     *
     * @param \Vin\FrontOfficeBundle\Entity\Domaine $domaine
     */
    public function removeDomaine(\Vin\FrontOfficeBundle\Entity\Domaine $domaine)
    {
        $this->domaine->removeElement($domaine);
    }

    /**
     * Get domaine
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set vue
     *
     * @param string $vue
     * @return Region
     */
    public function setVue($vue)
    {
        $this->vue = $vue;

        return $this;
    }

    /**
     * Get vue
     *
     * @return string 
     */
    public function getVue()
    {
        return $this->vue;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Region
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
