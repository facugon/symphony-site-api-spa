<?php

namespace IAR\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Brand
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var boolean
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;

    /**
     * @var string
     * @ORM\Column(name="logo_filename", type="string", length=100)
     */
    private $logoFilename;

    /**
     * @var integer
     * @ORM\Column(name="logo_x", type="integer")
     */
    private $logoX;

    /**
     * @var integer
     * @ORM\Column(name="logo_y", type="integer")
     */
    private $logoY;

    /**
     * @var integer
     * @ORM\Column(name="logo_size_x", type="integer")
     */
    private $logoSizeX;

    /**
     * @var integer
     * @ORM\Column(name="logo_size_y", type="integer")
     */
    private $logoSizeY;

    /**
     * @var ArrayCollection $models
     *
     * @ORM\OneToMany(targetEntity="Model", mappedBy="brand")
     */
    private $models;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Brand
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
     * Set disabled
     *
     * @param boolean $disabled
     * @return Brand
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

    /**
     * Set logoFilename
     *
     * @param string $logoFilename
     * @return Brand
     */
    public function setLogoFilename($logoFilename)
    {
        $this->logoFilename = $logoFilename;
    
        return $this;
    }

    /**
     * Get logoFilename
     *
     * @return string 
     */
    public function getLogoFilename()
    {
        return $this->logoFilename;
    }

    /**
     * Set logoX
     *
     * @param integer $logoX
     * @return Brand
     */
    public function setLogoX($logoX)
    {
        $this->logoX = $logoX;
    
        return $this;
    }

    /**
     * Get logoX
     *
     * @return integer 
     */
    public function getLogoX()
    {
        return $this->logoX;
    }

    /**
     * Set logoY
     *
     * @param integer $logoY
     * @return Brand
     */
    public function setLogoY($logoY)
    {
        $this->logoY = $logoY;
    
        return $this;
    }

    /**
     * Get logoY
     *
     * @return integer 
     */
    public function getLogoY()
    {
        return $this->logoY;
    }

    /**
     * Set logoSizeX
     *
     * @param integer $logoSizeX
     * @return Brand
     */
    public function setLogoSizeX($logoSizeX)
    {
        $this->logoSizeX = $logoSizeX;
    
        return $this;
    }

    /**
     * Get logoSizeX
     *
     * @return integer 
     */
    public function getLogoSizeX()
    {
        return $this->logoSizeX;
    }

    /**
     * Set logoSizeY
     *
     * @param integer $logoSizeY
     * @return Brand
     */
    public function setLogoSizeY($logoSizeY)
    {
        $this->logoSizeY = $logoSizeY;
    
        return $this;
    }

    /**
     * Get logoSizeY
     *
     * @return integer 
     */
    public function getLogoSizeY()
    {
        return $this->logoSizeY;
    }
    
    /**
     * Add models
     *
     * @param \IAR\ComprasBundle\Entity\Model $models
     * @return Brand
     */
    public function addModel(\IAR\ComprasBundle\Entity\Model $models)
    {
        $this->models[] = $models;
    
        return $this;
    }

    /**
     * Remove models
     *
     * @param \IAR\ComprasBundle\Entity\Model $models
     */
    public function removeModel(\IAR\ComprasBundle\Entity\Model $models)
    {
        $this->models->removeElement($models);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModels()
    {
        return $this->models;
    }

    public function __toString()
    {
        return $this->name ;
    }
}
