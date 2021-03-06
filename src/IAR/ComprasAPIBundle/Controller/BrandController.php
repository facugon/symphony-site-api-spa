<?php

namespace IAR\ComprasAPIBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use IAR\ComprasBundle\Entity\Brand;
use IAR\CommonsBundle\Model\JSONRPC2\Response as JSONResponse;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Brand controller.
 *
 * @Route("/api/brand", defaults={"_format": "json"})
 */
class BrandController extends FOSRestController
{
    /**
     * Lists all Brand entities.
     *
     * @Route("/", name="api_brand_getall")
     * @Method("GET")
     */
    public function getallAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Brand')->findAll();

        $response = new JSONResponse( array('brands' => $entities), 200 );
        return $response->getContent();
    }

    /**
     * Get a Brand
     *
     * @Route("/{id}", name="api_brand_get")
     * @Method("GET")
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Brand')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Brand not found.');
        }

        $response = new JSONResponse( array('brand' => $entity), 200 );
        return $response->getContent();
    }

    /**
     * New Brand
     *
     * @Route("/", name="api_brand_post")
     * @Method("POST")
     */
    public function postAction() {
    }
}
