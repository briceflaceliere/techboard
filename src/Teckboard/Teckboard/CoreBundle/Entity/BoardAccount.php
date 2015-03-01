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
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TypeTrait;

/**
 * Class BoardAccount
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\BoardAccountRepository");
 * @ORM\Table(name="BoardAccount",indexes={@ORM\Index(name="board_acount_idx", columns={"board_id", "account_id"})})
 */
class BoardAccount
{
    use IdTrait, TimestampableTrait, NameTrait, TypeTrait;

    const TYPE_OWNER = 'owner';
    const TYPE_SIMPLE = 'simple';


    function __construct()
    {
        $this->setType(self::TYPE_SIMPLE);
    }

    /**
     * @ORM\ManyToOne(targetEntity="Board", inversedBy="BoardAccounts")
     * @ORM\JoinColumn(name="board_id", referencedColumnName="id", nullable=false)
     *
     * @var Board $board
     **/
    private $board;

    /**
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @param Board $board
     * @return $this
     */
    public function setBoard(Board $board)
    {
        $this->board = $board;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="BoardAccounts")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id", nullable=false)
     *
     * @var Account $board
     **/
    private $account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     * @return $this
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @var int $position
     */
    private $position = 1;

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = (int)$position;
        return $this;
    }




}
