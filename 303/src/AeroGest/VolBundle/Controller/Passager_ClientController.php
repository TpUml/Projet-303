<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Passager_Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Passager_client controller.
 *
 */
class Passager_ClientController extends Controller
{
    /**
     * Lists all passager_Client entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passager_Clients = $em->getRepository('AeroGestVolBundle:Passager_Client')->findAll();

        return $this->render('passager_client/index.html.twig', array(
            'passager_Clients' => $passager_Clients,
        ));
    }

    /**
     * Creates a new passager_Client entity.
     *
     */
    public function newAction(Request $request)
    {
        $passager_Client = new Passager_client();
        $form = $this->createForm('AeroGest\VolBundle\Form\Passager_ClientType', $passager_Client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passager_Client);
            $em->flush();

            return $this->redirectToRoute('clients_show', array('id' => $passager_Client->getId()));
        }

        return $this->render('passager_client/new.html.twig', array(
            'passager_Client' => $passager_Client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passager_Client entity.
     *
     */
    public function showAction(Passager_Client $passager_Client)
    {
        $deleteForm = $this->createDeleteForm($passager_Client);

        return $this->render('passager_client/show.html.twig', array(
            'passager_Client' => $passager_Client,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passager_Client entity.
     *
     */
    public function editAction(Request $request, Passager_Client $passager_Client)
    {
        $deleteForm = $this->createDeleteForm($passager_Client);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Passager_ClientType', $passager_Client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clients_edit', array('id' => $passager_Client->getId()));
        }

        return $this->render('passager_client/edit.html.twig', array(
            'passager_Client' => $passager_Client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passager_Client entity.
     *
     */
    public function deleteAction(Request $request, Passager_Client $passager_Client)
    {
        $form = $this->createDeleteForm($passager_Client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passager_Client);
            $em->flush();
        }

        return $this->redirectToRoute('clients_index');
    }

    /**
     * Creates a form to delete a passager_Client entity.
     *
     * @param Passager_Client $passager_Client The passager_Client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passager_Client $passager_Client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clients_delete', array('id' => $passager_Client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
