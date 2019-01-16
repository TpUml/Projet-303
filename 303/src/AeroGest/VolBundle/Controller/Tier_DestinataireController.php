<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Tier_Destinataire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tier_destinataire controller.
 *
 */
class Tier_DestinataireController extends Controller
{
    /**
     * Lists all tier_Destinataire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tier_Destinataires = $em->getRepository('AeroGestVolBundle:Tier_Destinataire')->findAll();

        return $this->render('tier_destinataire/index.html.twig', array(
            'tier_Destinataires' => $tier_Destinataires,
        ));
    }

    /**
     * Creates a new tier_Destinataire entity.
     *
     */
    public function newAction(Request $request)
    {
        $tier_Destinataire = new Tier_destinataire();
        $form = $this->createForm('AeroGest\VolBundle\Form\Tier_DestinataireType', $tier_Destinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tier_Destinataire);
            $em->flush();

            return $this->redirectToRoute('destinataires_show', array('id' => $tier_Destinataire->getId()));
        }

        return $this->render('tier_destinataire/new.html.twig', array(
            'tier_Destinataire' => $tier_Destinataire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tier_Destinataire entity.
     *
     */
    public function showAction(Tier_Destinataire $tier_Destinataire)
    {
        $deleteForm = $this->createDeleteForm($tier_Destinataire);

        return $this->render('tier_destinataire/show.html.twig', array(
            'tier_Destinataire' => $tier_Destinataire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tier_Destinataire entity.
     *
     */
    public function editAction(Request $request, Tier_Destinataire $tier_Destinataire)
    {
        $deleteForm = $this->createDeleteForm($tier_Destinataire);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Tier_DestinataireType', $tier_Destinataire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('destinataires_edit', array('id' => $tier_Destinataire->getId()));
        }

        return $this->render('tier_destinataire/edit.html.twig', array(
            'tier_Destinataire' => $tier_Destinataire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tier_Destinataire entity.
     *
     */
    public function deleteAction(Request $request, Tier_Destinataire $tier_Destinataire)
    {
        $form = $this->createDeleteForm($tier_Destinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tier_Destinataire);
            $em->flush();
        }

        return $this->redirectToRoute('destinataires_index');
    }

    /**
     * Creates a form to delete a tier_Destinataire entity.
     *
     * @param Tier_Destinataire $tier_Destinataire The tier_Destinataire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tier_Destinataire $tier_Destinataire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('destinataires_delete', array('id' => $tier_Destinataire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
