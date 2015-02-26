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
abstract class Account
{
    use IdTrait;

    public function __construct()
    {
        $this->ownerBoards = new ArrayCollection();
        $this->boardAccounts = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Board", mappedBy="owner")
     **/
    protected $ownerBoards;


    /**
     * @return mixed
     *
     * @var ArrayCollection $boardAccounts
     */
    public function getOwnerBoards()
    {
        return $this->ownerBoards;
    }

    /**
     * @param ArrayCollection $ownerBoards
     * @return $this
     */
    public function setOwnerBoards(ArrayCollection $ownerBoards)
    {
        $this->ownerBoards = $ownerBoards;
        return $this;
    }

    /**
     * @param Board $board
     * @return $this
     */
    public function addOwnerBoard(Board $board)
    {
        $this->ownerBoards[] = $board;
        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="BoardAccount", mappedBy="account")
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
