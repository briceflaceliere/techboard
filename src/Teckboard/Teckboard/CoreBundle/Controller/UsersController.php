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
     * Get specific user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default"})
     * @param string $name User name
     * @return mixed
     */
    public function getUsersAction($name)
    {
        $user = $this->getDoctrine()->getRepository('TeckboardCoreBundle:User')->findOneByName($name);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return $user;
    }

    /**
     * Get connected user information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default","Me"})
     *
     * @return mixed
     */
    public function getMeAction()
    {
        return $this->getUser();
    }

} 