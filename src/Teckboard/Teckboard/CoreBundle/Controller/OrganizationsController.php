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

class OrganizationsController extends FOSRestController {

    /**
     * Get specific organization information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param int $id organization id
     * @return mixed
     */
    public function getOrganizationsAction($id)
    {
        $organization = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Organization')->find($id);

        if(!is_object($organization)){
            throw $this->createNotFoundException();
        }
        return $organization;
    }

    /**
     * Get board user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param int $id organization id
     *
     * @return mixed
     */
    public function getOrganizationBoardsAction($id)
    {
        return $this->getOrganizationsAction($id)->getBoards();
    }
} 