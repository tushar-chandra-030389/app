<?php
/*

 * PATH : Signin/src/Signin/Form/Filters/SigninForm.php
	
*/
namespace Signin\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;

class SigninForm {
	public $inputFilter;
	
	public function __construct() {
		$factory = new InputFilterFactory();
		$this->inputFilter = $factory->createInputFilter($this->_getConfig());
	}
	
	private function _getConfig() {
		return array(
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
						        //'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i',
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
		        )
	        );
	}
}
