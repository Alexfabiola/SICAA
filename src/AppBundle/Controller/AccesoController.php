<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Acceso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Acceso controller.
 *
 * @Route("acceso")
 */
class AccesoController extends Controller
{
    /**
     * Lists all Acceso entities.
     *
     * @Route("/", name="acceso_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Accesos = $em->getRepository('AppBundle:Acceso')->findAll();

        return $this->render('acceso/index.html.twig', array(
            'Accesos' => $Accesos,
        ));
    }

    /**
     * Creates a new Acceso entity.
     *
     * @Route("/new", name="acceso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $Acceso = new acceso();
        $form = $this->createForm('AppBundle\Form\AccesoType', $Acceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Acceso);
            $em->flush();

            return $this->redirectToRoute('acceso_show', array('id' => $Acceso->getId()));
        }

        return $this->render('acceso/new.html.twig', array(
            'Acceso' => $Acceso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Acceso entity.
     *
     * @Route("/{id}", name="acceso_show")
     * @Method("GET")
     */
    public function showAction(Acceso $Acceso)
    {
        $deleteForm = $this->createDeleteForm($Acceso);

        return $this->render('acceso/show.html.twig', array(
            'Acceso' => $Acceso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Acceso entity.
     *
     * @Route("/{id}/edit", name="acceso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Acceso $Acceso)
    {
        $deleteForm = $this->createDeleteForm($Acceso);
        $editForm = $this->createForm('AppBundle\Form\AccesoType', $Acceso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('acceso_edit', array('id' => $Acceso->getId()));
        }

        return $this->render('acceso/edit.html.twig', array(
            'Acceso' => $Acceso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Acceso entity.
     *
     * @Route("/{id}", name="acceso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Acceso $Acceso)
    {
        $form = $this->createDeleteForm($Acceso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Acceso);
            $em->flush();
        }

        return $this->redirectToRoute('acceso_index');
    }

    /**
     * Creates a form to delete a Acceso entity.
     *
     * @param Acceso $Acceso The Acceso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Acceso $Acceso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acceso_delete', array('id' => $Acceso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
