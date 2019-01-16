<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tier_Expediteur
 *
 * @ORM\Table(name="aerogest_tier_expediteur")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Tier_ExpediteurRepository")
 */
class Tier_Expediteur extends Tier
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
     * @ORM\Column(name="nationalite", type="string", length=255)
     */
    private $nationalite;

    /**
     * @var bool
     *
     * @ORM\Column(name="validerEnvoi", type="boolean")
     */
    private $validerEnvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordSender", type="string", length=255)
     */
    private $passwordSender;
    /**
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Paquet_Colis", mappedBy="expediteur")
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
     * Set nationalite
     *
     * @param string $nationalite
     *
     * @return Tier_Expediteur
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set validerEnvoi
     *
     * @param boolean $validerEnvoi
     *
     * @return Tier_Expediteur
     */
    public function setValiderEnvoi($validerEnvoi)
    {
        $this->validerEnvoi = $validerEnvoi;

        return $this;
    }

    /**
     * Get validerEnvoi
     *
     * @return bool
     */
    public function getValiderEnvoi()
    {
        return $this->validerEnvoi;
    }

    /**
     * Set passwordSender
     *
     * @param string $passwordSender
     *
     * @return Tier_Expediteur
     */
    public function setPasswordSender($passwordSender)
    {
        $this->passwordSender = $passwordSender;

        return $this;
    }

    /**
     * Get passwordSender
     *
     * @return string
     */
    public function getPasswordSender()
    {
        return $this->passwordSender;
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
     * @return Tier_Expediteur
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
