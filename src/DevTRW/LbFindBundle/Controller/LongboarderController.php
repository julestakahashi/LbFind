<?php

namespace DevTRW\LbFindBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DevTRW\LbFindBundle\Entity\Longboarder;
use DevTRW\LbFindBundle\Form\LongboarderType;

/**
 * Longboarder controller.
 *
 */
class LongboarderController extends Controller
{

    /**
     * Lists all Longboarder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DevTRWLbFindBundle:Longboarder')->findAll();

        return $this->render('DevTRWLbFindBundle:Longboarder:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Longboarder entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Longboarder();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('DevTRW_Lonboarder_show', array('id' => $entity->getId())));
        }

        return $this->render('DevTRWLbFindBundle:Longboarder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Longboarder entity.
     *
     * @param Longboarder $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Longboarder $entity)
    {
        $form = $this->createForm(new LongboarderType(), $entity, array(
            'action' => $this->generateUrl('DevTRW_Lonboarder_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Longboarder entity.
     *
     */
    public function newAction()
    {
        $entity = new Longboarder();
        $form   = $this->createCreateForm($entity);

        return $this->render('DevTRWLbFindBundle:Longboarder:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Longboarder entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevTRWLbFindBundle:Longboarder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Longboarder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevTRWLbFindBundle:Longboarder:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Longboarder entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevTRWLbFindBundle:Longboarder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Longboarder entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DevTRWLbFindBundle:Longboarder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Longboarder entity.
    *
    * @param Longboarder $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Longboarder $entity)
    {
        $form = $this->createForm(new LongboarderType(), $entity, array(
            'action' => $this->generateUrl('DevTRW_Lonboarder_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Longboarder entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevTRWLbFindBundle:Longboarder')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Longboarder entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('DevTRW_Lonboarder_edit', array('id' => $id)));
        }

        return $this->render('DevTRWLbFindBundle:Longboarder:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Longboarder entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DevTRWLbFindBundle:Longboarder')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Longboarder entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('DevTRW_Lonboarder'));
    }

    /**
     * Creates a form to delete a Longboarder entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('DevTRW_Lonboarder_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
