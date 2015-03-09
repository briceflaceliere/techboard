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
 */
abstract class Account implements \Serializable
{
    use IdTrait, PictureTrait;

    public function __construct()
    {
        $this->boardAccounts = new ArrayCollection();
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
