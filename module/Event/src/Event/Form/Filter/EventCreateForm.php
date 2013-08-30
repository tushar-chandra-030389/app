<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 30/8/13
 * Time: 6:34 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Event\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;

class EventCreateForm {
    public $inputFilter;

    public function __construct() {
        $factory = new InputFilterFactory();
        $this->inputFilter = $factory->createInputFilter($this->_getConfig());
    }

    private function _getConfig() {
        return array(
            array(
                'name' => 'type', //---Email
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            //'pattern' => '/^.*$/i',
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
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/.*$/i',
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
