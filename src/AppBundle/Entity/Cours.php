<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="nom", type="string", length=100, unique=true)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="collectif", type="boolean")
     */
    private $collectif;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="smallint")
     */
    private $duree;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participants", type="smallint")
     */
    private $nbParticipants;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * Many Courses have being dispense by one Personne.
     * @ORM\ManyToOne(targetEntity="Personne", inversedBy="courses")
     * @ORM\JoinColumn(name="personne_id", referencedColumnName="id")
     */
    private $personne;

    /**
     * One Cours est associé à many Presence(ParticipationCours). 
     * @ORM\OneToMany(targetEntity="ParticipationsCours", mappedBy="cours")
     */
    private $participationcourses;

    public function __construct() {
        $this->participationcourses = new ArrayCollection();
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Cours
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Cours
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cours
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
     * Set collectif
     *
     * @param boolean $collectif
     *
     * @return Cours
     */
    public function setCollectif($collectif)
    {
        $this->collectif = $collectif;

        return $this;
    }

    /**
     * Get collectif
     *
     * @return bool
     */
    public function getCollectif()
    {
        return $this->collectif;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Cours
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set nbParticipants
     *
     * @param integer $nbParticipants
     *
     * @return Cours
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get nbParticipants
     *
     * @return int
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Cours
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Cours
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set personne
     *
     * @param \AppBundle\Entity\Personne $personne
     *
     * @return Cours
     */
    public function setPersonne(\AppBundle\Entity\Personne $personne = null)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return \AppBundle\Entity\Personne
     */
    public function getPersonne()
    {
        return $this->personne;
    }

    /**
     * Add participationcourse
     *
     * @param \AppBundle\Entity\ParticipationsCours $participationcourse
     *
     * @return Cours
     */
    public function addParticipationcourse(\AppBundle\Entity\ParticipationsCours $participationcourse)
    {
        $this->participationcourses[] = $participationcourse;

        return $this;
    }

    /**
     * Remove participationcourse
     *
     * @param \AppBundle\Entity\ParticipationsCours $participationcourse
     */
    public function removeParticipationcourse(\AppBundle\Entity\ParticipationsCours $participationcourse)
    {
        $this->participationcourses->removeElement($participationcourse);
    }

    /**
     * Get participationcourses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipationcourses()
    {
        return $this->participationcourses;
    }
}
