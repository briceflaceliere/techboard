<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

trait PositionTrait {

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     *
     * @Assert\Type(type="integer")
     *
     * @var integer
     */
    private $position;

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }



}