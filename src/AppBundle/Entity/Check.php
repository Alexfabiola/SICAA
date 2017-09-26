<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Check
 *
 * @ORM\Table(name="check_table")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CheckRepository")
 */
class Check
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechahora", type="datetime")
     */
    private $fechaHora;

    /**
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumn(name="personal_id", referencedColumnName="id")
     */
    private $personal;

    /**
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumn(name="lugar_id", referencedColumnName="id")
     */
    private $lugar;

    public function __construct(\AppBundle\Entity\Personal $personal = null,\AppBundle\Entity\Area $lugar = null)
    {
        $this->personal = $personal;
        $this->lugar = $lugar;
        $this->fechaHora = new \DateTime();
    }
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     *
     * @return Check
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set personal
     *
     * @param \AppBundle\Entity\Personal $personal
     *
     * @return Check
     */
    public function setPersonal(\AppBundle\Entity\Personal $personal = null)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return \AppBundle\Entity\Personal
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Set lugar
     *
     * @param \AppBundle\Entity\Area $lugar
     *
     * @return Check
     */
    public function setLugar(\AppBundle\Entity\Area $lugar = null)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return \AppBundle\Entity\Area
     */
    public function getLugar()
    {
        return $this->lugar;
    }
}