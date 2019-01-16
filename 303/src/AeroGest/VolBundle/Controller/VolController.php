<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Vol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vol controller.
 *
 */
class VolController extends Controller
{
    /**
     * Lists all vol entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vols = $em->getRepository('AeroGestVolBundle:Vol')->findAll();

        return $this->render('vol/index.html.twig', array(
            'vols' => $vols,
        ));
    }

    /**
     * Creates a new vol entity.
     *
     */
    public function newAction(Request $request)
    {
        $vol = new Vol();
        $form = $this->createForm('AeroGest\VolBundle\Form\VolType', $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vol);
            $em->flush();

            return $this->redirectToRoute('vol_show', array('id' => $vol->getId()));
        }

        return $this->render('vol/new.html.twig', array(
            'vol' => $vol,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vol entity.
     *
     */
    public function showAction(Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);

        return $this->render('vol/show.html.twig', array(
            'vol' => $vol,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vol entity.
     *
     */
    public function editAction(Request $request, Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\VolType', $vol);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vol_edit', array('id' => $vol->getId()));
        }

        return $this->render('vol/edit.html.twig', array(
            'vol' => $vol,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vol entity.
     *
     */
    public function deleteAction(Request $request, Vol $vol)
    {
        $form = $this->createDeleteForm($vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vol);
            $em->flush();
        }

        return $this->redirectToRoute('vol_index');
    }

    /**
     * Creates a form to delete a vol entity.
     *
     * @param Vol $vol The vol entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vol $vol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vol_delete', array('id' => $vol->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
