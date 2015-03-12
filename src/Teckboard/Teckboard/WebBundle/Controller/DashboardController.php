<?php

namespace Teckboard\Teckboard\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

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

    /**
     * @Route("/dashboards/template/{file}", requirements={"file" = "[A-z0-9._-]+"})
     * @Cache(expires="tomorrow")
     * @Template()
     */
    public function templateAction($file)
    {
        $pathInfo = pathinfo(str_replace('.', '/', $file) . '.html.twig');
        return $this->render(
            'TeckboardWebBundle:Template' . (!empty($pathInfo['dirname']) ? '/' . $pathInfo['dirname'] : '') . ':' . $pathInfo['basename']
        );
    }
}
