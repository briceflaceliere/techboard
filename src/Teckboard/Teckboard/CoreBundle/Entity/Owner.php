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

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "organization" = "Organization"})
 */
abstract class Owner
{
    use IdTrait;

    /**
     * @ORM\OneToMany(targetEntity="Board", mappedBy="owner")
     **/
    protected $boards;

    public function __construct()
    {
        $this->boards = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param ArrayCollection $boards
     * @return $this
     */
    public function setBoards(ArrayCollection $boards)
    {
        $this->boards = $boards;
        return $this;
    }

    /**
     * @param Board $board
     * @return $this
     */
    public function addBoard(Board $board)
    {
        $this->board[] = $board;
        return $this;
    }

}
