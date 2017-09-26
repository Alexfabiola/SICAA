<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Acceso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Personal;
use AppBundle\Entity\Check;

/**
 * Acceso controller.
 *
 * @Route("asistencia")
 */
class AsistenciaController extends Controller
{
    /**
     * Lists all Asistencia 
     *
     * @Route("/", name="asistencia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $checks = $em->getRepository('AppBundle:Check')->findAll();
        $checksByPersonal = array();
        /*   [checksByPersonal][checksByDay][checks]*/
        foreach ($checks as $check) {
            $checksByPersonal[$check->getPersonal()->getCi()][$check->getFechaHora()->format('d/m/Y')][] = $check;
        }
        return $this->render('asistencia/index.html.twig', array(
            'checksByPersonal' => $checksByPersonal));
    }
}