<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Tier_Expediteur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tier_expediteur controller.
 *
 */
class Tier_ExpediteurController extends Controller
{
    /**
     * Lists all tier_Expediteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tier_Expediteurs = $em->getRepository('AeroGestVolBundle:Tier_Expediteur')->findAll();

        return $this->render('tier_expediteur/index.html.twig', array(
            'tier_Expediteurs' => $tier_Expediteurs,
        ));
    }

    /**
     * Creates a new tier_Expediteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $tier_Expediteur = new Tier_expediteur();
        $form = $this->createForm('AeroGest\VolBundle\Form\Tier_ExpediteurType', $tier_Expediteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tier_Expediteur);
            $em->flush();

            return $this->redirectToRoute('expediteurs_show', array('id' => $tier_Expediteur->getId()));
        }

        return $this->render('tier_expediteur/new.html.twig', array(
            'tier_Expediteur' => $tier_Expediteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tier_Expediteur entity.
     *
     */
    public function showAction(Tier_Expediteur $tier_Expediteur)
    {
        $deleteForm = $this->createDeleteForm($tier_Expediteur);

        return $this->render('tier_expediteur/show.html.twig', array(
            'tier_Expediteur' => $tier_Expediteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tier_Expediteur entity.
     *
     */
    public function editAction(Request $request, Tier_Expediteur $tier_Expediteur)
    {
        $deleteForm = $this->createDeleteForm($tier_Expediteur);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Tier_ExpediteurType', $tier_Expediteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('expediteurs_edit', array('id' => $tier_Expediteur->getId()));
        }

        return $this->render('tier_expediteur/edit.html.twig', array(
            'tier_Expediteur' => $tier_Expediteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tier_Expediteur entity.
     *
     */
    public function deleteAction(Request $request, Tier_Expediteur $tier_Expediteur)
    {
        $form = $this->createDeleteForm($tier_Expediteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tier_Expediteur);
            $em->flush();
        }

        return $this->redirectToRoute('expediteurs_index');
    }

    /**
     * Creates a form to delete a tier_Expediteur entity.
     *
     * @param Tier_Expediteur $tier_Expediteur The tier_Expediteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tier_Expediteur $tier_Expediteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('expediteurs_delete', array('id' => $tier_Expediteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
