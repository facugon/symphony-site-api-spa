<?php

namespace IAR\MainBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Dashboard controller.
 *
 * @Route("/menu")
 */
class MenuController extends Controller
{
    /**
     * Show the Admin Menu
     *
     * @Route("/",name="admin_menu")
     * @Method("GET")
     * @Template()
     */
    public function currentRoleListAction()
    {
        /**
         * no logic implemented so far
         *
         * should be read from the database
         */
        return array();
    }
}
