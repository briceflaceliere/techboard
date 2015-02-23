<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\IdTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"user" = "User", "organization" = "Organization"})
 */
class Owner
{
    use TimestampableTrait, IdTrait;

}