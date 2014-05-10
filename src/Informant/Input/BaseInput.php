<?php
/**
 * Base class for input definitions
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */

namespace Informant\Input;

/**
 * Base class for input definitions
 *
 * @since  2014-05-08
 * @author Patrick Forget <patforg@geekpad.ca>
 */
abstract class BaseInput extends \Informant\Input\BaseElement
{

    /**
     * @since  2014-05-08
     * @author Patrick Forget <patforg@geekpad.ca>
     */
    protected static function getDefaultValues() {
        static $defaultValues = null;
        if ($defaultValues === null) {
            $defaultValues = array_merge(parent::getDefaultValues(), array(
                'required' => false,
                'defaultValue' => '',
                'value' => null,
                'multipleValues' => false,
            ));
        } //if

        return $defaultValues;
    } // getDefaultValues()

} //  BaseInput class
