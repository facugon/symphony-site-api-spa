<?php

namespace IAR\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IAR\ComprasBundle\Entity\Repository\ModelRepository")
 */
class Model
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="brand_id", type="integer")
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="synonym", type="string", length=50)
     */
    private $synonym;

    /**
     * Full name lowercase without spaces
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", length=50)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="pic_filename", type="string", length=100)
     */
    private $picFilename;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Model
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set brand
     *
     * @param integer $brand
     * @return Model
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return integer 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set synonym
     *
     * @param string $synonym
     * @return Model
     */
    public function setSynonym($synonym)
    {
        $this->synonym = $synonym;
    
        return $this;
    }

    /**
     * Get synonym
     *
     * @return string 
     */
    public function getSynonym()
    {
        return $this->synonym;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     * @return Model
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    
        return $this;
    }

    /**
     * Get shortName
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set picFilename
     *
     * @param string $picFilename
     * @return Model
     */
    public function setPicFilename($picFilename)
    {
        $this->picFilename = $picFilename;
    
        return $this;
    }

    /**
     * Get picFilename
     *
     * @return string 
     */
    public function getPicFilename()
    {
        return $this->picFilename;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Model
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set disabled
     *
     * @param boolean $disabled
     * @return Model
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    
        return $this;
    }

    /**
     * Is disabled
     *
     * @return boolean 
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * Get disabled
     *
     * @return boolean 
     */
    public function getDisabled()
    {
        return $this->disabled;
    }
}
