<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Panier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\BasketRepository")
 */
class Basket
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
     * @ORM\Column(name="nameProduct", type="string", length=255)
     */
    private $nameProduct;

    /**
     * @var integer
     * @Assert\NotNull()
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     * @Assert\NotNull()
     * @Assert\Type(type="integer", message="La valeur {{ value }} n'est pas un type {{ type }} valide.")
     * @ORM\Column(name="priceUnit", type="integer")
     */
    private $priceUnit;


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
     * Set nameProduct
     *
     * @param string $nameProduct
     * @return Basket
     */
    public function setNameProduct($nameProduct)
    {
        $this->nameProduct = $nameProduct;

        return $this;
    }

    /**
     * Get nameProduct
     *
     * @return string 
     */
    public function getNameProduct()
    {
        return $this->nameProduct;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Basket
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set priceUnit
     *
     * @param integer $priceUnit
     * @return Basket
     */
    public function setPriceUnit($priceUnit)
    {
        $this->priceUnit = $priceUnit;

        return $this;
    }

    /**
     * Get priceUnit
     *
     * @return integer 
     */
    public function getPriceUnit()
    {
        return $this->priceUnit;
    }
}
