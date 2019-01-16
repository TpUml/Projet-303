<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Site_Escale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Site_escale controller.
 *
 */
class Site_EscaleController extends Controller
{
    /**
     * Lists all site_Escale entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $site_Escales = $em->getRepository('AeroGestVolBundle:Site_Escale')->findAll();

        return $this->render('site_escale/index.html.twig', array(
            'site_Escales' => $site_Escales,
        ));
    }

    /**
     * Creates a new site_Escale entity.
     *
     */
    public function newAction(Request $request)
    {
        $site_Escale = new Site_escale();
        $form = $this->createForm('AeroGest\VolBundle\Form\Site_EscaleType', $site_Escale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site_Escale);
            $em->flush();

            return $this->redirectToRoute('escales_show', array('id' => $site_Escale->getId()));
        }

        return $this->render('site_escale/new.html.twig', array(
            'site_Escale' => $site_Escale,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a site_Escale entity.
     *
     */
    public function showAction(Site_Escale $site_Escale)
    {
        $deleteForm = $this->createDeleteForm($site_Escale);

        return $this->render('site_escale/show.html.twig', array(
            'site_Escale' => $site_Escale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing site_Escale entity.
     *
     */
    public function editAction(Request $request, Site_Escale $site_Escale)
    {
        $deleteForm = $this->createDeleteForm($site_Escale);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Site_EscaleType', $site_Escale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('escales_edit', array('id' => $site_Escale->getId()));
        }

        return $this->render('site_escale/edit.html.twig', array(
            'site_Escale' => $site_Escale,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a site_Escale entity.
     *
     */
    public function deleteAction(Request $request, Site_Escale $site_Escale)
    {
        $form = $this->createDeleteForm($site_Escale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($site_Escale);
            $em->flush();
        }

        return $this->redirectToRoute('escales_index');
    }

    /**
     * Creates a form to delete a site_Escale entity.
     *
     * @param Site_Escale $site_Escale The site_Escale entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Site_Escale $site_Escale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('escales_delete', array('id' => $site_Escale->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
