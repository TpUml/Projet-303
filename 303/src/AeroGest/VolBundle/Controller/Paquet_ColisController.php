<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Paquet_Colis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Paquet_coli controller.
 *
 */
class Paquet_ColisController extends Controller
{
    /**
     * Lists all paquet_Coli entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paquet_Colis = $em->getRepository('AeroGestVolBundle:Paquet_Colis')->findAll();

        return $this->render('paquet_colis/index.html.twig', array(
            'paquet_Colis' => $paquet_Colis,
        ));
    }

    /**
     * Creates a new paquet_Coli entity.
     *
     */
    public function newAction(Request $request)
    {
        $paquet_Coli = new Paquet_coli();
        $form = $this->createForm('AeroGest\VolBundle\Form\Paquet_ColisType', $paquet_Coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paquet_Coli);
            $em->flush();

            return $this->redirectToRoute('colis_show', array('id' => $paquet_Coli->getId()));
        }

        return $this->render('paquet_colis/new.html.twig', array(
            'paquet_Coli' => $paquet_Coli,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paquet_Coli entity.
     *
     */
    public function showAction(Paquet_Colis $paquet_Coli)
    {
        $deleteForm = $this->createDeleteForm($paquet_Coli);

        return $this->render('paquet_colis/show.html.twig', array(
            'paquet_Coli' => $paquet_Coli,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paquet_Coli entity.
     *
     */
    public function editAction(Request $request, Paquet_Colis $paquet_Coli)
    {
        $deleteForm = $this->createDeleteForm($paquet_Coli);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Paquet_ColisType', $paquet_Coli);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('colis_edit', array('id' => $paquet_Coli->getId()));
        }

        return $this->render('paquet_colis/edit.html.twig', array(
            'paquet_Coli' => $paquet_Coli,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paquet_Coli entity.
     *
     */
    public function deleteAction(Request $request, Paquet_Colis $paquet_Coli)
    {
        $form = $this->createDeleteForm($paquet_Coli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paquet_Coli);
            $em->flush();
        }

        return $this->redirectToRoute('colis_index');
    }

    /**
     * Creates a form to delete a paquet_Coli entity.
     *
     * @param Paquet_Colis $paquet_Coli The paquet_Coli entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paquet_Colis $paquet_Coli)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('colis_delete', array('id' => $paquet_Coli->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
