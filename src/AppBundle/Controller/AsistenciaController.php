<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Asistencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Asistencia controller.
 *
 * @Route("asistencia")
 */
class AsistenciaController extends Controller
{
    /**
     * Lists all asistencia entities.
     *
     * @Route("/", name="asistencia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $asistencias = $em->getRepository('AppBundle:Asistencia')->findAll();

        return $this->render('asistencia/index.html.twig', array(
            'asistencias' => $asistencias,
        ));
    }

    /**
     * Creates a new asistencia entity.
     *
     * @Route("/new", name="asistencia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $asistencia = new Asistencia();
        $form = $this->createForm('AppBundle\Form\AsistenciaType', $asistencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asistencia);
            $em->flush();

            return $this->redirectToRoute('asistencia_show', array('id' => $asistencia->getId()));
        }

        return $this->render('asistencia/new.html.twig', array(
            'asistencia' => $asistencia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a asistencia entity.
     *
     * @Route("/{id}", name="asistencia_show")
     * @Method("GET")
     */
    public function showAction(Asistencia $asistencia)
    {
        $deleteForm = $this->createDeleteForm($asistencia);

        return $this->render('asistencia/show.html.twig', array(
            'asistencia' => $asistencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing asistencia entity.
     *
     * @Route("/{id}/edit", name="asistencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Asistencia $asistencia)
    {
        $deleteForm = $this->createDeleteForm($asistencia);
        $editForm = $this->createForm('AppBundle\Form\AsistenciaType', $asistencia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asistencia_edit', array('id' => $asistencia->getId()));
        }

        return $this->render('asistencia/edit.html.twig', array(
            'asistencia' => $asistencia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a asistencia entity.
     *
     * @Route("/{id}", name="asistencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Asistencia $asistencia)
    {
        $form = $this->createDeleteForm($asistencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($asistencia);
            $em->flush();
        }

        return $this->redirectToRoute('asistencia_index');
    }

    /**
     * Creates a form to delete a asistencia entity.
     *
     * @param asistencia $asistencia The asistencia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Asistencia $asistencia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asistencia_delete', array('id' => $asistencia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
