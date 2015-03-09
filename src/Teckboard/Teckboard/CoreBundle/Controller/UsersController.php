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

class UsersController extends FOSRestController {

    /**
     * @View(serializerGroups={"Default"})
     * @param $name
     * @return mixed
     */
    public function getUsersAction($name){
        $user = $this->getDoctrine()->getRepository('TeckboardCoreBundle:User')->findOneByName($name);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return $user;
    }

    /**
     * @View(serializerGroups={"Default","Me"})
     * @return mixed
     */
    public function meUsersAction(){
        return $this->getUser();
    }

} 