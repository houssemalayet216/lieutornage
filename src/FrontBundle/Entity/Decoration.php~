<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Decoration
 *
 * @ORM\Table(name="ltour_decoration")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\DecorationRepository")
 */
class Decoration
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
     * @ORM\ManyToOne(targetEntity="TypeDecoration", inversedBy="decoration")
     * @ORM\JoinColumn(name="decoration_id", referencedColumnName="id")
     */

       private $typeDecoration;







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
     * @return Decoration
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
     * @return Decoration
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
     * Set typeDecoration
     *
     * @param \FrontBundle\Entity\TypeDecoration $typeDecoration
     *
     * @return Decoration
     */
    public function setTypeDecoration(\FrontBundle\Entity\TypeDecoration $typeDecoration = null)
    {
        $this->typeDecoration = $typeDecoration;

        return $this;
    }

    /**
     * Get typeDecoration
     *
     * @return \FrontBundle\Entity\TypeDecoration
     */
    public function getTypeDecoration()
    {
        return $this->typeDecoration;
    }
}
