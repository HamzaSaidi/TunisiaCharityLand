<?php

namespace DonBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="donsBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Don", mappedBy="category")
     */

    private $lesdons;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */

    private $type;


    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=3000)
     */
    private $description;

    public function __construct()
    {
        $this->lesdons = new ArrayCollection();

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

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Category
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Category
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /*
     * @return Collection|Don[]
     */
    public function getlesdons()
    {
        return $this->lesdons;

    }

    /*
     * @param Don $don
     *
     */
    public function ajouerDon($don)
    {
        if (!$this->lesdons->contains($don)) {
            $this->lesdons[] = $don;
            $don->setcategory($this);
        }

    }

    /*
     * @param Don $don
     * @return Category
     */
    public function supprimerDon($don)
    {

        if ($this->lesdons->contains($don)) {
            $this->lesdons->removeElement($don);
            return $this;

        }

    }
}

