<?php

namespace AeroGest\VolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paquet_Bagage
 *
 * @ORM\Table(name="aerogest_paquet_bagage")
 * @ORM\Entity(repositoryClass="AeroGest\VolBundle\Repository\Paquet_BagageRepository")
 */
class Paquet_Bagage extends Paquet
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
     * @ORM\Column(name="nature", type="string", length=255)
     */
    private $nature;

    /**
     * @var string
     *
     * @ORM\Column(name="privateNote", type="text")
     */
    private $privateNote;

    /**
     * @ORM\ManyToOne(targetEntity="AeroGest\VolBundle\Entity\Passager_Client", inversedBy="bagages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passager;
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
     * Set nature
     *
     * @param string $nature
     *
     * @return Paquet_Bagage
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set privateNote
     *
     * @param string $privateNote
     *
     * @return Paquet_Bagage
     */
    public function setPrivateNote($privateNote)
    {
        $this->privateNote = $privateNote;

        return $this;
    }

    /**
     * Get privateNote
     *
     * @return string
     */
    public function getPrivateNote()
    {
        return $this->privateNote;
    }

    /**
     * Set passager
     *
     * @param \AeroGest\VolBundle\Entity\Passager_Client $passager
     *
     * @return Paquet_Bagage
     */
    public function setPassager(\AeroGest\VolBundle\Entity\Passager_Client $passager)
    {
        $this->passager = $passager;

        return $this;
    }

    /**
     * Get passager
     *
     * @return \AeroGest\VolBundle\Entity\Passager_Client
     */
    public function getPassager()
    {
        return $this->passager;
    }
}
