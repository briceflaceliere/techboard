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
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TypeTrait
 * @package Teckboard\Teckboard\CoreBundle\Entity\Traits
 */
trait TypeTrait {

    /**
     * @ORM\Column(type="string", nullable=false, length=100)
     * @JMS\Expose
     *
     * @Assert\NotBlank()
     *
     * @var string $type
     **/
    private $type;

    static private $listTypeConst;

    public function setType($type)
    {
        if (self::$listTypeConst === null) {
            $oClass = new \ReflectionClass(__CLASS__);
            self::$listTypeConst  = array_filter($oClass->getConstants(), function($key) {
                return (strpos($key, 'TYPE_') === 0);
            }, ARRAY_FILTER_USE_KEY);
        }

        if (!in_array($type, self::$listTypeConst)) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function validateType(ExecutionContextInterface $context)
    {
        // Vérifie si le nom est bidon
        if (!in_array($this->getType(), self::$listTypeConst)) {
            $context->addViolationAt(
                'type',
                'The type is invalid',
                array(),
                null
            );
        }
    }
}