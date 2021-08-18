<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="ltour_reservation")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime")
     */
    private $datefin;


       /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereservation", type="datetime")
     */
    private $datereservation;





    /**
     * @var float
     *
     * @ORM\Column(name="tarifTotal", type="float")
     */
    private $tarifTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="nomsociete", type="string", length=255)
     */
    private $nomsociete;

    /** 
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User") 
   * @ORM\JoinColumn(nullable=false)
   */
   private $client;


     /** 
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User") 
   * @ORM\JoinColumn(nullable=false)
   */
   private $loueur;


   /** 
   * @ORM\ManyToOne(targetEntity="Annonce") 
   * @ORM\JoinColumn(nullable=false)
   */
   private $annonce;



   /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Equipement")
     * @ORM\JoinTable(name="ltour_equipement_reservation")
     */
   private $equipement;


   /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Services")
     * @ORM\JoinTable(name="ltour_service_reservation")
     */
   private $service;


       /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;








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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Reservation
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Reservation
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set tarifTotal
     *
     * @param float $tarifTotal
     *
     * @return Reservation
     */
    public function setTarifTotal($tarifTotal)
    {
        $this->tarifTotal = $tarifTotal;

        return $this;
    }

    /**
     * Get tarifTotal
     *
     * @return float
     */
    public function getTarifTotal()
    {
        return $this->tarifTotal;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Reservation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Reservation
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reservation
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
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Reservation
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Reservation
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Reservation
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Reservation
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set nomsociete
     *
     * @param string $nomsociete
     *
     * @return Reservation
     */
    public function setNomsociete($nomsociete)
    {
        $this->nomsociete = $nomsociete;

        return $this;
    }

    /**
     * Get nomsociete
     *
     * @return string
     */
    public function getNomsociete()
    {
        return $this->nomsociete;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\User $client
     *
     * @return Reservation
     */
    public function setClient(\AppBundle\Entity\User $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\User
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set loueur
     *
     * @param \AppBundle\Entity\User $loueur
     *
     * @return Reservation
     */
    public function setLoueur(\AppBundle\Entity\User $loueur)
    {
        $this->loueur = $loueur;

        return $this;
    }

    /**
     * Get loueur
     *
     * @return \AppBundle\Entity\User
     */
    public function getLoueur()
    {
        return $this->loueur;
    }

    /**
     * Set annonce
     *
     * @param \FrontBundle\Entity\Annonce $annonce
     *
     * @return Reservation
     */
    public function setAnnonce(\FrontBundle\Entity\Annonce $annonce)
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
     * Constructor
     */
    public function __construct()
    {
        $this->equipement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add equipement
     *
     * @param \FrontBundle\Entity\Equipement $equipement
     *
     * @return Reservation
     */
    public function addEquipement(\FrontBundle\Entity\Equipement $equipement)
    {
        $this->equipement[] = $equipement;

        return $this;
    }

    /**
     * Remove equipement
     *
     * @param \FrontBundle\Entity\Equipement $equipement
     */
    public function removeEquipement(\FrontBundle\Entity\Equipement $equipement)
    {
        $this->equipement->removeElement($equipement);
    }

    /**
     * Get equipement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipement()
    {
        return $this->equipement;
    }

    /**
     * Add service
     *
     * @param \FrontBundle\Entity\Services $service
     *
     * @return Reservation
     */
    public function addService(\FrontBundle\Entity\Services $service)
    {
        $this->service[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \FrontBundle\Entity\Services $service
     */
    public function removeService(\FrontBundle\Entity\Services $service)
    {
        $this->service->removeElement($service);
    }

    /**
     * Get service
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Reservation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set datereservation
     *
     * @param \DateTime $datereservation
     *
     * @return Reservation
     */
    public function setDatereservation($datereservation)
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    /**
     * Get datereservation
     *
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }
}
