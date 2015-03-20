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
use Teckboard\Teckboard\CoreBundle\Entity\Traits\CreateByTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\IdTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;
use JMS\Serializer\Annotation as JMS;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Class Board
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @JMS\ExclusionPolicy("all")
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\BoardRepository")
 *
 * @Hateoas\Relation(
 *          "self",
 *          href = @Hateoas\Route("api_board_get_boards", parameters = {"id" = "expr(object.getId())" })
 * )
 */
class Board
{
    use IdTrait, TimestampableTrait, NameTrait, CreateByTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="boards")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id", nullable=false)
     * @JMS\Expose
     * @JMS\Groups({"BoardDetail"})
     *
     * @var Account $account
     **/
    protected $account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }




}
