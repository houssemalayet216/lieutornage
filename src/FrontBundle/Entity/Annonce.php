<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="ltour_annonce")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=255)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="surfaceTotale", type="string", length=255)
     */
    private $surfaceTotale;

    /**
     * @var string
     *
     * @ORM\Column(name="surfacePiece", type="string", length=255)
     */
    private $surfacePiece;

    /**
     * @var string
     *
     * @ORM\Column(name="nbrPiece", type="string", length=255)
     */
    private $nbrPiece;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrNiveau", type="integer")
     */
    private $nbrNiveau;





  /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float")
     */
    private $tarif;


    /**
     * @var string
     *
     * @ORM\Column(name="typeTarification", type="string", length=255)
     */
    private $typeTarification;





    /** 
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User") 
   * @ORM\JoinColumn(nullable=false)
   */
   private $user;


       /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\categorie")
     * @ORM\JoinTable(name="ltour_categorie_annonce")
     */
   private $categorie;



    




     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Environments")
     * @ORM\JoinTable(name="ltour_environment_annonce")
     */
   private $environment;




     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\sousCategories")
     * @ORM\JoinTable(name="ltour_souscategorie_annonce")
     */
   private $sousCategorie;



    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Decoration")
     * @ORM\JoinTable(name="ltour_decoration_annonce")
     */
   private $decoration;





    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Equipement")
     * @ORM\JoinTable(name="ltour_equipement_annonce")
     */
   private $equipement;



    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Gallerie")
     * @ORM\JoinTable(name="ltour_gallerie_annonce")
     */
   private $gallerie;


   /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Services")
     * @ORM\JoinTable(name="ltour_service_annonce")
     */
   private $service;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;




   /**
     * @ORM\OneToMany(targetEntity="Disponibilite", mappedBy="annonce")
     * 
     */
     private $disponibilite;




      /**
     * @var datetime $deletedAt
     *
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedAt;






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
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
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
     * Set type
     *
     * @param string $type
     *
     * @return Annonce
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Annonce
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Annonce
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
     * Set cp
     *
     * @param string $cp
     *
     * @return Annonce
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set surfaceTotale
     *
     * @param string $surfaceTotale
     *
     * @return Annonce
     */
    public function setSurfaceTotale($surfaceTotale)
    {
        $this->surfaceTotale = $surfaceTotale;

        return $this;
    }

    /**
     * Get surfaceTotale
     *
     * @return string
     */
    public function getSurfaceTotale()
    {
        return $this->surfaceTotale;
    }

    /**
     * Set surfacePiece
     *
     * @param string $surfacePiece
     *
     * @return Annonce
     */
    public function setSurfacePiece($surfacePiece)
    {
        $this->surfacePiece = $surfacePiece;

        return $this;
    }

    /**
     * Get surfacePiece
     *
     * @return string
     */
    public function getSurfacePiece()
    {
        return $this->surfacePiece;
    }

    /**
     * Set nbrPiece
     *
     * @param string $nbrPiece
     *
     * @return Annonce
     */
    public function setNbrPiece($nbrPiece)
    {
        $this->nbrPiece = $nbrPiece;

        return $this;
    }

    /**
     * Get nbrPiece
     *
     * @return string
     */
    public function getNbrPiece()
    {
        return $this->nbrPiece;
    }

    /**
     * Set nbrNiveau
     *
     * @param integer $nbrNiveau
     *
     * @return Annonce
     */
    public function setNbrNiveau($nbrNiveau)
    {
        $this->nbrNiveau = $nbrNiveau;

        return $this;
    }

    /**
     * Get nbrNiveau
     *
     * @return int
     */
    public function getNbrNiveau()
    {
        return $this->nbrNiveau;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->environment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sousCategorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->decoration = new \Doctrine\Common\Collections\ArrayCollection();
        $this->equipement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gallerie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Annonce
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\categorie $categorie
     *
     * @return Annonce
     */
    public function addCategorie(\AppBundle\Entity\categorie $categorie)
    {

           if ($this->categorie->contains($categorie)) {
            return;
        }


        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\categorie $categorie
     */
    public function removeCategorie(\AppBundle\Entity\categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add environment
     *
     * @param \FrontBundle\Entity\Environments $environment
     *
     * @return Annonce
     */
    public function addEnvironment(\FrontBundle\Entity\Environments $environment)
    {
        $this->environment[] = $environment;

        return $this;
    }

    /**
     * Remove environment
     *
     * @param \FrontBundle\Entity\Environments $environment
     */
    public function removeEnvironment(\FrontBundle\Entity\Environments $environment)
    {
        $this->environment->removeElement($environment);
    }

    /**
     * Get environment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnvironment()
    {
        return $this->environment;
    }



    /**
     * Add decoration
     *
     * @param \FrontBundle\Entity\Decoration $decoration
     *
     * @return Annonce
     */
    public function addDecoration(\FrontBundle\Entity\Decoration $decoration)
    {
        $this->decoration[] = $decoration;

        return $this;
    }

    /**
     * Remove decoration
     *
     * @param \FrontBundle\Entity\Decoration $decoration
     */
    public function removeDecoration(\FrontBundle\Entity\Decoration $decoration)
    {
        $this->decoration->removeElement($decoration);
    }

    /**
     * Get decoration
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDecoration()
    {
        return $this->decoration;
    }

    /**
     * Add equipement
     *
     * @param \FrontBundle\Entity\Equipement $equipement
     *
     * @return Annonce
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
     * Add gallerie
     *
     * @param \FrontBundle\Entity\Gallerie $gallerie
     *
     * @return Annonce
     */
    public function addGallerie(\FrontBundle\Entity\Gallerie $gallerie)
    {
        $this->gallerie[] = $gallerie;

        return $this;
    }

    /**
     * Remove gallerie
     *
     * @param \FrontBundle\Entity\Gallerie $gallerie
     */
    public function removeGallerie(\FrontBundle\Entity\Gallerie $gallerie)
    {
        $this->gallerie->removeElement($gallerie);
    }

    /**
     * Get gallerie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGallerie()
    {
        return $this->gallerie;
    }

    /**
     * Add service
     *
     * @param \FrontBundle\Entity\Services $service
     *
     * @return Annonce
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
     * Add sousCategorie
     *
     * @param \AppBundle\Entity\sousCategories $sousCategorie
     *
     * @return Annonce
     */
    public function addSousCategorie(\AppBundle\Entity\sousCategories $sousCategorie)
    {
        $this->sousCategorie[] = $sousCategorie;

        return $this;
    }

    /**
     * Remove sousCategorie
     *
     * @param \AppBundle\Entity\sousCategories $sousCategorie
     */
    public function removeSousCategorie(\AppBundle\Entity\sousCategories $sousCategorie)
    {
        $this->sousCategorie->removeElement($sousCategorie);
    }

    /**
     * Get sousCategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     *
     * @return Annonce
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set typeTarification
     *
     * @param string $typeTarification
     *
     * @return Annonce
     */
    public function setTypeTarification($typeTarification)
    {
        $this->typeTarification = $typeTarification;

        return $this;
    }

    /**
     * Get typeTarification
     *
     * @return string
     */
    public function getTypeTarification()
    {
        return $this->typeTarification;
    }

       






    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return Annonce
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Add disponibilite
     *
     * @param \FrontBundle\Entity\Disponibilite $disponibilite
     *
     * @return Annonce
     */
    public function addDisponibilite(\FrontBundle\Entity\Disponibilite $disponibilite)
    {
        $this->disponibilite[] = $disponibilite;

        return $this;
    }

    /**
     * Remove disponibilite
     *
     * @param \FrontBundle\Entity\Disponibilite $disponibilite
     */
    public function removeDisponibilite(\FrontBundle\Entity\Disponibilite $disponibilite)
    {
        $this->disponibilite->removeElement($disponibilite);
    }

    /**
     * Get disponibilite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Annonce
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }


}
