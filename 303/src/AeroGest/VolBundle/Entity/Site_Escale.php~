<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site_Escale
 *
 * @ORM\Table(name="aerogest_site_escale")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Site_EscaleRepository")
 */
class Site_Escale extends Site
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
     * @ORM\Column(name="dateEscale", type="datetime")
     */
    private $dateEscale;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text")
     */
    private $motif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="datetime")
     */
    private $dateDepart;
    
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Vol", inversedBy="escales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vol;
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
     * Set dateEscale
     *
     * @param \DateTime $dateEscale
     *
     * @return Site_Escale
     */
    public function setDateEscale($dateEscale)
    {
        $this->dateEscale = $dateEscale;

        return $this;
    }

    /**
     * Get dateEscale
     *
     * @return \DateTime
     */
    public function getDateEscale()
    {
        return $this->dateEscale;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Site_Escale
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
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Site_Escale
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set vol
     *
     * @param \AeroGest\VolBundle\Entity\Vol $vol
     *
     * @return Site_Escale
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
