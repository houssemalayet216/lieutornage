<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="ltour_categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\categorieRepository")
 */
class categorie
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


      /**
     * @ORM\OneToMany(targetEntity="sousCategories", mappedBy="categorie")
     */
     private $sousCategorie;


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
     * @return categorie
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
     * @return categorie
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
     * Set image
     *
     * @param string $image
     *
     * @return categorie
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sousCategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sousCategorie
     *
     * @param \AppBundle\Entity\sousCategories $sousCategorie
     *
     * @return categorie
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
}
