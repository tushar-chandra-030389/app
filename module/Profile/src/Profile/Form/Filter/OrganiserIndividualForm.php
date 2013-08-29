<?php

namespace Profile\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;
use Zend\Validator\InArray;

class OrganiserIndividualForm {
	public $inputFilter;
	
	public function __construct() {
		$factory = new InputFilterFactory();
		$this->inputFilter = $factory->createInputFilter($this->_getConfig());
	}
	
	private function _getConfig() 
	{
		return array
		(
            array(
            	'name' => 'type',
            	'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^I$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

		);
	}
}
