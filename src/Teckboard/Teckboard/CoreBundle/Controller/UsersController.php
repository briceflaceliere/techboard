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

class UsersController extends FOSRestController {

    /**
     * Get current user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "Me"})
     * @return mixed
     */
    public function getUsersMeAction()
    {
        $user = $this->getUser();

        if(!is_object($user)){
            throw $this->createNotFoundException();
        }

        return $user;
    }

    /**
     * Get specific user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param int $id User id
     * @return mixed
     */
    public function getUsersAction($id)
    {
        $user = $this->getDoctrine()->getRepository('TeckboardCoreBundle:User')->find($id);

        if(!is_object($user)){
            throw $this->createNotFoundException();
        }

        return $user;
    }



    /**
     * Get board user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param mixed $id User id
     *
     * @return mixed
     */
    public function getUserBoardsAction($id)
    {
        return $this->getUsersAction($id)->getBoards();
    }

    /**
     * Get user organizations
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param mixed $id User id
     *
     * @return mixed
     */
    public function getUserOrganizationsAction($id)
    {
        return $this->getUsersAction($id)->getOrganizations();
    }
} 