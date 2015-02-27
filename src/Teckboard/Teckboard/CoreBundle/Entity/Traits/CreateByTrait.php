<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\User;

/**
 * Class CreateByTrait
 * @package Teckboard\Teckboard\CoreBundle\Entity\Traits
 *
 * @TODO : Voir un system d'annotation pour l'auto populate
 */
trait CreateByTrait {

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="create_by_user_id", referencedColumnName="id", nullable=false)
     *
     * @var User $createBy
     **/
    private $createBy;

    /**
     * @return User
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * @param User $createBy
     * @return $this
     */
    public function setCreateBy(User $createBy)
    {
        $this->createBy = $createBy;
        return $this;
    }


}