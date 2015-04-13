<?php
/**
 * Created by PhpStorm.
 * User: brice
 * Date: 09/03/15
 * Time: 13:09
 */

namespace Teckboard\Teckboard\CoreBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class WidgetsController extends FOSRestController {

    /**
     * Get specific widget information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "WidgetDetail"})
     * @param int $id widget id
     * @return mixed
     */
    public function getWidgetsAction($id)
    {
        $widget = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Widget')->find($id);

        if(!is_object($widget)){
            throw $this->createNotFoundException();
        }
        return $widget;
    }

    /**
     * Get specific widget information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "WidgetDetail"})
     * @param int $id widget id
     * @return mixed
     */
    public function getWidgetsUrlAction($id)
    {
        $widget = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Widget')->find($id);

        if(!is_object($widget)){
            throw $this->createNotFoundException();
        }
        return $widget->getUrl();
    }

} 