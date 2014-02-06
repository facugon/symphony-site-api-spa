<?php

namespace IAR\ComprasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

//use IAR\ComprasBundle\Entity\Solicitud;
use IAR\ComprasBundle\Entity\Brand;

/**
 * Public compra controller.
 *
 * @Route("/solicitud")
 */
class SolicitudController extends Controller
{
    /**
     * Starts "Solicitud" process
     *
     * @Route("/", name="solicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $brands = $em->getRepository('IARComprasBundle:Brand')->findAll();

        return array('brands' => $brands );
    }
}
