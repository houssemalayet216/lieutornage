<?php
        // src/AppBundle/Entity/User.php

        namespace AppBundle\Entity;

        use FOS\UserBundle\Model\User as BaseUser;
        use Doctrine\ORM\Mapping as ORM;
        use Symfony\Component\Validator\Constraints as Assert;

        /**
         * @ORM\Entity
         * @ORM\Table(name="ltour_user")
         */
          class User extends BaseUser
        {
            /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;







        
    /**      
     * @var string
     *
     * @ORM\Column(name="type_compte", type="string", length=255)
     * @Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     * 
     */
    protected $typeCompte;




      /**      
     * @var string
     *
     * @ORM\Column(name="type_hote", type="string", length=255,nullable=true)
     * 
     * 
     */
    protected $typeHote;








     /**      
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255,nullable=true)
     * 
     */
    protected $societe;




     /**      
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255,nullable=true)
     *
     * 
     */
    protected $fonction;









      /**      
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255)
     *@Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     * 
     */
    protected $civilite;


      /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     *
     */
    protected $nom;







    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     *@Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     * 
     */

    protected $prenom;

     /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     * @Assert\NotBlank(message="le champ ville  ne doit pas  être vide")
     */
    protected $ville;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     * @Assert\NotBlank(message="le champ adresse  ne doit pas  être vide")
     */
    protected $adresse;

        /**
     * @var string
     *
     * @ORM\Column(name="cp", type="integer", length=4)
     * @Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     * @Assert\Regex(
     *     pattern="/^[0-9]+$/",
     *     message="code postale doit  être un nombre"
     * )
     * @Assert\Length(
     *     min=4,
     *     max=4,
     *     minMessage="Code postale doit  être en 4 chiffre",
     *     maxMessage="Code postale doit  être en 4 chiffre"
     * )
     *
     *
     */
    protected $cp;




     /**
     * @var string
     * @Assert\NotBlank(message="ce champ  ne doit pas  être vide")
     * @ORM\Column(name="telephone", type="integer", length=8)
     *@Assert\Regex(
     *     pattern="/^(9|2|5|4|7)[0-9]{7}$/",
     *     message="Némuro telephone est pas valid."
     * )
     * 
     */
    protected $telephone;





      /**
     * @var string
     *
     * @ORM\Column(name="photo", type="text",nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg","image/png" },mimeTypesMessage = "Le fichier doit etre image" )
     */
    protected $photo;





            public function __construct()
            {
                parent::__construct();
                
            }


    /**
     * Set typeCompte
     *
     * @param string $typeCompte
     *
     * @return User
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * Get typeCompte
     *
     * @return string
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return User
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return User
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return User
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return User
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
     * Set ville
     *
     * @param string $ville
     *
     * @return User
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
     * @return User
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
     * @param integer $cp
     *
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set typeHote
     *
     * @param string $typeHote
     *
     * @return User
     */
    public function setTypeHote($typeHote)
    {
        $this->typeHote = $typeHote;

        return $this;
    }

    /**
     * Get typeHote
     *
     * @return string
     */
    public function getTypeHote()
    {
        return $this->typeHote;
    }
}
