<?php

namespace Application\Model\Mapper;

use Application\Model\Helpers\MapperFunctions;

class Organiser extends MapperFunctions {
    public $id;
    public $name;
    public $added_by;
    public $type;
    public $contact_num;
    public $email;
    public $address;
    public $lat;
    public $lon;
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