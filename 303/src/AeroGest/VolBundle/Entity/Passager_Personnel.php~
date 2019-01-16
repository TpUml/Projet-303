<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passager_Personnel
 *
 * @ORM\Table(name="aerogest_passager_personnel")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Passager_PersonnelRepository")
 */
class Passager_Personnel extends Passager
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
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Compagnie", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compagnie;
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
     * Set compagnie
     *
     * @param \AeroGest\VolBundle\Entity\Compagnie $compagnie
     *
     * @return Passager_Personnel
     */
    public function setCompagnie(\AeroGest\VolBundle\Entity\Compagnie $compagnie)
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    /**
     * Get compagnie
     *
     * @return \AeroGest\VolBundle\Entity\Compagnie
     */
    public function getCompagnie()
    {
        return $this->compagnie;
    }

    /**
     * Set vol
     *
     * @param \AeroGest\VolBundle\Entity\Vol $vol
     *
     * @return Passager_Personnel
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
}
