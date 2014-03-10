<?php

namespace IAR\ComprasAPIBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use IAR\ComprasBundle\Entity\Solicitud;
use IAR\CommonsBundle\Model\JSONRPC2\Response as JSONResponse;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Solicitud controller.
 *
 * @Route("/api/solicitud", defaults={"_format": "json"})
 */
class SolicitudController extends FOSRestController
{
    /**
     * Lists all Solicitudes entities.
     *
     * @Route("/", name="api_solicitud_getall")
     * @Method("GET")
     */
    public function getallAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IARComprasBundle:Solicitud')->findAll();

        $response = new JSONResponse( array('solicitudes' => $entities), 200 );
        return $response->getContent();
    }

    /**
     * Get a Solicitud
     *
     * @Route("/{id}", name="api_solicitud_get")
     * @Method("GET")
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IARComprasBundle:Solicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Solicitud not found.');
        }

        $response = new JSONResponse( array('solicitud' => $entity), 200 );
        return $response->getContent();
    }

    /**
     * New Solicitud
     *
     * @Route("/", name="api_solicitud_post")
     * @Method("POST")
     */
    public function postAction()
    {
        $input = $this->getRequest()->request->get('solicitud') ;
        $solicitud = new Solicitud();

        $em = $this->getDoctrine()->getManager();
        $input['brand'] = $em->getRepository('IARComprasBundle:Brand')->find( $input['brand'] );
        $input['model'] = $em->getRepository('IARComprasBundle:Model')->find( $input['model'] );

        foreach( $input['zona'] as $id ) {
            $solicitud->addZona( $em->getRepository('IARCommonsBundle:Zona')->find( $id ) );
        }

        $solicitud->set($input);
        $solicitud->setDate( new \DateTime('NOW') );
        $solicitud->setTime( new \DateTime('NOW') );
        $solicitud->setTimestamp( new \DateTime('NOW') );

        $validator = $this->get('validator');
        $errors = $validator->validate($solicitud);

        if( count($errors) > 0 )
            $response = new JSONResponse($errors, 400);

        else {
            $em = $this->getDoctrine()->getManager();
            $em->persist($solicitud);
            $em->flush();

            $response = new JSONResponse('ok', 200);
        }

        return $response->getContent();
    }
}
