<?php
/*

 * PATH : Signup/src/Signup/Form/Filters/SignupForm.php
	
*/
namespace Signup\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;
use Zend\Validator\InArray;

class SignupForm {
	public $inputFilter;
	
	public function __construct() {
		$factory = new InputFilterFactory();
		$this->inputFilter = $factory->createInputFilter($this->_getConfig());
	}
	
	private function _getConfig() {
		return array(
			array(
	            	'name' => 'fn', //---First Name
	            	'required' => true,
	                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
						array(
						    'name' => 'Regex',
						    'options' => array(
						        'pattern' => '/^[a-z0-9 ]{3,26}$/i',
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
	            	'name' => 'ln', //---Last Name
	                'required' => true,
	                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
						array(
						    'name' => 'Regex',
						    'options' => array(
						        'pattern' => '/^[a-z0-9 ]{3,26}$/i',
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
                'name' => 'un', //---Last Name
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/^[a-z][a-z0-9\. ]{2,25}$/i',
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
                'name' => 'sex', //---Gender
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'InArray',
                        'options' => array(
                            'haystack' => array("M","F"),
                            'message' => array(
                                InArray::NOT_IN_ARRAY => 'Invalid !!!'
                            )
                        )
                    )
                ),
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
	            	'name' => 'cn', //---Contact Number
	                'required' => false,
	                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
						array(
						    'name' => 'Regex',
						    'options' => array(
						        'pattern' => '/^[0-9-\+]{10,16}$/i',
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
	            	'name' => 'pass', //---Password
	                'required' => true,
	                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
						array(
						    'name' => 'Regex',
						    'options' => array(
						        'pattern' => '/^[a-z0-9\`\~\@\#\%\^\&\*\(\)\-\_\=\+\[\]\{\}\\\|\;\:\'\"\,\.\<\>\/\?]{3,50}$/i',
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
	            	'name' => 'repass', //---Password
	                'required' => true,
	                'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
						array(
						    'name' => 'Regex',
						    'options' => array(
						        'pattern' => '/^[a-z0-9\`\~\@\#\%\^\&\*\(\)\-\_\=\+\[\]\{\}\\\|\;\:\'\"\,\.\<\>\/\?]{3,50}$/i',
						        'message' => array(
						            Regex::INVALID => 'Invalid !!!',
						            Regex::NOT_MATCH => '',
						            Regex::ERROROUS => ''
						            )
						        )
						    )
					)
		        )
	        );
	}
}
