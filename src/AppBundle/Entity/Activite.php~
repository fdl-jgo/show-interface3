<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActiviteRepository")
 */
class Activite
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
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;

    /**
     * One Activite est associé à many Presence(ParticipationCours). 
     * @ORM\OneToMany(targetEntity="ParticipationsCours", mappedBy="activite")
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
     * @return Activite
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
     * Set description
     *
     * @param string $description
     *
     * @return Activite
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
     * Set visible
     *
     * @param boolean $visible
     *
     * @return Activite
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return bool
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Add participationcourse
     *
     * @param \AppBundle\Entity\ParticipationsCours $participationcourse
     *
     * @return Activite
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
