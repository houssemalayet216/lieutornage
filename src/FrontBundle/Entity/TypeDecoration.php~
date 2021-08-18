<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDecoration
 *
 * @ORM\Table(name="ltour_type_decoration")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\TypeDecorationRepository")
 */
class TypeDecoration
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
     * @ORM\OneToMany(targetEntity="Decoration", mappedBy="typeDecoration")
     */
     private $decoration;

     


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
     * @return TypeDecoration
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
     * @return TypeDecoration
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
     * Constructor
     */
    public function __construct()
    {
        $this->decoration = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add decoration
     *
     * @param \FrontBundle\Entity\Decoration $decoration
     *
     * @return TypeDecoration
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
}
