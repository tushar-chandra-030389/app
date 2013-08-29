<?php
/*

 * PATH : Signup/src/Signup/Form/SignupForm.php
	
*/
namespace Signup\Form;

use Zend\Form\Factory AS FormFactory;


class SignupForm {
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
		            	'type'	=> 'Zend\Form\Element\Text',
		                'name' => 'fn', //---First Name
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
		        
				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Text',
		                'name' => 'ln', //---Last Name
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),

                array(
                    'spec' => array(
                        'type'          => 'Zend\Form\Element\Text',
                        'name'          => 'un', //---User Name
                        'options'       => array(),
                        'attributes'    => array(),
                    ),
                ),
		        
				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Text',
		                'name' => 'em', //---Email
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'sem', //---Secondary Email
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Text',
		                'name' => 'cn', //---Contact Number
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),

				array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'ap', //---Alternate Phone
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                /*array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\File',
                        'name' => 'ua', //---Profile Picture
                        'options' => array(),
                    ),
                ),*/

				array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Hidden',
                        'name' => 'fbid', //---Facebook ID
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

				array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Hidden',
                        'name' => 'gid', //---Google ID
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

				array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Hidden',
                        'name' => 'tid', //---Twitter ID
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

				array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Select',
                        'name' => 'sex', //---Gender
                        'options' => array(
                            'value_options' => array(
                                '0' =>  'Select Your Gender',
                                'M' =>  'Male',
                                'F' =>  'Female'
                            ),
                        ),
                        'attributes' => array(
                            'value' =>  '0' //By Default Set to 1
                        ),
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
		            	'type'	=> 'Zend\Form\Element\Password',
		                'name' => 'repass', //---Re-Password
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
				
				array(
		            'spec' => array(
		            	'type'	=> 'Zend\Form\Element\Submit',
		                'name' => 'signup', //---Submit
		                'options' => array(),
		                'attributes' => array(),
		            ),
		        ),
			)
		);
	} 
}
 
	