<?php

namespace Profile\Form;

use Zend\Form\Factory AS FormFactory;


class FootballForm {
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
                        'name' => 'sn', //---Sports Name
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'foot', //---Football Stronger Foot
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Text',
                        'name' => 'format', //---Football Format Type
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'ps1', //---Position 1
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Hidden',
                        'name' => 'sportId', //---Sports Id 
                        'options' => array(),
                        'attributes' => array(),
                        ), 
                ),
                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Submit',
                        'name' => 'Create',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
            )
        );
    }
}

