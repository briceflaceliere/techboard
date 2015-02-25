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
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;

/**
 * Class Board
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\BoardRepository");
 * @ORM\Table(name="Board",indexes={@ORM\Index(name="board_name_idx", columns={"name", "owner_id"})})
 */
class Board
{
    use IdTrait, TimestampableTrait, NameTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="boards")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     *
     * @var Owner $owner
     **/
    private $owner;

    /**
     * @return Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param Owner $owner
     * @return $this
     */
    public function setOwner(Owner $owner)
    {
        $this->owner = $owner;
        return $this;
    }



}
