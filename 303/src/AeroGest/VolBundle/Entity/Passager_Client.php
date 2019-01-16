<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passager_Client
 *
 * @ORM\Table(name="aerogest_passager_client")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Passager_ClientRepository")
 */
class Passager_Client extends Passager
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
     * @ORM\Column(name="passport", type="string", length=255)
     */
    private $passport;

    /**
     * @var string
     *
     * @ORM\Column(name="visa", type="string", length=255)
     */
    private $visa;

    /**
     * @var string
     *
     * @ORM\Column(name="billetAvion", type="string", length=255)
     */
    private $billetAvion;
    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Paquet_Bagage", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bagages;
    
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
     * Set passport
     *
     * @param string $passport
     *
     * @return Passager_Client
     */
    public function setPassport($passport)
    {
        $this->passport = $passport;

        return $this;
    }

    /**
     * Get passport
     *
     * @return string
     */
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * Set visa
     *
     * @param string $visa
     *
     * @return Passager_Client
     */
    public function setVisa($visa)
    {
        $this->visa = $visa;

        return $this;
    }

    /**
     * Get visa
     *
     * @return string
     */
    public function getVisa()
    {
        return $this->visa;
    }

    /**
     * Set billetAvion
     *
     * @param string $billetAvion
     *
     * @return Passager_Client
     */
    public function setBilletAvion($billetAvion)
    {
        $this->billetAvion = $billetAvion;

        return $this;
    }

    /**
     * Get billetAvion
     *
     * @return string
     */
    public function getBilletAvion()
    {
        return $this->billetAvion;
    }

    /**
     * Set bagages
     *
     * @param \AeroGest\VolBundle\Entity\Paquet_Bagage $bagages
     *
     * @return Passager_Client
     */
    public function setBagages(\AeroGest\VolBundle\Entity\Paquet_Bagage $bagages)
    {
        $this->bagages = $bagages;

        return $this;
    }

    /**
     * Get bagages
     *
     * @return \AeroGest\VolBundle\Entity\Paquet_Bagage
     */
    public function getBagages()
    {
        return $this->bagages;
    }

    /**
     * Set vol
     *
     * @param \AeroGest\VolBundle\Entity\Vol $vol
     *
     * @return Passager_Client
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
