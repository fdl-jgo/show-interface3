<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipationsCours
 *
 * @ORM\Table(name="participations_cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParticipationsCoursRepository")
 */
class ParticipationsCours
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
     * @var bool
     *
     * @ORM\Column(name="presence", type="boolean")
     */
    private $presence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime", nullable=true)
     */
    private $dateInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAnnulation", type="datetime", nullable=true)
     */
    private $dateAnnulation;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255, nullable=true)
     */
    private $motif;

    /**
     * Many presence(pariticipationcours) sont faites par une  Personne.
     * @ORM\ManyToOne(targetEntity="Personne", inversedBy="participationcourses")
     * @ORM\JoinColumn(name="personne_id", referencedColumnName="id")
     */
    private $personne;

    /**
     * Many presence(pariticipationcours) sont relié a un Cours.
     * @ORM\ManyToOne(targetEntity="Cours", inversedBy="participationcourses")
     * @ORM\JoinColumn(name="cours_id", referencedColumnName="id")
     */
    private $cours;

    /**
     * Many presence(pariticipationcours) sont relié a un active.
     * @ORM\ManyToOne(targetEntity="Activite", inversedBy="participationcourses")
     * @ORM\JoinColumn(name="activite_id", referencedColumnName="id")
     */
    private $activite;


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
     * Set presence
     *
     * @param boolean $presence
     *
     * @return ParticipationsCours
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;

        return $this;
    }

    /**
     * Get presence
     *
     * @return bool
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return ParticipationsCours
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set dateAnnulation
     *
     * @param \DateTime $dateAnnulation
     *
     * @return ParticipationsCours
     */
    public function setDateAnnulation($dateAnnulation)
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    /**
     * Get dateAnnulation
     *
     * @return \DateTime
     */
    public function getDateAnnulation()
    {
        return $this->dateAnnulation;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return ParticipationsCours
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set personne
     *
     * @param \AppBundle\Entity\Personne $personne
     *
     * @return ParticipationsCours
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
     * Set cours
     *
     * @param \AppBundle\Entity\Cours $cours
     *
     * @return ParticipationsCours
     */
    public function setCours(\AppBundle\Entity\Cours $cours = null)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return \AppBundle\Entity\Cours
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set activite
     *
     * @param \AppBundle\Entity\Activite $activite
     *
     * @return ParticipationsCours
     */
    public function setActivite(\AppBundle\Entity\Activite $activite = null)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return \AppBundle\Entity\Activite
     */
    public function getActivite()
    {
        return $this->activite;
    }
}
