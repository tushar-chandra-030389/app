<?php

namespace Application\Model\Mapper;

use Application\Model\Helpers\MapperFunctions;

class UserSports extends MapperFunctions {
    public $id;
    public $uid; // User Id Indexed to User Table
    public $football;
    public $basketball;
    public $status;
    public $created_at;
    public $modified_at;

	/*public $joins = array(
			
		);*/

    public function __construct($data = NULL) {
        if($data !== NULL && is_array($data)) {
            $this->exchangeArray($data); }
    }

	public function getArrayCopy($forSelectColumns = FALSE, $alias = NULL) {
		$result = parent::getArrayCopy($forSelectColumns, $alias);
		return $result;
	}

	public function __set($name, $value) {
    	list($alias, $column) = explode('_', $name);
    	switch ($alias) {
    		
    	}
    }

    public function __get($name) {
    	list($alias, $column) = explode('_', $name);
    	switch ($alias) {
    		
    	}
    }

}