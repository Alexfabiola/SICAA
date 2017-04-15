<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asistencia
 *
 * @ORM\Table(name="asistencia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AsistenciaRepository")
 */
class Asistencia
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
     * @ORM\Column(name="hora_entrada", type="time")
     */
    private $horaEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_salida", type="time")
     */
    private $horaSalida;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fecha_de_acceso", type="date")
     */
    private $fecha;

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
     * Set horaEntrada
     *
     * @param \DateTime $horaEntrada
     *
     * @return Asistencia
     */
    public function setHoraEntrada($horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;

        return $this;
    }

    /**
     * Get horaEntrada
     *
     * @return \DateTime
     */
    public function getHoraEntrada()
    {
        return $this->horaEntrada;
    }

    /**
     * Set horaSalida
     *
     * @param \DateTime $horaSalida
     *
     * @return Asistencia
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;

        return $this;
    }

    /**
     * Get horaSalida
     *
     * @return \DateTime
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Asistencia
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }


    /**
     * Set personal
     *
     * @param \AppBundle\Entity\Personal $personal
     *
     * @return Asistencia
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
     * @return Asistencia
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
