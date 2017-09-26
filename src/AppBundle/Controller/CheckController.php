<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Check;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Check controller.
 *
 * @Route("check")
 */
class CheckController extends Controller
{
    /**
     * Lists all Check entities.
     *
     * @Route("/", name="check_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $checks = $em->getRepository('AppBundle:Check')->findAll();

        return $this->render('check/index.html.twig', array(
            'checks' => $checks,
        ));
    }

    /**
     * Creates a new Check entity.
     *
     * @Route("/new", name="check_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $check = new Check();
        $form = $this->createForm('AppBundle\Form\CheckType', $check);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($check);
            $em->flush();

            return $this->redirectToRoute('check_show', array('id' => $check->getId()));
        }

        return $this->render('check/new.html.twig', array(
            'check' => $check,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Check entity.
     *
     * @Route("/{id}", name="check_show")
     * @Method("GET")
     */
    public function showAction(Check $check)
    {
        $deleteForm = $this->createDeleteForm($check);

        return $this->render('check/show.html.twig', array(
            'check' => $check,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Check entity.
     *
     * @Route("/{id}/edit", name="check_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Check $check)
    {
        $deleteForm = $this->createDeleteForm($check);
        $editForm = $this->createForm('AppBundle\Form\CheckType', $check);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('check_edit', array('id' => $check->getId()));
        }

        return $this->render('check/edit.html.twig', array(
            'check' => $check,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Check entity.
     *
     * @Route("/{id}", name="check_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Check $check)
    {
        $form = $this->createDeleteForm($check);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($check);
            $em->flush();
        }

        return $this->redirectToRoute('check_index');
    }

    /**
     * Creates a form to delete a Check entity.
     *
     * @param Check $check The Check entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Check $check)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('check_delete', array('id' => $check->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}