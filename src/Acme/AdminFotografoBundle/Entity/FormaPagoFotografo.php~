<?php

namespace Acme\AdminFotografoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\AdminFotografoBundle\Entity\EntidadCobradora;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="FormaPagoFotografo")
 * 
 * @DoctrineAssert\UniqueEntity(fields = "codigoFormaPago", message="El código ingresado ya existe para otra Forma de Pago.")
 * 
 */
class FormaPagoFotografo {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit = 3, message = "El máximo número de caracteres es 3.")
     * 
     */
    protected $codigoFormaPago;
    
    /**
     * @ORM\Column(type="string", length=50, unique=true)
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit = 50, message = "El máximo número de caracteres es 50.")
     * 
     */
    protected $nombre;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\MaxLength(limit = 100, message = "El máximo número de caracteres es 100.")
     * 
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\MaxLength(limit = 250, message = "El máximo número de caracteres es 250.")
     * 
     */
    protected $ayuda;
    
    /**
     * @ORM\Column(type="boolean", length=1, nullable=true)
     * 
     */
    protected $disponible;
    
    /**
     * @ORM\Column(type="boolean", length=1, nullable=true)
     * 
     */
    protected $esPrepago;
    
    /**
     * @ORM\Column(type="boolean", length=1, nullable=true)
     * 
     */
    protected $esDepositoBancario;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="EntidadCobradora", inversedBy="formasPagoFotografos")
     * @ORM\JoinColumn(name = "idEntidadCobradora", referencedColumnName = "id")
     * 
     */
    protected $entidadCobradoraExterna;
    
    
    /**
     * @ORM\OneToMany(targetEntity="PlanFotografo", mappedBy="entidadFormaPago")
     */
    protected $planesFotografos;
    
    
    public function __construct() {
        
        $this->planesFotografos = new ArrayCollection();
    }
    
    public function __toString() { 
        
       $cod = $this->getCodigoFormaPago();
       $nom = $this->getNombre();
        return ($cod.' - '.$nom); 
   }


    
   
    public function setId($id)
    {
        $this->id = $id;
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
     * Set codigoFormaPago
     *
     * @param string $codigoFormaPago
     * @return FormaPagoFotografo
     */
    public function setCodigoFormaPago($codigoFormaPago)
    {
        $this->codigoFormaPago = $codigoFormaPago;
    
        return $this;
    }

    /**
     * Get codigoFormaPago
     *
     * @return string 
     */
    public function getCodigoFormaPago()
    {
        return $this->codigoFormaPago;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return FormaPagoFotografo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return FormaPagoFotografo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set ayuda
     *
     * @param string $ayuda
     * @return FormaPagoFotografo
     */
    public function setAyuda($ayuda)
    {
        $this->ayuda = $ayuda;
    
        return $this;
    }

    /**
     * Get ayuda
     *
     * @return string 
     */
    public function getAyuda()
    {
        return $this->ayuda;
    }

    /**
     * Set disponible
     *
     * @param string $disponible
     * @return FormaPagoFotografo
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    
        return $this;
    }

    /**
     * Get disponible
     *
     * @return string 
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set esPrepago
     *
     * @param string $esPrepago
     * @return FormaPagoFotografo
     */
    public function setEsPrepago($esPrepago)
    {
        $this->esPrepago = $esPrepago;
    
        return $this;
    }

    /**
     * Get esPrepago
     *
     * @return string 
     */
    public function getEsPrepago()
    {
        return $this->esPrepago;
    }

    /**
     * Set esDepositoBancario
     *
     * @param string $esDepositoBancario
     * @return FormaPagoFotografo
     */
    public function setEsDepositoBancario($esDepositoBancario)
    {
        $this->esDepositoBancario = $esDepositoBancario;
    
        return $this;
    }

    /**
     * Get esDepositoBancario
     *
     * @return string 
     */
    public function getEsDepositoBancario()
    {
        return $this->esDepositoBancario;
    }

    

    /**
     * Set entidadCobradoraExterna
     *
     * @param \Acme\AdminFotografoBundle\Entity\EntidadCobradora $entidadCobradoraExterna
     * @return FormaPagoFotografo
     */
    public function setEntidadCobradoraExterna(EntidadCobradora $entidadCobradoraExterna = null)
    {
        $this->entidadCobradoraExterna = $entidadCobradoraExterna;
    
        return $this;
    }

    /**
     * Get entidadCobradoraExterna
     *
     * @return \Acme\AdminFotografoBundle\Entity\EntidadCobradora 
     */
    public function getEntidadCobradoraExterna()
    {
        return $this->entidadCobradoraExterna;
    }

    /**
     * Add planesFotografos
     *
     * @param \Acme\AdminFotografoBundle\Entity\PlanFotografo $planesFotografos
     * @return FormaPagoFotografo
     */
    public function addPlanesFotografo(\Acme\AdminFotografoBundle\Entity\PlanFotografo $planesFotografos)
    {
        $this->planesFotografos[] = $planesFotografos;
    
        return $this;
    }

    /**
     * Remove planesFotografos
     *
     * @param \Acme\AdminFotografoBundle\Entity\PlanFotografo $planesFotografos
     */
    public function removePlanesFotografo(\Acme\AdminFotografoBundle\Entity\PlanFotografo $planesFotografos)
    {
        $this->planesFotografos->removeElement($planesFotografos);
    }

    /**
     * Get planesFotografos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlanesFotografos()
    {
        return $this->planesFotografos;
    }
}