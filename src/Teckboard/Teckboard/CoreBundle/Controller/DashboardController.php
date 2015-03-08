<?php

namespace Teckboard\Teckboard\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboards")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }
}
