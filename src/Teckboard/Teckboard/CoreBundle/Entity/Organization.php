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
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\PictureTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;
use JMS\Serializer\Annotation as JMS;
use Hateoas\Configuration\Annotation as Hateoas;

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
 *
 * @Hateoas\Relation(
 *          "self",
 *          href = @Hateoas\Route("api_organization_get_organizations", parameters = {"id" = "expr(object.getId())" })
 * )
 *
 * @JMS\ExclusionPolicy("all")
 */
class Organization extends Account
{
    use TimestampableTrait, NameTrait, CreateByTrait;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    /**
     * List of linked users
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="organizations", cascade={"persist"})
     *
     * @var ArrayCollection $users
     **/
    protected $users;

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function addUser(User $user)
    {
        $this->getUsers()->add($user);
        $user->addOrganization($this);
        return $this;
    }




}
