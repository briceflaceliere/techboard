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

class ConnectorsController extends FOSRestController {

    /**
     * Get specific connector information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "ConnectorDetail"})
     * @param int $id connector id
     * @return mixed
     */
    public function getConnectorsAction($id)
    {
        $connector = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Connector')->find($id);

        if(!is_object($connector)){
            throw $this->createNotFoundException();
        }

        return $connector;
    }

} 