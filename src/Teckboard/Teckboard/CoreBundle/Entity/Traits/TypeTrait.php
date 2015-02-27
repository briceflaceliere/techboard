<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\User;

/**
 * Class TypeTrait
 * @package Teckboard\Teckboard\CoreBundle\Entity\Traits
 */
trait TypeTrait {

    /**
     * @Column(type="string")
     *
     * @var string $type
     **/
    private $type;

    static private $listTypeConst;

    public function setType($type)
    {
        if (self::$listTypeConst === null) {
            $oClass = new ReflectionClass(__CLASS__);
            self::$listTypeConst  = array_filter($oClass->getConstants(), function($key) {
                return (strpos($key, 'TYPE_') === 0);
            }, ARRAY_FILTER_USE_KEY);
        }

        if (!in_array($type, self::$listTypeConst)) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->type = $type;
    }
}