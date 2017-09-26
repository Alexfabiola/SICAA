<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acceso
 *
 * @ORM\Table(name="acceso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccesoRepository")
 */
class Acceso
{
    private static $DIAS = array(
                1=>'Lunes',
                2=>'Martes', 
                3=>'Miercoles',
                4=>'Jueves',
                5=>'Viernes',
                6=>'Sabado',
                7=>'Domingo');

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
     * @var \Date
     *
     * @ORM\Column(name="vigencia_inicio", type="date")
     */
    private $vigenciaInicio;

    /**
     * @var \Date
     *
     * @ORM\Column(name="vigencia_fin", type="date")
     */
    private $vigenciaFin;

    /**
     * @var \Time
     *
     * @ORM\Column(name="hora_inicio", type="time")
     */
    private $horaInicio;

    /**
     * @var \Time
     *
     * @ORM\Column(name="hora_fin", type="time")
     */
    private $horaFin;

    /**
     * @var array
     *
     * @ORM\Column(name="dias", type="array")
     */
    private $dias;

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

    public function __construct()
    {
       $this->dias = array();
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

    /**
     * Set vigenciaInicio
     *
     * @param \DateTime $vigenciaInicio
     *
     * @return Acceso
     */
    public function setVigenciaInicio($vigenciaInicio)
    {
        $this->vigenciaInicio = $vigenciaInicio;

        return $this;
    }

    /**
     * Get vigenciaInicio
     *
     * @return \DateTime
     */
    public function getVigenciaInicio()
    {
        return $this->vigenciaInicio;
    }

    /**
     * Set vigenciaFin
     *
     * @param \DateTime $vigenciaFin
     *
     * @return Acceso
     */
    public function setVigenciaFin($vigenciaFin)
    {
        $this->vigenciaFin = $vigenciaFin;

        return $this;
    }

    /**
     * Get vigenciaFin
     *
     * @return \DateTime
     */
    public function getVigenciaFin()
    {
        return $this->vigenciaFin;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     *
     * @return Acceso
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     *
     * @return Acceso
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Get dias
     *
     * @return array
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set dias
     *
     * @param array $array
     *
     * @return Acceso
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    public function esValido()
    {
        $fechaActual = new \DateTime();
        $horaActual = $fechaActual->format('H:i:s');
        if (($fechaActual >= $this->vigenciaInicio) && ($fechaActual <= $this->vigenciaFin)) {
            if (($horaActual >= $this->horaInicio->format('H:i:s')) && ($horaActual <= $this->horaFin->format('H:i:s'))) {
                return (in_array(self::$DIAS[date('N')] , $this->dias));
            }
        }
        return(false);
    }
}
