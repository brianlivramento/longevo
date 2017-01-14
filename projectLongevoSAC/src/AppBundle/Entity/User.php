<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $idUser;


	/**
	 * @ORM\Column(type="string")
	 */
	private $nameUser;


	/**
	 * @ORM\Column(type="string")
	 */
	private $emailUser;

	

	function setIdUser($idUser) { 
		$this->idUser = $idUser; 
	}

	function getIdUser() { 
		return $this->idUser; 
	}

	function setNameUser($nameUser) { 
		$this->nameUser = $nameUser; 
	}

	function getNameUser() { 
		return $this->nameUser;
	}
	
	function setEmailUser($emailUser) { 
		$this->emailUser = $emailUser; 
	}

	function getEmailUser() { 
		return $this->emailUser;
	}
}