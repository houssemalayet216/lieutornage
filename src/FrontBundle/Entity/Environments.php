<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Environments
 *
 * @ORM\Table(name="ltour_environments")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\EnvironmentsRepository")
 */
class Environments
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
     * @ORM\ManyToOne(targetEntity="TypeEnvironment", inversedBy="environment")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */

       private $type;







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
     * @return Environments
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
     * @return Environments
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
     * @param \FrontBundle\Entity\TypeEnvironment $type
     *
     * @return Environments
     */
    public function setType(\FrontBundle\Entity\TypeEnvironment $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \FrontBundle\Entity\TypeEnvironment
     */
    public function getType()
    {
        return $this->type;
    }
}
