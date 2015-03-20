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

class BoardsController extends FOSRestController {

    /**
     * Get specific board information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "BoardDetail"})
     * @param int $id board id
     * @return mixed
     */
    public function getBoardsAction($id)
    {
        $board = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Board')->find($id);

        if(!is_object($board)){
            throw $this->createNotFoundException();
        }
        return $board;
    }

} 