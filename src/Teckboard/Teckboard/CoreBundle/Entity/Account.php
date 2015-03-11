<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\IdTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\PictureTrait;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "organization" = "Organization"})
 * @JMS\ExclusionPolicy("all")
 * @JMS\Discriminator(field = "type", map = {"user": "Teckboard\Teckboard\CoreBundle\Entity\User", "organization": "Teckboard\Teckboard\CoreBundle\Entity\Organization"})
 */
abstract class Account implements \Serializable
{
    use IdTrait, PictureTrait;

    public function __construct()
    {
        $this->boards = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Board", mappedBy="account")
     * @ORM\OrderBy({"name" = "ASC"})
     *
     * @JMS\Groups({"Me"})
     * @JMS\Expose
     * @var ArrayCollection $boards
     **/
    protected $boards;

    /**
     * @return ArrayCollection
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param ArrayCollection $boards
     */
    public function setBoards(ArrayCollection $boards)
    {
        $this->boards = $boards;
        return $this;
    }


}
