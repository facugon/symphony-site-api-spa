<?php

namespace IAR\ComprasAPIBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IAR\ComprasBundle\Entity\Brand;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Brand controller.
 *
 * @Route("/brand", defaults={"_format": "json"})
 */
class BrandController extends FOSRestController
{
    /**
     * Lists all Brand entities.
     *
     * @Route("/", name="api_brand_getall")
     * @Method("GET")
     * @Rest\View
     */
    public function getallAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Brand')->findAll();

        return array('brands' => $entities);
    }

    /**
     * Get a Brand
     *
     * @Route("/{id}", name="api_brand_get")
     * @Method("GET")
     * @Rest\View
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Brand')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Brand not found.');
        }

        return array('brand' => $entity);
    }
}
