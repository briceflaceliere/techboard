<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait NameTrait {

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }



}