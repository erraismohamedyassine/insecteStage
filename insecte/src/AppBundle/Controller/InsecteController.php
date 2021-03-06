<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Insecte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Insecte controller.
 *
 * @Route("/insecte")
 */
class InsecteController extends Controller
{
    /**
     * Lists all insecte entities.
     *
     * @Route("/", name="insecte_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $insectes = $em->getRepository('AppBundle:Insecte')->findAll();

        return $this->render('insecte/index.html.twig', array(
            'insectes' => $insectes,
        ));
    }

    /**
     * Creates a new insecte entity.
     *
     * @Route("/new", name="insecte_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $insecte = new Insecte();
        $form = $this->createForm('AppBundle\Form\InsecteType', $insecte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($insecte);
            $em->flush();

            return $this->redirectToRoute('insecte_show', array('id' => $insecte->getId()));
        }

        return $this->render('insecte/new.html.twig', array(
            'insecte' => $insecte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a insecte entity.
     *
     * @Route("/{id}", name="insecte_show")
     * @Method("GET")
     */
    public function showAction(Insecte $insecte)
    {
        $deleteForm = $this->createDeleteForm($insecte);

        $id = $insecte->getId();
        $insecte = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Insecte')
            ->find($id);

        return $this->render('insecte/show.html.twig', array(
            'insecte' => $insecte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing insecte entity.
     *
     * @Route("/{id}/edit", name="insecte_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Insecte $insecte)
    {
        $deleteForm = $this->createDeleteForm($insecte);
        $editForm = $this->createForm('AppBundle\Form\InsecteType', $insecte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('insecte_edit', array('id' => $insecte->getId()));
        }


        return $this->render('insecte/edit.html.twig', array(
            'insecte' => $insecte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a insecte entity.
     *
     * @Route("/{id}", name="insecte_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Insecte $insecte)
    {
        $form = $this->createDeleteForm($insecte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($insecte);
            $em->flush();
        }

        return $this->redirectToRoute('insecte_index');
    }

    /**
     * Creates a form to delete a insecte entity.
     *
     * @param Insecte $insecte The insecte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Insecte $insecte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('insecte_delete', array('id' => $insecte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
