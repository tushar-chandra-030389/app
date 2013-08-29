<?php
/*

 * PATH : Application/src/Application/Model/Mapper/User.php
    
*/
namespace Application\Model\Mapper;

use Application\Model\Helpers\MapperFunctions;

class User extends MapperFunctions {
    public $id;
    public $first_name;
    public $last_name;
    public $username;
	public $email;
    public $secondary_email;
    public $contact_number;
    public $alternate_phone;
    public $profilepic_url;
    public $fbid;
    public $googleid;
    public $twitterid;
    public $gender;
    public $album_url;
    public $city;
    public $city_lat;
    public $city_long;
	public $salt;
	public $hash;
    public $ref_by;
    public $ref_link;
    public $status;
    public $created_at;
    public $modified_at;
    public $last_login;

	/*public $joins = array(
			
		);*/

    public function __construct($data = NULL) {
        if($data !== NULL && is_array($data)) {
            $this->exchangeArray($data); }
    }

	public function getArrayCopy($forSelectColumns = FALSE, $alias = NULL) {
		$result = parent::getArrayCopy($forSelectColumns, $alias);
		unset($result['salt']);
		unset($result['hash']);
		return $result;
	}

	public function getArrayCopyForAuthentication($forSelectColumns = FALSE) {
		return parent::getArrayCopy($forSelectColumns);
	}

    public function getNotNullArrayCopyForAuthentication() {
        $data = parent::getArrayCopy();
        foreach ($data as $dKey => $dValue) {
            if($dValue === NULL) {
                unset($data[$dKey]);
            }
        }
        return $data;
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