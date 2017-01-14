<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="orders")
 */
class Order {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $idOrder;


	/**
	 * @ORM\Column(type="string")
	 */
	private $codOrder;


	/**
	 * @ORM\Column(type="datetime")
	 */
	private $dateOrder;


	 /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */     
	private $idUser;

	function setIdOrder($idOrder) { 
		$this->idOrder = $idOrder; 
	}
	function getIdOrder() {
		return $this->idOrder; 
	}
	function setCodOrder($codOrder) { 
		$this->codOrder = $codOrder; 
	}
	function getCodOrder() { return $this->codOrder; 
	}
	function setDateOrder($dateOrder) { 
		$this->dateOrder = $dateOrder; 
	}
	function getDateOrder() { 
		return $this->dateOrder; 
	}
	function setIdUser($idUser) { 
		$this->idUser = $idUser; 
	}
	function getIdUser() { 
		return $this->idUser; 
	}
}