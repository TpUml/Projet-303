<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Site_Destination;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Site_destination controller.
 *
 */
class Site_DestinationController extends Controller
{
    /**
     * Lists all site_Destination entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $site_Destinations = $em->getRepository('AeroGestVolBundle:Site_Destination')->findAll();

        return $this->render('site_destination/index.html.twig', array(
            'site_Destinations' => $site_Destinations,
        ));
    }

    /**
     * Creates a new site_Destination entity.
     *
     */
    public function newAction(Request $request)
    {
        $site_Destination = new Site_destination();
        $form = $this->createForm('AeroGest\VolBundle\Form\Site_DestinationType', $site_Destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site_Destination);
            $em->flush();

            return $this->redirectToRoute('destinations_show', array('id' => $site_Destination->getId()));
        }

        return $this->render('site_destination/new.html.twig', array(
            'site_Destination' => $site_Destination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a site_Destination entity.
     *
     */
    public function showAction(Site_Destination $site_Destination)
    {
        $deleteForm = $this->createDeleteForm($site_Destination);

        return $this->render('site_destination/show.html.twig', array(
            'site_Destination' => $site_Destination,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing site_Destination entity.
     *
     */
    public function editAction(Request $request, Site_Destination $site_Destination)
    {
        $deleteForm = $this->createDeleteForm($site_Destination);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Site_DestinationType', $site_Destination);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('destinations_edit', array('id' => $site_Destination->getId()));
        }

        return $this->render('site_destination/edit.html.twig', array(
            'site_Destination' => $site_Destination,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a site_Destination entity.
     *
     */
    public function deleteAction(Request $request, Site_Destination $site_Destination)
    {
        $form = $this->createDeleteForm($site_Destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($site_Destination);
            $em->flush();
        }

        return $this->redirectToRoute('destinations_index');
    }

    /**
     * Creates a form to delete a site_Destination entity.
     *
     * @param Site_Destination $site_Destination The site_Destination entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Site_Destination $site_Destination)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('destinations_delete', array('id' => $site_Destination->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
