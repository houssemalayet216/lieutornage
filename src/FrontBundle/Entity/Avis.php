<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="ltour_avis")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\AvisRepository")
 */
class Avis
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
     * @ORM\Column(name="nomcomplete", type="string", length=255)
     */
    private $nomcomplete;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="avis", type="integer")
     */
    private $avis;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;


      /**
     * @var datetime
     *
     * @ORM\Column(name="datepublication", type="datetime")
     */
    private $datepublication;


      /**
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumn(name="annonce_id", referencedColumnName="id")
     */

       private $annonce;



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
     * Set nomcomplete
     *
     * @param string $nomcomplete
     *
     * @return Avis
     */
    public function setNomcomplete($nomcomplete)
    {
        $this->nomcomplete = $nomcomplete;

        return $this;
    }

    /**
     * Get nomcomplete
     *
     * @return string
     */
    public function getNomcomplete()
    {
        return $this->nomcomplete;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Avis
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avis
     *
     * @param integer $avis
     *
     * @return Avis
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return int
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Avis
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set annonce
     *
     * @param \FrontBundle\Entity\Annonce $annonce
     *
     * @return Avis
     */
    public function setAnnonce(\FrontBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \FrontBundle\Entity\Annonce
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set datepublication
     *
     * @param \DateTime $datepublication
     *
     * @return Avis
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;

        return $this;
    }

    /**
     * Get datepublication
     *
     * @return \DateTime
     */
    public function getDatepublication()
    {
        return $this->datepublication;
    }
}
