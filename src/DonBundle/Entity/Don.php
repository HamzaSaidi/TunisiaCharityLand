<?php


namespace DonBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use TUserBundle\Entity\User;
/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity(repositoryClass="donsBundle\Repository\DonRepository")
 */
class Don
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="lesdons",cascade={"persist"}))
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;
    /**
     * @var \TUserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\TUserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="donneur", referencedColumnName="User")
     * })
     */
    private $donneur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Don
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /*
     * get Category
     * @return Category
     */
    public function getCategory(){


        return $this->category;

    }
    /*
    * get Category
     * @param Category $Category
    * @return don
    */
    public function setCategory($Category)
    {
        $this->category=$Category;
        return $this;

    }
    /*
     * get Donneur
     * @return User
     */
    public function getdonneur(){


        return $this->donneur;

    }
    /*
    * set Donneur
     * @param User $donneur
    * @return don
    */
    public function setdonneur($donneur)
    {
        $this->donneur=$donneur;
        return $this;

    }
}

