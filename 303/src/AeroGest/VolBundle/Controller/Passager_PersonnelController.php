<?php

namespace AeroGest\VolBundle\Controller;

use AeroGest\VolBundle\Entity\Passager_Personnel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Passager_personnel controller.
 *
 */
class Passager_PersonnelController extends Controller
{
    /**
     * Lists all passager_Personnel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passager_Personnels = $em->getRepository('AeroGestVolBundle:Passager_Personnel')->findAll();

        return $this->render('passager_personnel/index.html.twig', array(
            'passager_Personnels' => $passager_Personnels,
        ));
    }

    /**
     * Creates a new passager_Personnel entity.
     *
     */
    public function newAction(Request $request)
    {
        $passager_Personnel = new Passager_personnel();
        $form = $this->createForm('AeroGest\VolBundle\Form\Passager_PersonnelType', $passager_Personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($passager_Personnel);
            $em->flush();

            return $this->redirectToRoute('personnel_show', array('id' => $passager_Personnel->getId()));
        }

        return $this->render('passager_personnel/new.html.twig', array(
            'passager_Personnel' => $passager_Personnel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a passager_Personnel entity.
     *
     */
    public function showAction(Passager_Personnel $passager_Personnel)
    {
        $deleteForm = $this->createDeleteForm($passager_Personnel);

        return $this->render('passager_personnel/show.html.twig', array(
            'passager_Personnel' => $passager_Personnel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing passager_Personnel entity.
     *
     */
    public function editAction(Request $request, Passager_Personnel $passager_Personnel)
    {
        $deleteForm = $this->createDeleteForm($passager_Personnel);
        $editForm = $this->createForm('AeroGest\VolBundle\Form\Passager_PersonnelType', $passager_Personnel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_edit', array('id' => $passager_Personnel->getId()));
        }

        return $this->render('passager_personnel/edit.html.twig', array(
            'passager_Personnel' => $passager_Personnel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a passager_Personnel entity.
     *
     */
    public function deleteAction(Request $request, Passager_Personnel $passager_Personnel)
    {
        $form = $this->createDeleteForm($passager_Personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($passager_Personnel);
            $em->flush();
        }

        return $this->redirectToRoute('personnel_index');
    }

    /**
     * Creates a form to delete a passager_Personnel entity.
     *
     * @param Passager_Personnel $passager_Personnel The passager_Personnel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Passager_Personnel $passager_Personnel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_delete', array('id' => $passager_Personnel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
