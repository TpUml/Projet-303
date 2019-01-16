<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site_Destination
 *
 * @ORM\Table(name="aerogest_site_destination")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Site_DestinationRepository")
 */
class Site_Destination extends Site
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
     * @ORM\OneToMany(targetEntity="AeroGest\VolBundle\Entity\Vol", mappedBy="destination")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vols;
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
     * Constructor
     */
    public function __construct()
    {
        $this->vols = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vol
     *
     * @param \EVM\MainBundle\Entity\Vol $vol
     *
     * @return Site_Destination
     */
    public function addVol(\EVM\MainBundle\Entity\Vol $vol)
    {
        $this->vols[] = $vol;

        return $this;
    }

    /**
     * Remove vol
     *
     * @param \EVM\MainBundle\Entity\Vol $vol
     */
    public function removeVol(\EVM\MainBundle\Entity\Vol $vol)
    {
        $this->vols->removeElement($vol);
    }

    /**
     * Get vols
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVols()
    {
        return $this->vols;
    }
}
