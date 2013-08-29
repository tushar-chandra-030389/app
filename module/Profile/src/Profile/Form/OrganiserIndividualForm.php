<?php

namespace Profile\Form;

use Zend\Form\Factory AS FormFactory;


class OrganiserIndividualForm {
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
                        'type'	=> 'Zend\Form\Element\Hidden',
                        'name' => 'type',
                        'options' => array(),
                        'attributes' => array(
                            'value' =>  'I' //By Default Set to 0
                        ),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Submit',
                        'name' => 'create',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
			)
		);
	} 
}
 
	