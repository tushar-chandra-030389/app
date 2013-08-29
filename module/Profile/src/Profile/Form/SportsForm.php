<?php

namespace Profile\Form;

use Zend\Form\Factory AS FormFactory;


class SportsForm {
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
                        'type'	  => 'Zend\Form\Element\Select',
                        'name'	  => 'sn', //Sports Name
                        'options' => array(
                            'value_options' => array(
                                '0' =>  'Select A Sports',
                                'Football' =>  'Football',
                                'Basketball' =>  'Basketball'
                            ),
                        ),
                        'attributes' => array(
                            'value' =>  '0' //By Default Set to 1
                        ),
                    ),
                ),

			)
		);
	} 
}
 
	