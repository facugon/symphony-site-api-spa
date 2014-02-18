<?php

namespace IAR\ComprasAPIBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use IAR\ComprasBundle\Entity\Model;
use IAR\CommonsBundle\Model\JSONRPC2\Response as JSONResponse;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Model controller.
 *
 * @Route("/api/model", defaults={"_format": "json"})
 */
class ModelController extends FOSRestController
{
    /**
     * Lists all Model entities.
     *
     * @Route("/", name="api_model_getall")
     * @Method("GET")
     */
    public function getallAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Model')->findAll();

        $response = new JSONResponse( array('models' => $entities), 200 );
        return $response->getContent();
    }

    /**
     * Get a Model
     *
     * @Route("/{id}", name="api_model_get")
     * @Method("GET")
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Model')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Model not found');
        }

        $response = new JSONResponse( array('model' => $entity), 200 );
        return $response->getContent();
    }
}
