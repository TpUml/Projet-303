<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Paquet_Bagage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Paquet_bagage controller.
 *
 */
class Paquet_BagageController extends Controller
{
    /**
     * Lists all paquet_Bagage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paquet_Bagages = $em->getRepository('AeroGestVolBundle:Paquet_Bagage')->findAll();

        return $this->render('paquet_bagage/index.html.twig', array(
            'paquet_Bagages' => $paquet_Bagages,
        ));
    }

    /**
     * Creates a new paquet_Bagage entity.
     *
     */
    public function newAction(Request $request)
    {
        $paquet_Bagage = new Paquet_bagage();
        $form = $this->createForm('AeroGest\VolBundle\Form\Paquet_BagageType', $paquet_Bagage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paquet_Bagage);
            $em->flush();

            return $this->redirectToRoute('bagages_show', array('id' => $paquet_Bagage->getId()));
        }

        return $this->render('paquet_bagage/new.html.twig', array(
            'paquet_Bagage' => $paquet_Bagage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paquet_Bagage entity.
     *
     */
    public function showAction(Paquet_Bagage $paquet_Bagage)
    {
        $deleteForm = $this->createDeleteForm($paquet_Bagage);

        return $this->render('paquet_bagage/show.html.twig', array(
            'paquet_Bagage' => $paquet_Bagage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paquet_Bagage entity.
     *
     */
    public function editAction(Request $request, Paquet_Bagage $paquet_Bagage)
    {
        $deleteForm = $this->createDeleteForm($paquet_Bagage);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Paquet_BagageType', $paquet_Bagage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bagages_edit', array('id' => $paquet_Bagage->getId()));
        }

        return $this->render('paquet_bagage/edit.html.twig', array(
            'paquet_Bagage' => $paquet_Bagage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paquet_Bagage entity.
     *
     */
    public function deleteAction(Request $request, Paquet_Bagage $paquet_Bagage)
    {
        $form = $this->createDeleteForm($paquet_Bagage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paquet_Bagage);
            $em->flush();
        }

        return $this->redirectToRoute('bagages_index');
    }

    /**
     * Creates a form to delete a paquet_Bagage entity.
     *
     * @param Paquet_Bagage $paquet_Bagage The paquet_Bagage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paquet_Bagage $paquet_Bagage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bagages_delete', array('id' => $paquet_Bagage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
