<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tier_Destinataire
 *
 * @ORM\Table(name="aerogest_tier_destinataire")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Tier_DestinataireRepository")
 */
class Tier_Destinataire extends Tier
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetrait", type="datetime")
     */
    private $dateRetrait;

    /**
     * @var bool
     *
     * @ORM\Column(name="validerReciever", type="boolean")
     */
    private $validerReciever;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordRetrait", type="string", length=255)
     */
    private $passwordRetrait;
    /**
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Paquet_Colis", mappedBy="destinataire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $colis;
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
     * Set dateRetrait
     *
     * @param \DateTime $dateRetrait
     *
     * @return Tier_Destinataire
     */
    public function setDateRetrait($dateRetrait)
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    /**
     * Get dateRetrait
     *
     * @return \DateTime
     */
    public function getDateRetrait()
    {
        return $this->dateRetrait;
    }

    /**
     * Set validerReciever
     *
     * @param boolean $validerReciever
     *
     * @return Tier_Destinataire
     */
    public function setValiderReciever($validerReciever)
    {
        $this->validerReciever = $validerReciever;

        return $this;
    }

    /**
     * Get validerReciever
     *
     * @return bool
     */
    public function getValiderReciever()
    {
        return $this->validerReciever;
    }

    /**
     * Set passwordRetrait
     *
     * @param string $passwordRetrait
     *
     * @return Tier_Destinataire
     */
    public function setPasswordRetrait($passwordRetrait)
    {
        $this->passwordRetrait = $passwordRetrait;

        return $this;
    }

    /**
     * Get passwordRetrait
     *
     * @return string
     */
    public function getPasswordRetrait()
    {
        return $this->passwordRetrait;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add coli
     *
     * @param \EVM\MainBundle\Entity\Paquet_Colis $coli
     *
     * @return Tier_Destinataire
     */
    public function addColi(\EVM\MainBundle\Entity\Paquet_Colis $coli)
    {
        $this->colis[] = $coli;

        return $this;
    }

    /**
     * Remove coli
     *
     * @param \EVM\MainBundle\Entity\Paquet_Colis $coli
     */
    public function removeColi(\EVM\MainBundle\Entity\Paquet_Colis $coli)
    {
        $this->colis->removeElement($coli);
    }

    /**
     * Get colis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getColis()
    {
        return $this->colis;
    }
}
