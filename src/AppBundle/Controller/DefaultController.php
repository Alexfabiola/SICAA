<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Check;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    /*public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }*/

    /**
     * Creates a new personal entity.
     *
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    /*public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $date = $em->getRepository('AppBundle:Default')->findAll();

        return $this->render('default/index.html.twig', array(
            'date' => $date,
        ));
    }*/

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\verificarType', 
                                null);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $aux = $em->getRepository('AppBundle:Personal')->findBy(array('ci' => $data['cedula']));
            $valido = false; 
            $check = null;
            if (!empty($aux)) {
                $personal = $aux[0];
                $area = $em->getRepository('AppBundle:Area')->find($data['area']);
                $accesos = $em->getRepository('AppBundle:Acceso')->findBy(array(
                    'persona' => $personal,'lugar' => $area, 'estado' => "habilitado"));
                
                $i = 0; 
                while($i < count($accesos) && !$valido) {
                    $valido = $accesos[$i]->esValido();
                    if($valido){
                        $check = new Check($personal,$area);
                        /* Aqui se Guarda el check */
                        $em->persist($check);
                        $em->flush();
                    }
                    $i++;
                }
            }
            return $this->render('default/index.html.twig', 
                    array('form' => $form->createView(), 'check' => $check, 'valido' => $valido));
        }
        return $this->render('default/index.html.twig', 
                                array('form' => $form->createView(),));
    }
}