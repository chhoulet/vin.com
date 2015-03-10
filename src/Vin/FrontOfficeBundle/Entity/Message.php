<?php

namespace Vin\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vin\FrontOfficeBundle\Entity\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMessage", type="date")
     */
    private $dateMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="emailMessage", type="string", length=255)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     *
     */
    private $emailMessage;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Vin\FrontOfficeBundle\Entity\Vin", inversedBy="messages")
     * JoinColumn(name="vin_id", referencedColumnName="id")
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
     * Set username
     *
     * @param string $username
     * @return Message
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     * @return Message
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime 
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set emailMessage
     *
     * @param string $emailMessage
     * @return Message
     */
    public function setEmailMessage($emailMessage)
    {
        $this->emailMessage = $emailMessage;

        return $this;
    }

    /**
     * Get emailMessage
     *
     * @return string 
     */
    public function getEmailMessage()
    {
        return $this->emailMessage;
    }

    /**
     * Set vin
     *
     * @param \Vin\FrontOfficeBundle\Entity\Vin $vin
     * @return Message
     */
    public function setVin(\Vin\FrontOfficeBundle\Entity\Vin $vin = null)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return \Vin\FrontOfficeBundle\Entity\Vin 
     */
    public function getVin()
    {
        return $this->vin;
    }
}
