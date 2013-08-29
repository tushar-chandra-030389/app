<?php
/*

 * PATH : Application/src/Application/Model/Helpers/Functions.php
	
*/

namespace Application\Model\Helpers;

abstract class MapperFunctions {
	abstract public function __set($name, $value);
	abstract public function __get($name);
	
	public function exchangeArray($data) {
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
     * Get array for columns
     *
     * @param bool    	$forSelectColumns     Set ket and value as columns names
     * @param string    $alias        		  Append column names with alias
     */
	public function getArrayCopy($forSelectColumns = FALSE, $alias = NULL) {
		$columns = get_object_vars($this);
		if($forSelectColumns === TRUE) {
			unset($columns['joins']);
			foreach ($columns as $key => $value) {
				if($alias === NULL)
					$columns[$key] = $key;
				else if(is_string($alias))  {
					unset($columns[$key]);
					$columns[$alias.'_'.$key] = $key;
				}
			}
		}
		return $columns;
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
}