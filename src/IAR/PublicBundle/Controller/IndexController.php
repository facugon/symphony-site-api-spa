<?php

namespace IAR\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Index controller.
 *
 * @Route("/")
 */
class IndexController extends Controller
{
    /**
     * @Route("/",name="public_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
