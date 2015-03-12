<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;
use JMS\Serializer\Annotation as JMS;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Class User
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\UserRepository");
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="name",
 *          column=@ORM\Column(
 *              unique   = true
 *          )
 *      )
 * })
 * @JMS\ExclusionPolicy("all")
 * @Hateoas\Relation(
 *          "self",
 *          href = @Hateoas\Route("api_user_get_users", parameters = {"id" = "expr(object.getId())" })
 * )
 * @Hateoas\Relation(
 *          "boards",
 *          href = @Hateoas\Route("api_user_get_user_boards", parameters = {"id" = "expr(object.getId())" }),
 *          embedded = "expr(object.getBoards())",
 *          exclusion = @Hateoas\Exclusion(excludeIf = "expr(object.getBoards() === null)")
 * )
 */
class User extends Account implements UserInterface, EquatableInterface
{
    use TimestampableTrait, NameTrait;



    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    function __construct()
    {
        $this->salt = md5(uniqid(null, true));
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $password;

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * Returns the username used to authenticate the user.
     *
     * @JMS\VirtualProperty
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getName();
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        return $this->getUsername() === $user->getUsername();
    }


}
