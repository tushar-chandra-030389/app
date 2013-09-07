<?php

namespace Event\Form;

use Zend\Form\Factory AS FormFactory;


class EventSingleForm {
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
                            'value' =>  'S'
                        ),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'  => 'Zend\Form\Element\Hidden',
                        'name' => 'groupId',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'name',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'gender',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'sport',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'sd',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'ef',
                        'options' => array(),
                        'attributes' => array(),
                    ),
                ),

                array(
                    'spec' => array(
                        'type'	=> 'Zend\Form\Element\Text',
                        'name' => 'location',
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