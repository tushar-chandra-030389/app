<?php
/*

 * PATH : Application/src/Application/Controller/Helpers/RolesContainer.php
	
*/

namespace Application\Controller\Helpers;

class RolesContainer {
	public $lvl0;
	public $lvl1;
	public $lvl2;
	public $lvl3;
	public $lvl4;
	
	public $comapnyList;
	
	public function __construct() {
		$this->lvl0 = FALSE;
		$this->lvl1 = FALSE;
		$this->lvl2 = FALSE;
		$this->lvl3 = FALSE;
		$this->lvl4 = FALSE;
		
		$this->comapnyList = array(
			0 => array(),
			1 => array(),
			2 => array(),
			3 => array(),
			4 => array()
		);
	}		
	
	public function addToLevel($lvl, $company) {
		$this->setLevelTrue($lvl);
		$this->comapnyList[$lvl][$company->id] = $company;
	}
	
	public function removeFromLevel($lvl, $companyId) {
		if(isset($this->comapnyList[$lvl][$company->id])) {
			unset($this->comapnyList[$lvl][$company->id]);
			if(count($this->comapnyList[$lvl]) === 0) {
				$this->setLevelFalse($lvl);
			}
		}
	}
	
	public function setLevelTrue($lvl) {
		if($this->{'lvl'.$lvl} === FALSE)
			$this->{'lvl'.$lvl} = TRUE;
		return $this;
	}
	
	public function setLevelFalse($lvl) {
		if($this->{'lvl'.$lvl} === TRUE)
			$this->{'lvl'.$lvl} = FALSE;
		return $this;
	}
	
	public function getLevelState($lvl) {
		return $this->{'lvl'.$lvl};
	}
	
	public function getLevelCompanies($lvl) {
		return $this->comapnyList[(int)$lvl];
	}
}