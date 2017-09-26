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
 * @Route("reporte")
 */
class ReporteController extends Controller
{
    /**
     * Lists all Reportes
     *
     * @Route("/", name="reporte_index")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\reportType', 
                                null);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $persona = $em->getRepository('AppBundle:Personal')->findBy(array('ci' => $data['cedula']))[0];
            $checks = $em->getRepository('AppBundle:Check')->findBy(array('personal' => $persona));
            dump($data['fecha']);
            
            dump($persona);
            dump($checks);
            
            return $this->render('reporte/index.html.twig', 
                                array('form' => $form->createView(),));
        }
        return $this->render('reporte/index.html.twig', 
                                array('form' => $form->createView(),));
    }
}
