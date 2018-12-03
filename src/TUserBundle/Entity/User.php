<?php

namespace TUserBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="TUserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="User", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
protected $id;
    /**
     * @ORM\OneToMany(targetEntity="DonBundle\Entity\Don", mappedBy="donneur")
     */

    private $lesdons;

public function __construct()
{
    parent::__construct();
    $this->lesdons=new ArrayCollection();
}

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /*
    * @param Don $don
    *
    */
    public function ajouerDon($don)
    {
        if (!$this->lesdons->contains($don)) {
            $this->lesdons[] = $don;
            $don->setdonneur($this);
        }

    }

    /*
     * @param Don $don
     * @return User
     */
    public function supprimerDon($don)
    {

        if ($this->lesdons->contains($don)) {
            $this->lesdons->removeElement($don);
            return $this;

        }

    }
}

