<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquet_Colis
 *
 * @ORM\Table(name="aerogest_paquet_colis")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Paquet_ColisRepository")
 */
class Paquet_Colis extends Paquet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    Protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="villeExpedition", type="string", length=255)
     */
    private $villeExpedition;

    /**
     * @var string
     *
     * @ORM\Column(name="villeDestination", type="string", length=255)
     */
    private $villeDestination;

    /**
     * @var int
     *
     * @ORM\Column(name="fraisEnvoi", type="bigint")
     */
    private $fraisEnvoi;
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Tier_Destinataire", inversedBy="colis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expediteur;
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Tier_Expediteur", inversedBy="colis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinataire;

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
     * Set villeExpedition
     *
     * @param string $villeExpedition
     *
     * @return Paquet_Colis
     */
    public function setVilleExpedition($villeExpedition)
    {
        $this->villeExpedition = $villeExpedition;

        return $this;
    }

    /**
     * Get villeExpedition
     *
     * @return string
     */
    public function getVilleExpedition()
    {
        return $this->villeExpedition;
    }

    /**
     * Set villeDestination
     *
     * @param string $villeDestination
     *
     * @return Paquet_Colis
     */
    public function setVilleDestination($villeDestination)
    {
        $this->villeDestination = $villeDestination;

        return $this;
    }

    /**
     * Get villeDestination
     *
     * @return string
     */
    public function getVilleDestination()
    {
        return $this->villeDestination;
    }

    /**
     * Set fraisEnvoi
     *
     * @param integer $fraisEnvoi
     *
     * @return Paquet_Colis
     */
    public function setFraisEnvoi($fraisEnvoi)
    {
        $this->fraisEnvoi = $fraisEnvoi;

        return $this;
    }

    /**
     * Get fraisEnvoi
     *
     * @return int
     */
    public function getFraisEnvoi()
    {
        return $this->fraisEnvoi;
    }

    /**
     * Set expediteur
     *
     * @param \AeroGest\VolBundle\Entity\Tier_Destinateur $expediteur
     *
     * @return Paquet_Colis
     */
    public function setExpediteur(\AeroGest\VolBundle\Entity\Tier_Destinateur $expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur
     *
     * @return \AeroGest\VolBundle\Entity\Tier_Destinateur
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire
     *
     * @param \AeroGest\VolBundle\Entity\Tier_Expediteur $destinataire
     *
     * @return Paquet_Colis
     */
    public function setDestinataire(\AeroGest\VolBundle\Entity\Tier_Expediteur $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return \AeroGest\VolBundle\Entity\Tier_Expediteur
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }
}
