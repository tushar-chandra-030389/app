<?php
/*

 * PATH : Signin/src/Signin/Form/SigninForm.php
	
*/
namespace Signin\Form;

use Zend\Form\Factory AS FormFactory;


class SigninForm {
	public $form;
	
	public function __construct() {
		$factory = new FormFactory();
		$this->form = $factory->createForm($this->_getConfig());
    }
	
	private function _getConfig() {
		return array(
			'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
			'elements' => array(
		        array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Email',
		                'name' => 'em', //---Email
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Password',
		                'name' => 'pass', //---Password
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Submit',
		                'name' => 'signin', //---Submit
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
			)
		);
	} 
}
 
	