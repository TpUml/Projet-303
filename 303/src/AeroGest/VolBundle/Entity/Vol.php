<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="aerogest_vol")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\VolRepository")
 */
class Vol
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="datetime")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime")
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;
    
    /**
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Paquet", mappedBy="vol")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paquets;
    /**
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Passager", mappedBy="vol")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passagers;
    /**
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Site_Escale", mappedBy="vol")
     * @ORM\JoinColumn(nullable=false)
     */
    private $escales;
    
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Site_Destination", inversedBy="vols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Avion", inversedBy="vols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $avion;
    
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
     * @return Vol
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
     * Set type
     *
     * @param string $type
     *
     * @return Vol
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

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Vol
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Vol
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Vol
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Vol
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
     * @return Vol
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
     * Constructor
     */
    public function __construct()
    {
        $this->paquets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->passagers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->escales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Add paquet
     *
     * @param \EVM\MainBundle\Entity\Paquet $paquet
     *
     * @return Vol
     */
    public function addPaquet(\EVM\MainBundle\Entity\Paquet $paquet)
    {
        $this->paquets[] = $paquet;

        return $this;
    }

    /**
     * Remove paquet
     *
     * @param \EVM\MainBundle\Entity\Paquet $paquet
     */
    public function removePaquet(\EVM\MainBundle\Entity\Paquet $paquet)
    {
        $this->paquets->removeElement($paquet);
    }

    /**
     * Get paquets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaquets()
    {
        return $this->paquets;
    }

    /**
     * Add passager
     *
     * @param \EVM\MainBundle\Entity\Passager $passager
     *
     * @return Vol
     */
    public function addPassager(\EVM\MainBundle\Entity\Passager $passager)
    {
        $this->passagers[] = $passager;

        return $this;
    }

    /**
     * Remove passager
     *
     * @param \EVM\MainBundle\Entity\Passager $passager
     */
    public function removePassager(\EVM\MainBundle\Entity\Passager $passager)
    {
        $this->passagers->removeElement($passager);
    }

    /**
     * Get passagers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassagers()
    {
        return $this->passagers;
    }

    /**
     * Add escale
     *
     * @param \EVM\MainBundle\Entity\Site_Escale $escale
     *
     * @return Vol
     */
    public function addEscale(\EVM\MainBundle\Entity\Site_Escale $escale)
    {
        $this->escales[] = $escale;

        return $this;
    }

    /**
     * Remove escale
     *
     * @param \EVM\MainBundle\Entity\Site_Escale $escale
     */
    public function removeEscale(\EVM\MainBundle\Entity\Site_Escale $escale)
    {
        $this->escales->removeElement($escale);
    }

    /**
     * Get escales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEscales()
    {
        return $this->escales;
    }

    /**
     * Set destination
     *
     * @param \AeroGest\VolBundle\Entity\Destination $destination
     *
     * @return Vol
     */
    public function setDestination(\AeroGest\VolBundle\Entity\Destination $destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \AeroGest\VolBundle\Entity\Destination
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set avion
     *
     * @param \AeroGest\VolBundle\Entity\Avion $avion
     *
     * @return Vol
     */
    public function setAvion(\AeroGest\VolBundle\Entity\Avion $avion)
    {
        $this->avion = $avion;

        return $this;
    }

    /**
     * Get avion
     *
     * @return \AeroGest\VolBundle\Entity\Avion
     */
    public function getAvion()
    {
        return $this->avion;
    }
    
    public function __toString() {
        return $this->code;
    }
    
    
}
