<?php
/**
 * Created by PhpStorm.
 * User: brice
 * Date: 09/03/15
 * Time: 13:09
 */

namespace Teckboard\Teckboard\CoreBundle\Controller;


use Doctrine\Common\Proxy\Exception\InvalidArgumentException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Util\Codes;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolationList;

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
        return $this->handleView(\FOS\RestBundle\View\View::create($board));
    }

    /**
     * Put specific board information
     *
     * @ApiDoc
     * @View(serializerGroups={"Default", "BoardDetail"})
     * @param int $id board id
     * @return mixed
     */
    public function putBoardsWidgetsPositionsAction(Request $request, $id)
    {
        $board = $this->getDoctrine()->getRepository('TeckboardCoreBundle:Board')->find($id);

        if (!is_object($board)) {
            throw $this->createNotFoundException();
        }

        if (!$newPositions = $request->get('widgets')) {
            throw new InvalidArgumentException('Widget data not found');
        }

        $validator = $this->get('validator');

        $errorList = new ConstraintViolationList();

        //Hydrate widgets entity
        foreach ($board->getWidgets() as $widgetEntity) {
            if (isset($newPositions[$widgetEntity->getId()])) {
                $newPosition = $newPositions[$widgetEntity->getId()];
                $widgetEntity->setPositionX($newPosition['position_x'])
                             ->setPositionY($newPosition['position_y'])
                             ->setWidth($newPosition['width'])
                             ->setHeight($newPosition['height']);
                $errorList->addAll($validator->validate($widgetEntity));
            }
        }

        $errorList->addAll($validator->validate($board));

        if (count($errorList) == 0) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($board);
            $em->flush();

            $view = \FOS\RestBundle\View\View::create(null, Codes::HTTP_NO_CONTENT);
        } else {
            $view = \FOS\RestBundle\View\View::create($errorList, Codes::HTTP_BAD_REQUEST);
        }

        return $this->handleView($view);
    }
} 