<?php

namespace IAR\ComprasAPIBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use IAR\ComprasBundle\Entity\Model;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Model controller.
 *
 * @Route("/model", defaults={"_format": "json"})
 */
class ModelController extends FOSRestController
{
    /**
     * Lists all Model entities.
     *
     * @Route("/", name="api_model_getall")
     * @Method("GET")
     * @Rest\View
     */
    public function getallAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Model')->findAll();

        return array( 'models' => $entities );
    }

    /**
     * Get a Model
     *
     * @Route("/{id}", name="api_model_get")
     * @Method("GET")
     * @Rest\View
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Model')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Model not found');
        }

        return array( 'model' => $entity );
    }
}
