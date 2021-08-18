<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reference
 *
 * @ORM\Table(name="ltour_reference")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\ReferenceRepository")
 */
class Reference
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
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;


      /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;



    /**
     * @var string
     *
     * @ORM\Column(name="datesortie", type="string", length=255,nullable=true)
     */
    private $datesortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="premiersortie", type="datetime")
     */
    private $premiersortie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepublication", type="datetime")
     */
    private $datepublication;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


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
     * @return Reference
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
     * @return Reference
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
     * Set pays
     *
     * @param string $pays
     *
     * @return Reference
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set datesortie
     *
     * @param string $datesortie
     *
     * @return Reference
     */
    public function setDatesortie($datesortie)
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    /**
     * Get datesortie
     *
     * @return string
     */
    public function getDatesortie()
    {
        return $this->datesortie;
    }

    /**
     * Set premiersortie
     *
     * @param \DateTime $premiersortie
     *
     * @return Reference
     */
    public function setPremiersortie($premiersortie)
    {
        $this->premiersortie = $premiersortie;

        return $this;
    }

    /**
     * Get premiersortie
     *
     * @return \DateTime
     */
    public function getPremiersortie()
    {
        return $this->premiersortie;
    }

    /**
     * Set datepublication
     *
     * @param \DateTime $datepublication
     *
     * @return Reference
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

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Reference
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
     * Set type
     *
     * @param string $type
     *
     * @return Reference
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
}
