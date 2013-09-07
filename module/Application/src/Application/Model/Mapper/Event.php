<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 30/8/13
 * Time: 2:27 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Application\Model\Mapper;

use Application\Model\Helpers\MapperFunctions;

class Event extends MapperFunctions {
    public $id;
    public $organiser_id;
    public $event_group_id;
    public $added_by;
    public $sports_id;
    public $gender;
    public $name;
    public $start_date;
    public $end_date;
    public $venue;
    public $lat;
    public $lon;
    public $email_primary;
    public $email_secondary;
    public $contact_num_primary;
    public $contact_num_secondary;
    public $description;
    public $entry_fee;
    public $age;
    public $prize;
    public $documents;
    public $team_size;
    public $team_num;
    public $sponsors;
    public $sponsors_type;
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

    public function getNotNullArrayCopy() {
        $data = $this->getArrayCopy();
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