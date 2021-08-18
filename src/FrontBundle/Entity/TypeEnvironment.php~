<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEnvironment
 *
 * @ORM\Table(name="ltour_type_environment")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\TypeEnvironmentRepository")
 */
class TypeEnvironment
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
     * @ORM\OneToMany(targetEntity="Environments", mappedBy="type")
     */
     private $environment;


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
     * @return TypeEnvironment
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
     * @return TypeEnvironment
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
        $this->environment = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add environment
     *
     * @param \FrontBundle\Entity\Environments $environment
     *
     * @return TypeEnvironment
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
}
