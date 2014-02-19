<?php

namespace IAR\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Proveedor
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
     * @var integer
     *
     * @ORM\Column(name="codigo_ce", type="integer")
     */
    private $codigoCe;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_ce", type="string", length=100)
     */
    private $nombreCe;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=100, nullable=true)
     */
    private $telefono;

    /**
     * @var \IAR\CommonsBundle\Entity\Provincia
     *
     * @ORM\ManyToOne(targetEntity="\IAR\CommonsBundle\Entity\Provincia")
     * @ORM\JoinColumn(name="provincia_id", referencedColumnName="id", nullable=true)
     */
    private $provincia;

    /**
     * @var \IAR\CommonsBundle\Entity\Localidad
     *
     * @ORM\ManyToOne(targetEntity="\IAR\CommonsBundle\Entity\Localidad")
     * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id", nullable=true)
     */
    private $localidad;

    /**
     * @var \IAR\CommonsBundle\Entity\Zona
     *
     * @ORM\ManyToOne(targetEntity="\IAR\CommonsBundle\Entity\Zona")
     * @ORM\JoinColumn(name="zona_id", referencedColumnName="id", nullable=true)
     */
    private $zona;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_responsable", type="string", length=100, nullable=true)
     */
    private $nombreResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_responsable", type="string", length=100, nullable=true)
     */
    private $apellidoResponsable;


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
     * Set codigoCe
     *
     * @param integer $codigoCe
     * @return Proveedor
     */
    public function setCodigoCe($codigoCe)
    {
        $this->codigoCe = $codigoCe;
    
        return $this;
    }

    /**
     * Get codigoCe
     *
     * @return integer 
     */
    public function getCodigoCe()
    {
        return $this->codigoCe;
    }

    /**
     * Set nombreCe
     *
     * @param string $nombreCe
     * @return Proveedor
     */
    public function setNombreCe($nombreCe)
    {
        $this->nombreCe = $nombreCe;
    
        return $this;
    }

    /**
     * Get nombreCe
     *
     * @return string 
     */
    public function getNombreCe()
    {
        return $this->nombreCe;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Proveedor
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Proveedor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set nombreResponsable
     *
     * @param string $nombreResponsable
     * @return Proveedor
     */
    public function setNombreResponsable($nombreResponsable)
    {
        $this->nombreResponsable = $nombreResponsable;
    
        return $this;
    }

    /**
     * Get nombreResponsable
     *
     * @return string 
     */
    public function getNombreResponsable()
    {
        return $this->nombreResponsable;
    }

    /**
     * Set apellidoResponsable
     *
     * @param string $apellidoResponsable
     * @return Proveedor
     */
    public function setApellidoResponsable($apellidoResponsable)
    {
        $this->apellidoResponsable = $apellidoResponsable;
    
        return $this;
    }

    /**
     * Get apellidoResponsable
     *
     * @return string 
     */
    public function getApellidoResponsable()
    {
        return $this->apellidoResponsable;
    }

    /**
     * Set provincia
     *
     * @param \IAR\CommonsBundle\Entity\Provincia $provincia
     * @return Proveedor
     */
    public function setProvincia(\IAR\CommonsBundle\Entity\Provincia $provincia = null)
    {
        $this->provincia = $provincia;
    
        return $this;
    }

    /**
     * Get provincia
     *
     * @return \IAR\CommonsBundle\Entity\Provincia 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set localidad
     *
     * @param \IAR\CommonsBundle\Entity\Localidad $localidad
     * @return Proveedor
     */
    public function setLocalidad(\IAR\CommonsBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;
    
        return $this;
    }

    /**
     * Get localidad
     *
     * @return \IAR\CommonsBundle\Entity\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set zona
     *
     * @param \IAR\CommonsBundle\Entity\Zona $zona
     * @return Proveedor
     */
    public function setZona(\IAR\CommonsBundle\Entity\Zona $zona = null)
    {
        $this->zona = $zona;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return \IAR\CommonsBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }
}
