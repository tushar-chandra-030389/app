<?php

namespace Event\Form;

use Zend\Form\Factory AS FormFactory;


class EventMultipleForm {
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
                            'value' =>  'M'
                        ),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'name',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'cn',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'em',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'venue',
                        'options' => array(),
                        'attributes' => array(),
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