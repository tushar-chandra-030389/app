<?php

namespace Profile\Form\Filter;

use Zend\InputFilter\Factory AS InputFilterFactory;
use Zend\Validator\NotEmpty;
use Zend\Validator\Regex;

class BasketballForm {
    public $inputFilter;

    public function __construct() {
        $factory = new InputFilterFactory();
        $this->inputFilter = $factory->createInputFilter($this->_getConfig());
    }

    private function _getConfig() {
        return array(
            /*array(
                'name' => 'sn',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/^.*$/i',
                            'message' => array(
                                Regex::INVALID => 'Invalid !!!',
                                Regex::NOT_MATCH => '',
                                Regex::ERROROUS => ''
                            )
                        )
                    )
                )
            ),*/
            array(
                'name' => 'format',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
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
                'name' => 'ps1',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
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
                'name' => 'sportId',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Regex',
                        'options' => array(
                            'pattern' => '/^2$/i',
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
