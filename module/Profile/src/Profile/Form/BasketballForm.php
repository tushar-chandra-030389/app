<?php

namespace Profile\Form;

use Zend\Form\Factory AS FormFactory;


class BasketballForm {
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
                        'name' => 'format', //---Format Type
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
                        'name' => 'sportId',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),
            )
        );
    }
}

