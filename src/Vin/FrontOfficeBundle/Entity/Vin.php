<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Vin\FrontOfficeBundle\Entity\Couleur;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\VinRepository")
 */
class Vin
{
    const COLOR_RED = 1;
    const COLOR_PINK = 2;
    const COLOR_WHITE = 3;
    const COLOR_SPARKLING = 4; // Pétillant
    const COLOR_SOFT = 5;

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
     *      minMessage = "Le nom de vin doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de vin ne peut pas être plus long que {{ limit }} caractères"
     * )
     * @ORM\Column(name="nameWine", type="string", length=255)
     */
    private $nameWine;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var integer
     * @Assert\Type(type="integer", message="La valeur {{ value }} n'est pas un type {{ type }} valide.")
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
     * @Assert\Length(
     *      min = "2",
     *      max = "600",
     *      minMessage = "Votre description de vin doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description de vin ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     * @Assert\Length(
     *      min = "20",
     *      max = "600",
     *      minMessage = "Votre description d'accord mets-vin doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description d'accord mets-vin ne peut pas être plus long que {{ limit }} caractères"
     * )
     *
     * @ORM\Column(name="mealWine", type="string", length=255)
     */
    private $mealWine;

    /**
     * @var integer
     * @Assert\Type(type="integer", message="La valeur {{ value }} n'est pas un type {{ type }} valide.")
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

     /**
     * @var integer
     *
     * @ORM\Column(name="color", type="integer")
     */
    private $couleur;

     /**
     * @var float
     * @Assert\Type(type="float", message="La valeur {{ value }} n'est pas un type {{ type }} valide.")
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="Vin\FrontOfficeBundle\Entity\Message", mappedBy="vin")
     */
    private $messages;


    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Region", inversedBy="vin")
     * @ORM\JoinColumn(name="id_region", referencedColumnName="id")
     */
    private $region;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Appellation", inversedBy="vin")
     * @ORM\JoinColumn(name="appellation_id", referencedColumnName="id")
     */
    private $appellation;

     /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Domaine", inversedBy="vin")
     * @ORM\JoinColumn(name="domaine_id", referencedColumnName="id", nullable=true)
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
     * Set nameWine
     *
     * @param string $nameWine
     * @return Vin
     */
    public function setNameWine($nameWine)
    {
        $this->nameWine = $nameWine;
//        Creation automatique du slug lors de l'attribution d'un nouveau nom de vin
        $this->setSlug($nameWine);

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
     * Set region
     *
     * @param \Vin\FrontOfficeBundle\Region $region
     * @return Vin
     */
    public function setRegion(\Vin\FrontOfficeBundle\Entity\Region $region = null)
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

    /**
     * Set couleur
     *
     * @param integer $couleur
     * @return Vin
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return integer 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /*Fonction statique qui définit le choix des couleurs*/
    public static function getCouleurs()
    {
        return array(
            static::COLOR_RED => 'Rouge',
            static::COLOR_PINK => 'Rosé',
            static::COLOR_WHITE => 'Blanc',
            static::COLOR_SPARKLING => 'Pétillant',
            static::COLOR_SOFT => 'Moelleux'
        );
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Vin
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set appellation
     *
     * @param \Vin\FrontOfficeBundle\Entity\Appellation $appellation
     * @return Vin
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
     * Set domaine
     *
     * @param \Vin\FrontOfficeBundle\Entity\Domaine $domaine
     * @return Vin
     */
    public function setDomaine(\Vin\FrontOfficeBundle\Entity\Domaine $domaine = null)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return \Vin\FrontOfficeBundle\Entity\Domaine 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set vue
     *
     * @param string $vue
     * @return Vin
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
     * @return Vin
     */
    public function setSlug($slug)
    {
//        Mise en forme automatique du slug lorsqu'un vin est créé
        $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add messages
     *
     * @param \Vin\FrontOfficeBundle\Entity\Message $messages
     * @return Vin
     */
    public function addMessage(\Vin\FrontOfficeBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;

        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Vin\FrontOfficeBundle\Entity\Message $messages
     */
    public function removeMessage(\Vin\FrontOfficeBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
