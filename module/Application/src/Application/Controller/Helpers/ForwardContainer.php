<?php
/*

 * PATH : Application/src/Application/Controller/Helpers/ForwardContainer.php
	
*/

namespace Application\Controller\Helpers;

class ForwardContainer {
	public $reqData;
	public $resData;
	public $state;
	
	public function __construct() {
		
	}		
	
	public function setState($state) {
		$this->state = $state;
		return $this;
	}
	
	public function setRequestData($data) {
		$this->reqData = $data;
		return $this;
	}
	
	public function setResponsetData($data) {
		$this->resData = $data;
		return $this;
	}
	
	public function getRequestData() {
		return $this->reqData;
	}
	
	public function getResponsetData($data) {
		return $this->resData;
	}
}
