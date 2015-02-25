<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;

/**
 * Class Organization
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\OrganizationRepository");
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="name",
 *          column=@ORM\Column(
 *              unique   = true
 *          )
 *      )
 * })
 */
class Organization extends Owner
{
    use TimestampableTrait, NameTrait;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $privateKey;

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }


    protected $picture;

}
