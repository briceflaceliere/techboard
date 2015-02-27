<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\CreateByTrait;
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
    use IdTrait, TimestampableTrait, NameTrait, CreateByTrait;

    /**
     * @ORM\OneToMany(targetEntity="BoardAccount", mappedBy="board", cascade="ALL")
     *
     * @var ArrayCollection $boardAccounts
     **/
    protected $boardAccounts;


    /**
     * @return ArrayCollection
     */
    public function getBoardAccounts()
    {
        return $this->boardAccounts;
    }

    /**
     * @param ArrayCollection $boardAccounts
     * @return $this
     */
    public function setBoardAccounts(ArrayCollection $boardAccounts)
    {
        $this->boardAccounts = $boardAccounts;
        return $this;
    }

    /**
     * @param BoardAccount $boardAccount
     * @return $this
     */
    public function addBoardAccounts(BoardAccount $boardAccount)
    {
        $this->boardAccounts[] = $boardAccount;
        return $this;
    }


}
