<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acceso
 *
 * @ORM\Table(name="tiene_acceso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccesoRepository")
 */
class Acceso
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
     * @ORM\Column(name="estado", type="string", length=20)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dia_inicio", type="date")
     */
    private $diaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dia_fin", type="date")
     */
    private $diaFin;

    /**
     * @ORM\ManyToOne(targetEntity="Personal")
     * @ORM\JoinColumn(name="persona_id", referencedColumnName="id")
     */
    private $persona;

    /**
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumn(name="lugar_id", referencedColumnName="id")
     */
    private $lugar;


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
     * Set estado
     *
     * @param string $estado
     *
     * @return Acceso
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set diaInicio
     *
     * @param \DateTime $diaInicio
     *
     * @return Acceso
     */
    public function setDiaInicio($diaInicio)
    {
        $this->diaInicio = $diaInicio;

        return $this;
    }

    /**
     * Get diaInicio
     *
     * @return \DateTime
     */
    public function getDiaInicio()
    {
        return $this->diaInicio;
    }

    /**
     * Set diaFin
     *
     * @param \DateTime $diaFin
     *
     * @return Acceso
     */
    public function setDiaFin($diaFin)
    {
        $this->diaFin = $diaFin;

        return $this;
    }

    /**
     * Get diaFin
     *
     * @return \DateTime
     */
    public function getDiaFin()
    {
        return $this->diaFin;
    }

    /**
     * Set persona
     *
     * @param \AppBundle\Entity\Personal $persona
     *
     * @return Acceso
     */
    public function setPersona(\AppBundle\Entity\Personal $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \AppBundle\Entity\Personal
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set lugar
     *
     * @param \AppBundle\Entity\Area $lugar
     *
     * @return Acceso
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
