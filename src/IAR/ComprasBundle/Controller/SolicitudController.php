<?php

namespace IAR\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use IAR\ComprasBundle\Entity\Solicitud;
use IAR\ComprasBundle\Entity\Brand;
use IAR\ComprasBundle\Entity\Zona;

use IAR\ComprasBundle\Form\SolicitudType;

/**
 * Solicitud controller.
 *
 * @Route("/")
 */
class SolicitudController extends Controller
{
    /**
     * Starts "Solicitud" process
     *
     * @Route("/solicitud/", name="solicitud")
     * @Method("GET")
     * @Template()
     */
    public function publicindexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $brands = $em->getRepository('IARComprasBundle:Brand')->findAll();
        $zonas = $em->getRepository('IARComprasBundle:Zona')->findAll();

        return array('brands' => $brands,'zonas' => $zonas);
    }

    /**
     * Lists all Solicitud entities.
     *
     * @Route("/admin/solicitud/", name="admin_solicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Solicitud')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Solicitud entity.
     *
     * @Route("/admin/solicitud/", name="admin_solicitud_create")
     * @Method("POST")
     * @Template("IARComprasBundle:Solicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Solicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_solicitud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Solicitud entity.
    *
    * @param Solicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Solicitud $entity)
    {
        $form = $this->createForm(new SolicitudType(), $entity, array(
            'action' => $this->generateUrl('admin_solicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Solicitud entity.
     *
     * @Route("/admin/solicitud/new", name="admin_solicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Solicitud();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Solicitud entity.
     *
     * @Route("/admin/solicitud/{id}", name="admin_solicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Solicitud entity.
     *
     * @Route("/admin/solicitud/{id}/edit", name="admin_solicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Solicitud entity.
    *
    * @param Solicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Solicitud $entity)
    {
        $form = $this->createForm(new SolicitudType(), $entity, array(
            'action' => $this->generateUrl('admin_solicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Solicitud entity.
     *
     * @Route("/admin/solicitud/{id}", name="admin_solicitud_update")
     * @Method("PUT")
     * @Template("IARComprasBundle:Solicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_solicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Solicitud entity.
     *
     * @Route("/admin/solicitud/{id}", name="admin_solicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IARComprasBundle:Solicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Solicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_solicitud'));
    }

    /**
     * Creates a form to delete a Solicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_solicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
