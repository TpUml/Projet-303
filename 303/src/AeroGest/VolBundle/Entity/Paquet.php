<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquet
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"bagage"= "AeroGest\VolBundle\Entity\Paquet_Bagage", "colis"= "AeroGest\VolBundle\Entity\Paquet_Colis" })
 * @ORM\Table(name="aerogest_paquet")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\PaquetRepository")
 */
abstract class Paquet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    protected $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float")
     */
    protected $poids;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    protected $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    protected $statut;

    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Vol", inversedBy="paquets")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $vol;
    
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
     * Set code
     *
     * @param string $code
     *
     * @return Paquet
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Paquet
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Paquet
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
     * Set poids
     *
     * @param float $poids
     *
     * @return Paquet
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Paquet
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Paquet
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Paquet
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set vol
     *
     * @param \AeroGest\VolBundle\Entity\Vol $vol
     *
     * @return Paquet
     */
    public function setVol(\AeroGest\VolBundle\Entity\Vol $vol)
    {
        $this->vol = $vol;

        return $this;
    }

    /**
     * Get vol
     *
     * @return \AeroGest\VolBundle\Entity\Vol
     */
    public function getVol()
    {
        return $this->vol;
    }
    
    public function __toString() {
        return $this->libelle;
    }
    
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }
}
