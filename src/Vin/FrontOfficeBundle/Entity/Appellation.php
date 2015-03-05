<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Appellation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\AppellationRepository")
 */
class Appellation
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
     *      minMessage = "Votre nom d'appellation doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom d'appellation ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="nameAppellation", type="string", length=255)
     */
    private $nameAppellation;

    /**
     * @var string
     * @Assert\Length(
     *      min = "20",
     *      minMessage = "Votre texte doit faire au moins {{ limit }} caractères",
     * )
     * @ORM\Column(name="descriptionAppellation", type="text")
     */
    private $descriptionAppellation;


     /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", mappedBy="appellation")
     */
    private $vin;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Region", inversedBy="appellation")
     * @ORM\JoinColumn(name="id_region", referencedColumnName="id")
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Domaine", mappedBy="appellation")
     */
    private $domaine;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameAppellation
     *
     * @param string $nameAppellation
     * @return Appellation
     */
    public function setNameAppellation($nameAppellation)
    {
        $this->nameAppellation = $nameAppellation;

        return $this;
    }

    /**
     * Get nameAppellation
     *
     * @return string 
     */
    public function getNameAppellation()
    {
        return $this->nameAppellation;
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
     * @return Appellation
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
     * Set region
     *
     * @param \Vin\FrontOfficeBundle\Entity\Region $region
     * @return Appellation
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
        return $this->nameAppellation;
    }

    /**
     * Set descriptionAppellation
     *
     * @param string $descriptionAppellation
     * @return Appellation
     */
    public function setDescriptionAppellation($descriptionAppellation)
    {
        $this->descriptionAppellation = $descriptionAppellation;

        return $this;
    }

    /**
     * Get descriptionAppellation
     *
     * @return string 
     */
    public function getDescriptionAppellation()
    {
        return $this->descriptionAppellation;
    }

    /**
     * Add domaine
     *
     * @param \Vin\FrontOfficeBundle\Entity\Domaine $domaine
     * @return Appellation
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
     * Set slug
     *
     * @param string $slug
     * @return Appellation
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
