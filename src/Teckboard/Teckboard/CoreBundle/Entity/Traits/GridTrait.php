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


trait GridTrait {

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @JMS\Expose
     *
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value=0)
     *
     * @var integer
     */
    private $positionX;

    /**
     * @return int
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * @param int $positionX
     *
     * @return $this
     */
    public function setPositionX($positionX)
    {
        $this->positionX = (int)$positionX;
        return $this;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @JMS\Expose
     *
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value=0)
     *
     * @var integer
     */
    private $positionY;

    /**
     * @return int
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * @param int $positionY
     *
     * @return $this
     */
    public function setPositionY($positionY)
    {
        $this->positionY = (int)$positionY;
        return $this;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @JMS\Expose
     *
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value=0)
     *
     * @var integer
     */
    private $height;

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = (int)$height;
        return $this;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @JMS\Expose
     *
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThan(value=0)
     *
     * @var integer
     */
    private $width;

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = (int)$width;
        return $this;
    }




}