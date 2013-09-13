<?php

namespace Application\Model\Mapper;

use Application\Model\Helpers\MapperFunctions;

class Basketball extends MapperFunctions {
    public $id;
    public $uid; // Keys Indexed to User Id Table
    public $format;
    public $position; // Position for the Sports
    public $status;
    public $created_at;
    public $modified_at;

	/*public $joins = array(
			
		);*/

    public function __construct($data = NULL) {
        if($data !== NULL && is_array($data)) {
            $this->exchangeArray($data); }
    }



}