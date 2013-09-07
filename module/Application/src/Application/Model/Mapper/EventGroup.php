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

class EventGroup extends MapperFunctions {
    public $id;
    public $name;
    public $contact_num;
    public $email;
    public $venue;
    public $lat;
    public $lon;
    public $type;
    public $added_by;
    public $organiser_id;
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