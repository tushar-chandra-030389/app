<?php

namespace Profile\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;
use Zend\Validator\InArray;

class OrganiserGroupForm {
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
					        'pattern' => '/^G$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

            array(
            	'name' => 'name',
            	'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^.*$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

	        array(
            	'name' => 'cn',
            	'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^.*$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

            array(
                'name' => 'em', //---Email
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i',
                            'message' => array(
                                Regex::INVALID => 'Invalid !!!',
                                Regex::NOT_MATCH => '',
                                Regex::ERROROUS => ''
                                )
                            )
                        )
				)
	        ),

            array(
            	'name' => 'address',
            	'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^.*$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

	        array(
            	'name' => 'lat',
            	'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^.*$/i',
					        'message' => array(
					            Regex::INVALID => 'Invalid !!!',
					            Regex::NOT_MATCH => '',
					            Regex::ERROROUS => ''
					            )
					        )
					    )
				)
	        ),

	        array(
            	'name' => 'lon',
            	'required' => false,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
					array(
					    'name' => 'Regex',
					    'options' => array(
					        'pattern' => '/^.*$/i',
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
