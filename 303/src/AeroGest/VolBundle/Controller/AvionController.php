<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Avion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Avion controller.
 *
 */
class AvionController extends Controller
{
    /**
     * Lists all avion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avions = $em->getRepository('AeroGestVolBundle:Avion')->findAll();

        return $this->render('avion/index.html.twig', array(
            'avions' => $avions,
        ));
    }

    /**
     * Creates a new avion entity.
     *
     */
    public function newAction(Request $request)
    {
        $avion = new Avion();
        $form = $this->createForm('AeroGest\VolBundle\Form\AvionType', $avion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avion);
            $em->flush();

            return $this->redirectToRoute('avion_show', array('id' => $avion->getId()));
        }

        return $this->render('avion/new.html.twig', array(
            'avion' => $avion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a avion entity.
     *
     */
    public function showAction(Avion $avion)
    {
        $deleteForm = $this->createDeleteForm($avion);

        return $this->render('avion/show.html.twig', array(
            'avion' => $avion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avion entity.
     *
     */
    public function editAction(Request $request, Avion $avion)
    {
        $deleteForm = $this->createDeleteForm($avion);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\AvionType', $avion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avion_edit', array('id' => $avion->getId()));
        }

        return $this->render('avion/edit.html.twig', array(
            'avion' => $avion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avion entity.
     *
     */
    public function deleteAction(Request $request, Avion $avion)
    {
        $form = $this->createDeleteForm($avion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($avion);
            $em->flush();
        }

        return $this->redirectToRoute('avion_index');
    }

    /**
     * Creates a form to delete a avion entity.
     *
     * @param Avion $avion The avion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Avion $avion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avion_delete', array('id' => $avion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
