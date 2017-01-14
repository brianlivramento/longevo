<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="tickets")
 */
class Ticket {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="SEQUENCE")
	 * @ORM\SequenceGenerator(sequenceName="schema_name.moneda_moneda_id_seq", allocationSize=1,initialValue=5)
	 * @ORM\Column(type="integer")
	 */	
	private $idTicket;


	/**
	 * @ORM\Column(type="string")
	 */
	private $titleTicket;


	/**
	 * @ORM\Column(type="string")
	 */
	private $descTicket;


	/**
	 * @ORM\Column(type="datetime")
	 */
	private $dateTicket;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updateDateTicket;


	/**
	 * @ORM\Column(type="boolean")
	 */	
	private $statusTicket; 


	/**
	 * @ORM\Column(type="string")
	 */
	private $codOrder;

	function setIdTicket($idTicket) { 
		$this->idTicket = $idTicket; 
	}

	function getIdTicket() { 
		return $this->idTicket; 
	}

	function setTitleTicket($titleTicket) { 
		$this->titleTicket = $titleTicket; 
	}

	function getTitleTicket() { 
		return $this->titleTicket; 
	}

	function setDescTicket($descTicket) { 
		$this->descTicket = $descTicket; 
	}

	function getDescTicket() { 
		return $this->descTicket; 
	}

	function setDateTicket($dateTicket) { 
		$this->dateTicket = $dateTicket; 
	}

	function getDateTicket() { 
		return $this->dateTicket; 
	}

	function setUpdateDateTicket($updateDateTicket) { 
		$this->updateDateTicket = $updateDateTicket; 
	}

	function getUpdateDateTicket() { 
		return $this->updateDateTicket; 
	}
	
	function setStatusTicket($statusTicket) { 
		$this->statusTicket = $statusTicket;
	}

	function getStatusTicket() { 
		return $this->statusTicket; 
	}

	function setCodOrder($codOrder) { 
		$this->codOrder = $codOrder; 
	}

	function getCodOrder() { 
		return $this->codOrder; 
	}
}